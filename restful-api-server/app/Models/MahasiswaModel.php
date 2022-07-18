<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'mahasiswa_id';
    protected $allowedFields    = ['mahasiswa_id', 'mahasiswa_nama', 'mahasiswa_nim', 'mahasiwa_email'];

    public function findById($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }

        return false;
    }
}
