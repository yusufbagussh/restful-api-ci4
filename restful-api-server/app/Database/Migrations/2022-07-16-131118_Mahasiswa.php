<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mahasiswa_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'mahasiswa_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'mahasiswa_nim' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'mahasiswa_email' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ]
        ]);
        $this->forge->addKey('mahasiswa_id');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
