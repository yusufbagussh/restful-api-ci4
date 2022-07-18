<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Opd extends ResourceController
{
    //Inisialisasi model
    protected $modelName = 'App\Models\OPDModel';
    //Format yang dikeluarkan atau output yang dihasilkan
    protected $format = 'json';

    public function __construct()
    {
        /**
         * memanggil validation yang telah dibuat di App/Config/validation.php
         */
        $this->validation = \Config\Services::validation();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //mengambil semua data opd
        return $this->respond($this->model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //menampilkan data berdasarkan id opd yang dikirimkan
        $data = $this->model->findById($id);

        //jika ada data
        if ($data) {
            return $this->respond($data);
        }

        //jika tidak ada data 
        return $this->fail("Data dengan id $id tidak ditemukan");
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //Tangkap semua data
        $data = $this->request->getPost();
        //Buat validasi dengan nama opd yang didefinisikan pada file app/config/validation.php
        $validate = $this->validation->run($data, 'opd');
        //Ambil data error jika ada
        $errors = $this->validation->getErrors();

        //jika ada error pada validasi
        if ($errors) {
            return $this->fail($errors);
        }

        //jika data berhasil disimpan
        if ($this->model->save($data)) {
            //tampilkan respon dari API
            return $this->respondCreated($data, 'user created');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //Ambil data berdasarkan id opd yang dikirim menggunakan http method PUT dengan getRawInput
        $data = $this->request->getRawInput();
        //Ambil id simpan pada index array opd_kode
        $data['opd_kode'] = $id;
        //Buat validasi data opd
        $validate = $this->validation->run($data, 'opd');
        //Buat variabel untuk menampung error
        $errors = $this->validation->getErrors();

        //jika ada error
        if ($errors) {
            return $this->fail($errors);
        }

        //jika data berdasarkan id tidak ada
        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }

        //jika perubahan berhasil disimpan
        if ($this->model->save($data)) {
            //tampilkan respon dari API
            return $this->respondUpdated($data, 'user updated');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed$data, 'user updated'
     */
    public function delete($id = null)
    {
        //cari data berdasarkan id yang dikirim dengan http method DELETE
        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }

        //jika data berhasil dihapus
        if ($this->model->delete($id)) {
            //tampilkan respon dari API
            return $this->respondDeleted(['id' => 'id ' . $id . ' deleted']);
        }
    }
}
