<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddResourcesCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type'           => 'BIGINT',
            ],
            'resource_id' => [
                'type'       => 'BIGINT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('resources_categories');
    }

    public function down()
    {
        $this->forge->dropTable('resources_categories');
    }
}