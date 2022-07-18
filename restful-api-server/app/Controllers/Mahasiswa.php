<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    //Inisialisasi model
    protected $modelName = 'App\Models\MahasiswaModel';
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
        return $this->respond($this->model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);

        if ($data) {
            return $this->respond($data);
        }

        return $this->fail("Data with id $id not found");
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
        $data = $this->request->getPost();

        $validasi = $this->validation->run($data, 'mahasiswa');

        $errors = $this->validation->getErrors();

        //jika ada error pada validasi
        if ($errors) {
            return $this->fail($errors);
        }

        //jika data berhasil disimpan
        if ($this->model->save($data)) {
            //tampilkan respon dari API
            return $this->respondCreated($data, 'data mahasiswa created');
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
        $data = $this->request->getRawInput();

        $data['mahasiswa_id'] = $id;

        $validasi = $this->validation->run($data, 'mahasiswa');

        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        if ($this->model->save($data)) {
            return $this->respondUpdated($data, 'data mahasiswa updated');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->fail('id tidak ditemukan');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => 'id ' . $id . ' deleted']);
        }
    }
}
