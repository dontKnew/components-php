<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostBlog extends Migration
{
    public function up(): void
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'admin_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'title' => ['type' => 'varchar', 'constraint' => 500, 'null' => true],
            'category' => ['type' => 'text', 'null' => true],
            'thumbnail' => ['type' => 'text', 'null' => true],
            'thumbnail_quality' => ['type' => 'varchar', 'constraint'=>255, 'null' => true],
            'short_description' => ['type' => 'text', 'null' => true],
            'description' => ['type' => 'longtext', 'null' => true],
            'privacy' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],

            'post_title' => ['type' => 'varchar', 'constraint'=>255, 'null' => true],
            'author' => ['type' => 'varchar', 'constraint'=>255, 'null' => true],
            'meta_description' => ['type' => 'text', 'null' => true],
            'meta_keywords' => ['type' => 'text', 'null' => true],

            'og_title' => ['type' => 'varchar', 'constraint'=>255, 'null' => true],
            'og_description' => ['type' => 'text', 'null' => true],
            'og_type' => ['type' => 'varchar', 'constraint'=>255, 'null' => true],
            'og_locale' => ['type' => 'varchar', 'constraint'=>255, 'null' => true],

            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey("title");
        $this->forge->createTable('post_blogs', true);
    }

    public function down(): void
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('post_blogs', true);
        $this->db->enableForeignKeyChecks();
    }
}
