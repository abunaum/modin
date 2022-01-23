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
            'nikpr'          => ['type' => 'varchar', 'constraint' => 255],
            'statusaypr'     => ['type' => 'varchar', 'constraint' => 255],
            'namaaypr'       => ['type' => 'varchar', 'constraint' => 255],
            'binaypr'        => ['type' => 'varchar', 'constraint' => 255],
            'nikaypr'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'statusibpr'     => ['type' => 'varchar', 'constraint' => 255],
            'namaibpr'       => ['type' => 'varchar', 'constraint' => 255],
            'binibpr'        => ['type' => 'varchar', 'constraint' => 255],
            'nikibpr'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'niklk'          => ['type' => 'varchar', 'constraint' => 255],
            'statusaylk'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'namaaylk'       => ['type' => 'varchar', 'constraint' => 255],
            'binaylk'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'nikaylk'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'statusiblk'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'namaiblk'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'biniblk'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'nikiblk'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datanikah', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
        }

        $this->forge->dropTable('datanikah', true);
    }
}
