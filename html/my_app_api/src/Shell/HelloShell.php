<?php

namespace App\Shell;

use Cake\Console\Shell;
use App\Controller\ApiController;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class HelloShell extends Shell
{
    public function main()
    {
        // https://book.cakephp.org/3/en/console-and-shells/shells.html
        // https://symfony.com/doc/current/logging/formatter.html
        $this->out('Hello world.');
        $call = new ApiController();
        $call->hello();

        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('logs/monolog.log', Level::Warning));
        // add records to the log
        $log->warning('Foo');
        $log->error('Bar');
    }
}
