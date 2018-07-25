<?php namespace GtinValidationTest\GtinFormats;

use PHPUnit_Framework_TestCase;
use GtinValidationTest\TestHelper;
use GtinValidation\GtinFormats\Gtin13;

class Gtin13Test extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Gtin13::getType
     */
    public function typeIsGtin8()
    {
        $gtin = new Gtin13(TestHelper::$validGtin13);

        $this->assertEquals(
            'GTIN-13',
            $gtin->getType()
        );
    }

    /**
     * @test
     * @covers Gtin13::isValidFormat
     */
    public function validGtinIsValidFormat()
    {
        $gtin = new Gtin13(TestHelper::$validGtin13);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin13::isValid
     */
    public function validGtinIsValid()
    {
        $gtin = new Gtin13(TestHelper::$validGtin13);

        $this->assertTrue($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin13::isValidFormat
     */
    public function invalidGtinIsValidFormat()
    {
        $gtin = new Gtin13(TestHelper::$invalidGtin13);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin13::isValid
     */
    public function invalidGtinIsNotValid()
    {
        $gtin = new Gtin13(TestHelper::$invalidGtin13);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin13::isValidFormat
     */
    public function shortGtinIsNotValidFormat()
    {
        $gtin = new Gtin13(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin13::isValid
     */
    public function shortGtinIsNotValid()
    {
        $gtin = new Gtin13(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin13::isValidFormat
     */
    public function longGtinIsNotValidFormat()
    {
        $gtin = new Gtin13(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin13::isValid
     */
    public function longGtinIsNotValid()
    {
        $gtin = new Gtin13(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin13::isValidFormat
     */
    public function otherGtinFormatIsNotValidFormat()
    {
        $gtin = new Gtin13(TestHelper::$validGtin12);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin13::isValid
     */
    public function otherGtinFormatIsNotValid()
    {
        $gtin = new Gtin13(TestHelper::$validGtin12);
        $this->assertFalse($gtin->isValid());
    }
}
