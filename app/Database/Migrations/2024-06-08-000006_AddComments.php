<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddComments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'resource_id' => [
                'type' => 'BIGINT',
                'null' => false
            ],
            'comment' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'status' => [
                'type' => 'SMALLINT',
                'constraint' => '1',
                'null' => true
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
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}