<?php

namespace App\Controllers;

class OpdClient extends BaseController
{
    public function index()
    {
        /**
         * Read all data
         */
        // $url = "http://localhost:8080/opd";
        // $response = $client->request('GET', $url, ['headers' => $headers, 'http_errors' => false]);
        // echo $response->getBody();

        /**
         * Show detail data
         */
        // $url = "http://localhost:8080/opd/1";
        // $response = $client->request('GET', $url, ['headers' => $headers, 'http_errors' => false]);
        // echo $response->getBody();

        /**
         * Create data with POST method
         */
        // $url = "http://localhost:8080/opd";
        //masukkan data baru yang akan dibuat
        // $data = [
        //     'opd_nama' => 'OPD 2',
        //     'opd_logo' => 'logo.jpg',
        //     'opd_email' => 'opd@opd.com',
        //     'opd_alamat' => 'alamat opd 2',
        //     'opd_telp' => '089876789879'

        // ];
        // $response = $client->request('POST', $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);
        // echo $response->getBody();

        /**
         * Update data with PUT method
         */
        // $url = "http://localhost:8080/opd/1";
        //masukkan perubahan data yang telah dilakukan
        // $data = [
        //     'opd_nama' => 'OPD 1',
        //     'opd_logo' => 'logo.jpg',
        //     'opd_email' => 'opd@opd.com',
        //     'opd_alamat' => 'alamat opd 1',
        //     'opd_telp' => '34546457654'

        // ];
        // $response = $client->request('PUT', $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);
        // echo $response->getBody();

        /**
         * Delete data with DELETE method
         */
        // $url = "http://localhost:8080/opd/4";
        //Data tidak perlu ada yang dikirimkan sehingga kita kosongkan saja
        // $data = [];
        // $response = $client->request('DELETE', $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);
        // echo $response->getBody();

        helper('restclient');
        $url = "http://localhost:8080/opd";
        $data = [];
        $response = getRestAPIAccess('GET', $url, $data);
        // echo $response;

        // $data = [
        //     'opd_nama' => 'OPD 2',
        //     'opd_logo' => 'logo.jpg',
        //     'opd_email' => 'opd@opd.com',
        //     'opd_alamat' => 'alamat opd 2',
        //     'opd_telp' => '089876789879'

        // ];
        // $response = getRestAPIAccess('POST', $url, $data);

        // $showData = json_decode($response, true);
        // echo $showData['opd_nama'];

        $listOPD = json_decode($response, true);
        foreach ($listOPD as $opd) {
            echo "Nama OPD: " . $opd['opd_nama'] . "<br/>";
            echo "Logo OPD: " . $opd['opd_logo'] . "<br/>";
            echo "Email OPD: " . $opd['opd_email'] . "<br/>";
            echo "Alamat OPD: " . $opd['opd_alamat'] . "<br/>";
            echo "Telepon OPD: " . $opd['opd_telp'] . "<br/>";
        }
    }
}
