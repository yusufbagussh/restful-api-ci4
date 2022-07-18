<?php

namespace App\Models;

use CodeIgniter\Model;

class OPDModel extends Model
{
    protected $table      = 'ms_opd';
    protected $primaryKey = 'opd_kode';
    protected $allowedFields = ['opd_kode', 'opd_nama', 'opd_logo', 'opd_email', 'opd_alamat', 'opd_telp'];

    public function findById($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }

        return false;
    }
}
