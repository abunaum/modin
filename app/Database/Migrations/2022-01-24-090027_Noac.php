<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Noac extends Migration
{
    public function up()
    {
        $data = [
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idnikah'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'idperson'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'noac'           => ['type' => 'varchar', 'constraint' => 255],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['idnikah', 'idperson']);
        $this->forge->addForeignKey('idnikah', 'datanikah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idperson', 'person', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('noac', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('noac', 'noac_idnikah_foreign');
            $this->forge->dropForeignKey('noac', 'noac_idperson_foreign');
        }

        $this->forge->dropTable('noac', true);
    }
}
