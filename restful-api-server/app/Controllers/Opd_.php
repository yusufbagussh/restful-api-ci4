<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\OPDModel;

class Opd_ extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->opdModel = new OPDModel();
    }

    public function index()
    {
        return $this->opdModel->findAll();
    }

    public function create()
    {
        $data = [
            'opd_kode' => $this->request->getVar('opd_kode'),
            'opd_nama' => $this->request->getVar('opd_nama'),
            'opd_logo' => $this->request->getVar('opd_logo'),
            'opd_email' => $this->request->getVar('opd_email'),
            'opd_alamat' => $this->request->getVar('opd_alamat'),
            'opd_telp' => $this->request->getVar('opd_telp')
        ];

        $this->opdModel->save($data);

        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'Berhasil memasukkan data OPD'
            ]
        ];

        return $this->respond($response);
    }
}
