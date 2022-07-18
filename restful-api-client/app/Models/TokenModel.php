<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = 'token';
    protected $primaryKey = "id";

    protected $allowedFields = ['id', 'token'];

    public function getToken($id)
    {
        $data = $this->where('id', $id)->first();
        return $data['token'];
    }
}
