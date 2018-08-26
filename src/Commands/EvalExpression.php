<?php

namespace TimurGit\EvalExpr\Commands;

use Illuminate\Console\Command;

class EvalExpression extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eval:expression';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Evaluate math expression';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('test');
    }
}
