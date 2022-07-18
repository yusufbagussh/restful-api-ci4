<?php

use App\Models\TokenModel;

function getRestAPIAccess($method, $url, $data)
{
    //Panggil Class untuk Melakukan request ke API
    $client = \Config\Services::curlrequest();
    // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Inl1c3VmYmFndXNAZ21haWwuY29tIiwiaWF0IjoxNjU2Njg0NzM4LCJleHAiOjE2NTY2ODgzMzh9.-I-hzBUEZjpJtQe5hCih5c0-_x8RYIbcYCq8kNWlJDc";

    //Inisialisasi model
    $tokenModel = new TokenModel();
    //ambil id token
    $idToken = "1";
    //ambil data token dengan functin di model
    $token = $tokenModel->getToken($idToken);
    //pecah token berdasarkan titik
    $tokenPart = explode(".", $token);
    //ambil data array kedua atau [1], tempat data payload berada
    $payload = $tokenPart[1];
    //lakukan decode
    $decode = base64_decode($payload);
    $json = json_decode($decode, true);
    //ambil waktu expired token
    $exp = $json['exp'];
    //ambil waktu sekarang
    $waktuSekarang = time();
    //cek apakah waktu exp lebih besar dari waktu sekarang
    if ($exp <= $waktuSekarang) {
        //jik benar
        //lakukan otentikasi secara otomatis
        $url = "http://localhost:8080/otentikasi";
        //kirim data yang dibutuhkan
        $form_params = [
            'email' => 'yusufbagus@gmail.com',
            'password' => 12345
        ];
        //Ambil atau kirimkan respon berupa method http, url, data yang diberikan jika ada data baru yang dibuat atau diubah
        $response = $client->request('POST', $url, ['http_errors' => false, 'form_params' => $form_params]);

        //ambil body dari response yang diterima
        $response = json_decode($response->getBody(), true);
        //ambil bagian index access_token
        $token = $response['accesss_token'];
        $dataToken = [
            'id' => $idToken,
            'token' => $token
        ];
        //update token
        $tokenModel->save($dataToken);
    }

    //Masukkan token untuk melakukan request
    $headers = [
        'Authorization' => 'Bearer ' . $token
    ];
    //Ambil atau kirimkan respon berupa method http, url, data yang diberikan jika ada data baru yang dibuat atau diubah
    $response = $client->request($method, $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);
    //Ambil data dibagian body
    return $response->getBody();
}
