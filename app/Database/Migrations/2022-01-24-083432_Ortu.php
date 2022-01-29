<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ortu extends Migration
{
    public function up()
    {
        $data = [
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idnikah'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'status'         => ['type' => 'varchar', 'constraint' => 255],
            'nama'           => ['type' => 'varchar', 'constraint' => 255],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['idnikah']);
        $this->forge->addForeignKey('idnikah', 'datanikah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ortumeninggal', true);

        $dataada = [
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idnikah'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'status'         => ['type' => 'varchar', 'constraint' => 255],
            'bin'            => ['type' => 'varchar', 'constraint' => 255],
            'idperson'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($dataada);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['idnikah', 'idperson']);
        $this->forge->addForeignKey('idnikah', 'datanikah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idperson', 'person', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ortuada', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('ortumeninggal', 'ortumeninggal_idnikah_foreign');
            $this->forge->dropForeignKey('ortuada', 'ortuada_idnikah_foreign');
            $this->forge->dropForeignKey('ortuada', 'ortuada_idperson_foreign');
        }

        $this->forge->dropTable('ortumeninggal', true);
        $this->forge->dropTable('ortuada', true);
    }
}
