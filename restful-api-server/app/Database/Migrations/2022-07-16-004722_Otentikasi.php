<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Otentikasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_otentikasi');
    }

    public function down()
    {
        $this->forge->dropTable('ms_otentikasi');
    }
}
