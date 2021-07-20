<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'id'          => [
					'type'           => 'int',
					'unsigned'       => true,
					'auto_increment' => true,
					'null' => false,
			],
			'title'       => [
					'type'       => 'VARCHAR',
					'constraint' => '120',
					'null' => false,
			],
			'slug'       => [
					'type'       => 'VARCHAR',
					'constraint' => '140',
					'null' => false,
					'unique' => true
			],
			'body'       => [
					'type'       => 'TEXT',
					'null' => false,
			],
			'cover'       => [
				'type'       => 'VARCHAR',
				'constraint' => '40',
				'null' => false
			],
			'author'       => [
				'type'       => 'int',
				'unsigned' => true,
				'null' => false
			],
			'published_at'       => [
				'type' => 'DATETIME',
				'null' => false,
			],
			'created_at' => [
					'type' => 'DATETIME',
					'null' => false,
			],
			'updated_at' => [
					'type' => 'DATETIME',
					'null' => true,
			],
			'deleted_at' => [
					'type' => 'DATETIME',
					'null' => true,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('author', 'users', 'id', 'NO ACTION', 'NO ACTION');
		$this->forge->createTable('posts');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
