<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
{
    public function up():void
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'email'             => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'password'          => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'profile'           => ['type' => 'text',    'null' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('admins', true);
    }

    public function down():void
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('users', true);
        $this->db->enableForeignKeyChecks();
    }
}
