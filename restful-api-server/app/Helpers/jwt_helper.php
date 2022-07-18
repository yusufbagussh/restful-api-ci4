<?php

use App\Models\OtentikasiModel;
use Firebase\JWT\JWT;


/**
 * untuk mengecek apakah jwt valid yang dikirimkan request dari aplikasi valid or no
 */
function getJWT($otentikasiHeader)
{
    //cek apakah ada otentikasiHeader JWT
    if (is_null($otentikasiHeader)) {
        throw new Exception("Otentikasi JWT Gagal");
    }
    //jika ada
    return explode(" ", $otentikasiHeader)[1];
}

/**
 * method untuk melakukan validasi JWT yang dikirimkan user
 */
function validateJWT($encodedToken)
{
    //ambil key pada file .env
    $key = getenv('JWT_SECRET_KEY');
    //decode toke dengan hashing dari jwt
    $decodeToken = JWT::decode($encodedToken, $key, ['HS256']);
    //inisialisasi model
    $otentikasiModel = new OtentikasiModel();
    //Terdapat 3 bagian JWT
    //xxxxx.xxxxxx.xxxxxxx //heeader.payload.signature
    //ambil email yang berada ditengah yaitu payload
    //ambil data berdasarkan email yang diambil dari decode email bagian payload
    $otentikasiModel->getEmail($decodeToken->email);
}

/**
 * method untuk membuat JWT
 */
function createJWT($email)
{
    //set waktu sekarang atau saat waktu saat melakukan request
    $waktuRequest = time();
    //set lama waktu kadaluwarsa
    $waktuToken = getenv('JWT_TIME_TO_LIVE');
    //set waktu expired
    $waktuExpired = $waktuRequest + $waktuToken;
    //membuat data payload
    $payload = [
        'email' => $email,
        'iat' => $waktuRequest,
        'exp' => $waktuExpired
    ];
    //Melakukan encode payload
    $jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'));
    //kembalikan nilai
    return $jwt;
}
