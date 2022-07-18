<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MahasiswaClient extends BaseController
{
    public function __construct()
    {
        helper('restclient');
    }
    public function index()
    {
        $url = "http://localhost:8080/mahasiswa";
        $data = [];
        $response = getRestAPIAccess('GET', $url, $data);

        $listMahasiswa = json_decode($response, true);
        foreach ($listMahasiswa as $mahasiswa) {
            echo "Nama Mahasiswa  : " . $mahasiswa['mahasiswa_nama'] . "<br/>";
            echo "NIM Mahasiswa   : " . $mahasiswa['mahasiswa_nim'] . "<br/>";
            echo "Email Mahasiswa : " . $mahasiswa['mahasiswa_email'] . "<br/>";
            echo "<hr/>";
        }
    }

    public function show($id = null)
    {
        $url = "http://localhost:8080/mahasiswa/$id";
        $data = [];
        $response = getRestAPIAccess('GET', $url, $data);

        $mahasiswa = json_decode($response, true);

        echo "Nama Mahasiswa : " . $mahasiswa['mahasiswa_nama'] . "<br/>";
        echo "Nama Mahasiswa : " . $mahasiswa['mahasiswa_nim'] . "<br/>";
        echo "Nama Mahasiswa : " . $mahasiswa['mahasiswa_email`'] . "<br/>";
        echo "<hr/>";
    }

    public function create()
    {
        $url = "http://localhost:8080/mahasiswa";
        $data = [
            'mahasiswa_nama' => 'Dhimas Risang Maulana',
            'mahasiswa_nim' => 'V3420080',
            'mahasiswa_email' => 'dhimas@gmail.com'
        ];
        $response = getRestAPIAccess('POST', $url, $data);

        echo $response->getBody();
    }

    public function update($id = null)
    {
        $url = "http://localhost:8080/mahasiswa/$id";
        $data = [
            'mahasiswa_nama' => 'Dhimas Risang Maulana',
            'mahasiswa_nim' => 'V3420081',
            'mahasiswa_email' => 'dhimas@co.id'
        ];
        $response = getRestAPIAccess('PUT', $url, $data);

        echo $response->getBody();
    }

    public function delete($id = null)
    {
        $url = "http://localhost:8080/mahasiswa/$id";
        $data = [];
        $response = getRestAPIAccess('DELETE', $url, $data);

        echo $response->getBody();
    }
}
