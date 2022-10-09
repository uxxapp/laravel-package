<?php

namespace XiaoYou\OaCms\Console\Commands;
use XiaoYou\OaCms\BaseCommand;

class Test extends BaseCommand
{
    protected $signature = 'z:test';

    protected $description = 'test';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $account = 18081102482;
        $password = 123456;

        $this->info('x='.md5($account.md5($password)));

        return 0;
    }
}
