<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataNikah extends Migration
{
    public function up()
    {
        $data = [
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'jenis'          => ['type' => 'varchar', 'constraint' => 255],
            'register'       => ['type' => 'varchar', 'constraint' => 255],
            'idpr'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'statuspr'       => ['type' => 'varchar', 'constraint' => 255],
            'statusaypr'     => ['type' => 'varchar', 'constraint' => 255],
            'statusibpr'     => ['type' => 'varchar', 'constraint' => 255],
            'idlk'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'statuslk'       => ['type' => 'varchar', 'constraint' => 255],
            'statusaylk'     => ['type' => 'varchar', 'constraint' => 255],
            'statusiblk'     => ['type' => 'varchar', 'constraint' => 255],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['idpr', 'idlk']);
        $this->forge->addForeignKey('idpr', 'person', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idlk', 'person', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('datanikah', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('datanikah', 'datanikah_idpr_foreign');
            $this->forge->dropForeignKey('datanikah', 'datanikah_idlk_foreign');
        }

        $this->forge->dropTable('datanikah', true);
    }
}
