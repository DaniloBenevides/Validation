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

/**
 * @group  rule
 * @covers \Respect\Validation\Exceptions\AnyOfException
 * @covers \Respect\Validation\Rules\AnyOf
 */
class AnyOfTest extends TestCase
{
    /**
     * @test
     */
    public function valid(): void
    {
        $valid1 = new Callback(function () {
            return false;
        });
        $valid2 = new Callback(function () {
            return true;
        });
        $valid3 = new Callback(function () {
            return false;
        });
        $o = new AnyOf($valid1, $valid2, $valid3);
        self::assertTrue($o->validate('any'));
        $o->assert('any');
        $o->check('any');
    }

    /**
     * @expectedException \Respect\Validation\Exceptions\AnyOfException
     *
     * @test
     */
    public function invalid(): void
    {
        $valid1 = new Callback(function () {
            return false;
        });
        $valid2 = new Callback(function () {
            return false;
        });
        $valid3 = new Callback(function () {
            return false;
        });
        $o = new AnyOf($valid1, $valid2, $valid3);
        self::assertFalse($o->validate('any'));
        $o->assert('any');
    }

    /**
     * @expectedException \Respect\Validation\Exceptions\XdigitException
     *
     * @test
     */
    public function invalidCheck(): void
    {
        $o = new AnyOf(new Xdigit(), new Alnum());
        self::assertFalse($o->validate(-10));
        $o->check(-10);
    }
}
