<?php

namespace Respect\Validation\Rules;

class HasAttributeTest extends \PHPUnit_Framework_TestCase
{

    public function testHasAttribute()
    {
        $validator = new HasAttribute('bar');
        $obj = new \stdClass;
        $obj->bar = 'foo';
        $this->assertTrue($validator->assert($obj));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\AttributeNotPresentException
     */
    public function testNotNull()
    {
        $validator = new HasAttribute('bar');
        $obj = new \stdClass;
        $obj->baraaaaa = 'foo';
        $this->assertTrue($validator->assert($obj));
    }

    public function testValidatorAttribute()
    {
        $subValidator =  new StringLength(1, 3);
        $validator = new HasAttribute('bar', $subValidator);
        $obj = new \stdClass;
        $obj->bar = 'foo';
        $this->assertTrue($validator->assert($obj));
    }

}