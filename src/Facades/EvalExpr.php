<?php

namespace TimurGit\EvalExpr\Facades;

use Illuminate\Support\Facades\Facade;

class EvalExpr extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'evalexpr';
    }
}
