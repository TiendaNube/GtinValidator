<?php namespace GtinValidationTest\GtinFormats;

use PHPUnit_Framework_TestCase;
use GtinValidationTest\TestHelper;
use GtinValidation\GtinFormats\Gtin8;

class Gtin8Test extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Gtin8::getType
     */
    public function typeIsGtin8()
    {
        $gtin = new Gtin8(TestHelper::$validGtin8);

        $this->assertEquals(
            'GTIN-8',
            $gtin->getType()
        );
    }

    /**
     * @test
     * @covers Gtin8::isValidFormat
     */
    public function validGtinIsValidFormat()
    {
        $gtin = new Gtin8(TestHelper::$validGtin8);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin8::isValid
     */
    public function validGtinIsValid()
    {
        $gtin = new Gtin8(TestHelper::$validGtin8);
        $this->assertTrue($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin8::isValidFormat
     */
    public function invalidGtinIsValidFormat()
    {
        $gtin = new Gtin8(TestHelper::$invalidGtin8);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin8::isValid
     */
    public function invalidGtinIsNotValid()
    {
        $gtin = new Gtin8(TestHelper::$invalidGtin8);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin8::isValidFormat
     */
    public function shortGtinIsNotValidFormat()
    {
        $gtin = new Gtin8(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin8::isValid
     */
    public function shortGtinIsNotValid()
    {
        $gtin = new Gtin8(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin8::isValidFormat
     */
    public function longGtinIsNotValidFormat()
    {
        $gtin = new Gtin8(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin8::isValid
     */
    public function longGtinIsNotValid()
    {
        $gtin = new Gtin8(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin8::isValidFormat
     */
    public function otherGtinFormatIsNotValidFormat()
    {
        $gtin = new Gtin8(TestHelper::$validGtin12);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin8::isValid
     */
    public function otherGtinFormatIsNotValid()
    {
        $gtin = new Gtin8(TestHelper::$validGtin12);
        $this->assertFalse($gtin->isValid());
    }
}
