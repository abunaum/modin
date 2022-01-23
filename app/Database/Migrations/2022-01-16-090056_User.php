<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'oauth_id'          => ['type' => 'varchar', 'constraint' => 255],
            'email'           => ['type' => 'varchar', 'constraint' => 255],
            'nama'  => ['type' => 'varchar', 'constraint' => 255],
            'gambar'   => ['type' => 'varchar', 'constraint' => 255],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user', true);
    }

    public function down()
    {
        $this->forge->dropTable('person', true);
    }
}
