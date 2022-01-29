<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Acara extends Migration
{
    public function up()
    {
        $data = [
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idnikah'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'maskawin'       => ['type' => 'varchar', 'constraint' => 255],
            'tempat'         => ['type' => 'varchar', 'constraint' => 255],
            'tanggalnikah'   => ['type' => 'date', 'null' => true],
            'jam'            => ['type' => 'time', 'null' => true],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['idnikah']);
        $this->forge->addForeignKey('idnikah', 'datanikah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('acara', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('acara', 'acara_idnikah_foreign');
        }

        $this->forge->dropTable('acara', true);
    }
}
