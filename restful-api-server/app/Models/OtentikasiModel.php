<?php

namespace App\Models;

use Exception;

use CodeIgniter\Model;

class OtentikasiModel extends Model
{
    protected $table      = 'ms_otentikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email, password'];

    public function getEmail($email)
    {
        // $data = $this->where('email', $email)->first();
        $builder = $this->table("otentikasi");
        $data = $builder->where('email', $email)->first();
        if (!$data) {
            throw new Exception("Data otentikasi tidak ditemukan");
        }
        return $data;
    }
}
