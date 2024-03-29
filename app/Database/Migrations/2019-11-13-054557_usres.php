<?php
// Avalon Hosting Services
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usres extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'phone' => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'photo' => [
				'type'           => 'TEXT'
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}