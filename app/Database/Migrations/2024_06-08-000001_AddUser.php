<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'middle_name' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
                'null' => true
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'role_id' => [
                'type' => 'SMALLINT',
                'constraint' => '1',
                'null' => false
            ],
            'last_visited' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
