<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InfoUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user'          => [
					'type'           => 'int',
					'unsigned'       => true,
					'auto_increment' => true,
					'null' 			 => false,
			],
			'name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
					'null' => false,
			],
			'surname'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
					'null' => false,
			],
			'id_country'       => [
					'type'           => 'int',
					'unsigned'       => true,
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
		]);
		$this->forge->addKey('id_user', true);
		$this->forge->addForeignKey('id_country', 'countries', 'id_country', 'NO ACTION', 'NO ACTION');
		$this->forge->addForeignKey('id_user', 'users', 'id', 'NO ACTION', 'NO ACTION');
		$this->forge->createTable('users_info');
	}

	public function down()
	{
		$this->forge->dropTable('users_info');
	}
	/* 023556 */
}
