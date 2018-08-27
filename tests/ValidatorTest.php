<?php

namespace TimurGit\EvalExpr\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use TimurGit\EvalExpr\EvalExpression;
use TimurGit\EvalExpr\ForbiddenSymbolsException;
use TimurGit\EvalExpr\IncorrectSymbolsException;
use TimurGit\EvalExpr\Validator;
use TimurGit\EvalExpr\ValidatorExpression;

class ValidatorTest extends TestCase
{
    private $validator;

    protected function setUp()
    {
        parent::setUp();

        $this->validator = new ValidatorExpression();
    }

    protected function tearDown()
    {
        $this->validator = NULL;
    }

    public function testForbiddenSymbolsException()
    {
        $this->expectException(ForbiddenSymbolsException::class);
        $this->validator->check('asdf');
    }

    public function testIncorrectSymbolsException()
    {
        $this->expectException(IncorrectSymbolsException::class);
        $this->validator->check('(32 +23');
    }
}
