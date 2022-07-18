<?php

namespace App\Controllers;

use App\Models\OtentikasiModel;
use CodeIgniter\API\ResponseTrait;

class Otentikasi extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //Inisialisasi dan membuat validation
        $validation = \Config\Services::validation();
        $aturan = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Mohon isi email anda',
                    'valid_email' => 'Mohon masukkan email yang valid'
                ]
            ],
            'password' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mohon isi password anda'
                ]
            ],
        ];

        //cek validasi
        $validation->setRules($aturan);
        //jika tidak tervalidasi atau false 
        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        //inisialisasi model
        $model = new OtentikasiModel();

        //ambil value email dan password
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        //Validasi email, dengan parameter email dalam select db
        $user = $model->where("email", $email)->first();
        //Jika tidak ada maka gunakan method failNotFound
        if (!$user) return $this->failNotFound('Email Tidak Ditemukan');

        //cek apakah password sudah sesuai dengan yang terdapat pada database
        $data = $model->getEmail($email);
        if ($data['password'] != md5($password)) {
            return $this->fail("Password tidak sesuai");
        }

        //Membuat token jwt  
        //ambil email untuk payloadnya
        $email = $data['email'];
        //ambil id, ini opsional
        $id = $data['id'];
        //panggil helper jwt
        helper('jwt');
        //tampilkan respon pada user
        $response = [
            'message' => 'Otentikasi berhasil dilakukan',
            'data' => $data,
            'accesss_token' => createJWT($email)
        ];

        return $this->respond($response);
    }
}
