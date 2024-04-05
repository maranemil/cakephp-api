<?php
use Phinx\Migration\AbstractMigration;

class CreateTestTable extends AbstractMigration
{
    public function change(): void
    {
        // https://book.cakephp.org/phinx/0/en/migrations.html
        $table = $this->table('test');
        $table->addColumn('user_id', 'integer')
            ->addColumn('created', 'datetime')
            ->create();
    }
}
