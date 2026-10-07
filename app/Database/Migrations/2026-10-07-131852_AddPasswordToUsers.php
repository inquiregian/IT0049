<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'avatar',
            ],
        ]);

        $passwordHash = password_hash('Pos1234!', PASSWORD_DEFAULT);

        $this->db->table('users')->update([
            'password' => $passwordHash,
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
    }
}