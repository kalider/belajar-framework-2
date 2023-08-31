<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSessionsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $users = $this->table('sessions');

        $users
            ->addColumn('user_id', 'integer', ['limit' => 11])
            ->addColumn('token', 'text')
            ->addColumn('start_at', 'datetime')
            ->addColumn('expire_at', 'datetime')
            ->addColumn('ip_address', 'string', ['limit' => 100])
            ->addColumn('user_agent', 'text')
            ->create();
    }
}
