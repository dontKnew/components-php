<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RememberToken extends Migration
{
    public function up():void
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'token'            => ['type' => 'text',  'null' => true],
            'expiry_date'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'expiry_time'      => ['type' => 'varchar', 'constraint' => 255,  'null' => true],
            'admin_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('remember_tokens', true);
    }

    public function down():void
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('remember_tokens', true);
        $this->db->enableForeignKeyChecks();
    }
}
