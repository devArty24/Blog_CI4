<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'int',
					'unsigned'       => true,
					'auto_increment' => true,
					'null' 			 => false,
			],
			'username'       => [
					'type'       => 'VARCHAR',
					'constraint' => '120',
					'null' 		 => false,
					'unique'	 => true
			],
			'email'       => [
					'type'       => 'VARCHAR',
					'constraint' => '120',
					'null' 		 => false,
					'unique'	 => true
			],
			'password'       => [
					'type'       => 'VARCHAR',
					'constraint' => '60',
					'null' => false,
			],
			'group'       => [
					'type'           => 'int',
					'unsigned'       => true,
					'null' 			 => false,
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
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('group', 'groups', 'id_group', 'NO ACTION', 'NO ACTION');
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
