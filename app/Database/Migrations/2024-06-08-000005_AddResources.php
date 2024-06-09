<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddResources extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'description' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'short_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'url' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'user_id' => [
                'type' => 'BIGINT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('resources');
    }

    public function down()
    {
        $this->forge->dropTable('resources');
    }
}