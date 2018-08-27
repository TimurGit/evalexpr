<?php

namespace TimurGit\EvalExpr;

class ValidatorExpression implements Validator
{
    private $expression;


    public function check($expression)
    {
        $this->expression = $expression;
        $checkStr = strtr($this->expression,config('evalexpr.allow_symbols'));
        if ($checkStr!='') {
            throw new ForbiddenSymbolsException('Ошибка: запрещенные символы '.$checkStr);
        }
        if (substr_count($this->expression,'(')!=substr_count($this->expression,')'))
        {
            throw new IncorrectSymbolsException('Ошибка: число открытых и закрытых скобок не совпадает'.$checkStr);
        }
    }

}