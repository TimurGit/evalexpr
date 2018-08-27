<?php

namespace TimurGit\EvalExpr\Commands;

use Illuminate\Console\Command;
use TimurGit\EvalExpr\Evaluating;
use TimurGit\EvalExpr\ForbiddenSymbolsException;
use TimurGit\EvalExpr\IncorrectSymbolsException;

class EvalExpressionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eval:expression {evalString}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Evaluate math expression';

    protected $evaluater;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Evaluating $evaluater)
    {
        parent::__construct();
        $this->evaluater = $evaluater;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $evalstr = $this->evaluater->evaluate($this->argument('evalString'));
            $this->info($evalstr);
        } catch (ForbiddenSymbolsException $exception) {
            $this->error($exception->getMessage());
        } catch (IncorrectSymbolsException $exception) {
            $this->error($exception->getMessage());
        }
    }
}
