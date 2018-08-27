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

class EvalExpressionTest extends TestCase
{
    private $evalExpression;

    protected function setUp()
    {
        parent::setUp();


        $validator = \Mockery::mock(ValidatorExpression::class);
        $validator->shouldReceive('check')->once()->andReturn(true);

        $this->evalExpression = new EvalExpression($validator);
    }

    protected function tearDown()
    {
        $this->evalExpression = NULL;
    }

    public function addDataProvider() {
        return [
            ['2+3',5],
            ['2*3',6]
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testEvaluate($str, $expected)
    {
        $result = $this->evalExpression->evaluate($str);
        $this->assertEquals($expected, $result);
    }

}
