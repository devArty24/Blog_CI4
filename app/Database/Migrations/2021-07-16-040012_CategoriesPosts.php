<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesPosts extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'id_post'          => [
					'type'           => 'int',
					'unsigned'       => true,
					'null' => false,
			],
			'id_category'       => [
					'type'       => 'int',
					'unsigned' => true,
					'null' => false,
			]
		]);

		$this->forge->addForeignKey('id_post', 'posts', 'id', 'NO ACTION', 'NO ACTION');
		$this->forge->addForeignKey('id_category', 'categories', 'id', 'NO ACTION', 'NO ACTION');
		$this->forge->createTable('categories_posts');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('categories_posts');
	}
}
