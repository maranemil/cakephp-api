<?php
use Phinx\Migration\AbstractMigration;

class AddUser extends AbstractMigration
{
    public function change(): void
    {
        // https://book.cakephp.org/phinx/0/en/migrations.html
        // https://book.cakephp.org/migrations/3/en/index.html
        $table = $this->table('test');
        if ($this->isMigratingUp()) {
            $table->insert([['user_id' => 1, 'created' => '2020-01-19 03:14:07']])
                ->save();
        }
    }
}
