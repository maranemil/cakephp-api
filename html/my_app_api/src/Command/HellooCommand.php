<?php

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;

class HellooCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io): int
    {
        # https://book.cakephp.org/4/en/console-commands/commands.html
        $io->out('Hello world Command.');

        $old_date = '';
        $conn = ConnectionManager::get('default');
        $query = $conn->selectQuery('*', 'test')->where(['id' => 1])->limit(1);
        foreach ($query as $row) {
            if (!empty($row)) {
                $old_date = $row["created"];
                break;
            }
        }
        $new_date = date('Y-m-d H:i:s');
        $io->out($old_date);
        $io->out($new_date);
        $conn->updateQuery('test')->set(['created' => $new_date])->where(['id' => 1])->execute();

        return static::CODE_SUCCESS;
    }
}

