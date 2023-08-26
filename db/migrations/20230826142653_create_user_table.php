<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUserTable extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('fullname', 'string', ['limit' => 50])
            ->addColumn('username', 'string', ['limit' => 50])
            ->addColumn('email', 'string', ['limit' => 150])
            ->addColumn('password', 'text')
            ->addColumn('address', 'text')
            ->addColumn('dob', 'date')
            ->addColumn('status', 'smallinteger', ['limit' => 1])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'timestamp')
            ->addColumn('deleted_at', 'datetime')
            ->create();
    }
}
