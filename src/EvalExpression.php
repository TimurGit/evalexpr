<?php

namespace TimurGit\EvalExpr;

class EvalExpression implements Evaluating
{
    private $expression;
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function evaluate($str)
    {
        $this->expression = $str;
        $this->validator->check($this->expression);
        $result = 0;
        eval('$result='.$this->expression.';');
        return $result;
    }
}