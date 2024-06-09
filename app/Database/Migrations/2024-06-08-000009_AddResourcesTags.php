<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddResourcesTags extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tag_id' => [
                'type'           => 'BIGINT',
            ],
            'resource_id' => [
                'type'       => 'BIGINT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('resources_tags');
    }

    public function down()
    {
        $this->forge->dropTable('resources_tags');
    }
}