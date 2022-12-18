<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostCategory extends Migration
{
    public function up():void
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'             => ['type' => 'varchar', 'constraint'=>255,  'null' => true],
            'privacy'             => ['type' => 'varchar', 'constraint'=>255,  'null' => true],
            'admin_id'          => ['type' => 'int', 'constraint'=>11,  'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addUniqueKey("name");
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('post_categories', true);
    }

    public function down():void
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('post_categories', true);
        $this->db->enableForeignKeyChecks();
    }
}
