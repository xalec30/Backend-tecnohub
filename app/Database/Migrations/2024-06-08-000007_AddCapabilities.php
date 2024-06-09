<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCapabilities extends Migration
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
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('capabilities');
    }

    public function down()
    {
        $this->forge->dropTable('capabilities');
    }
}