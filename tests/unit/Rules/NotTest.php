<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use PHPUnit\Framework\TestCase;
use Respect\Validation\Validator;

/**
 * @group  rule
 * @covers \Respect\Validation\Exceptions\NotException
 * @covers \Respect\Validation\Rules\Not
 */
class NotTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     *
     * @dataProvider providerForValidNot
     *
     * @test
     */
    public function not($v, $input): void
    {
        $not = new Not($v);
        $not->assert($input);
    }

    /**
     * @dataProvider providerForInvalidNot
     * @expectedException \Respect\Validation\Exceptions\ValidationException
     *
     * @test
     */
    public function notNotHaha($v, $input): void
    {
        $not = new Not($v);
        $not->assert($input);
    }

    /**
     * @dataProvider providerForSetName
     *
     * @test
     */
    public function notSetName($v): void
    {
        $not = new Not($v);
        $not->setName('Foo');

        self::assertEquals('Foo', $not->getName());
        self::assertEquals('Foo', $v->getName());
    }

    public function providerForValidNot()
    {
        return [
            [new IntVal(), ''],
            [new IntVal(), 'aaa'],
            [new AllOf(new NoWhitespace(), new Digit()), 'as df'],
            [new AllOf(new NoWhitespace(), new Digit()), '12 34'],
            [new AllOf(new AllOf(new NoWhitespace(), new Digit())), '12 34'],
            [new AllOf(new NoneOf(new NumericVal(), new IntVal())), 13.37],
            [new NoneOf(new NumericVal(), new IntVal()), 13.37],
            [Validator::noneOf(Validator::numericVal(), Validator::intVal()), 13.37],
        ];
    }

    public function providerForInvalidNot()
    {
        return [
            [new IntVal(), 123],
            [new AllOf(new AnyOf(new NumericVal(), new IntVal())), 13.37],
            [new AnyOf(new NumericVal(), new IntVal()), 13.37],
            [Validator::anyOf(Validator::numericVal(), Validator::intVal()), 13.37],
        ];
    }

    public function providerForSetName()
    {
        return [
            [new IntVal()],
            [new AllOf(new NumericVal(), new IntVal())],
            [new Not(new Not(new IntVal()))],
            [Validator::intVal()->setName('Bar')],
            [Validator::noneOf(Validator::numericVal(), Validator::intVal())],
        ];
    }
}
