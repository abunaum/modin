<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Person extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama'          => ['type' => 'varchar', 'constraint' => 255],
            'nik'           => ['type' => 'varchar', 'constraint' => 255],
            'jeniskelamin'  => ['type' => 'varchar', 'constraint' => 255],
            'tempatlahir'   => ['type' => 'varchar', 'constraint' => 255],
            'tanggallahir'  => ['type' => 'date', 'null' => true],
            'pekerjaan'     => ['type' => 'varchar', 'constraint' => 255],
            'agama'     => ['type' => 'varchar', 'constraint' => 255],
            'wn'     => ['type' => 'varchar', 'constraint' => 255],
            'provinsi'      => ['type' => 'varchar', 'constraint' => 255],
            'kabkot'        => ['type' => 'varchar', 'constraint' => 255],
            'kecamatan'     => ['type' => 'varchar', 'constraint' => 255],
            'keldes'        => ['type' => 'varchar', 'constraint' => 255],
            'rt'            => ['type' => 'varchar', 'constraint' => 255],
            'rw'            => ['type' => 'varchar', 'constraint' => 255],
            'jalan'         => ['type' => 'varchar', 'constraint' => 255],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('person', true);
    }

    public function down()
    {
        $this->forge->dropTable('person', true);
    }
}
