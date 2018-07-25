<?php namespace GtinValidationTest\GtinFormats;

use PHPUnit_Framework_TestCase;
use GtinValidationTest\TestHelper;
use GtinValidation\GtinFormats\Gtin12;

class Gtin12Test extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Gtin12::getType
     */
    public function typeIsGtin8()
    {
        $gtin = new Gtin12(TestHelper::$validGtin12);

        $this->assertEquals(
            'GTIN-12',
            $gtin->getType()
        );
    }

    /**
     * @test
     * @covers Gtin12::isValidFormat
     */
    public function validGtinIsValidFormat()
    {
        $gtin = new Gtin12(TestHelper::$validGtin12);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin12::isValid
     */
    public function validGtinIsValid()
    {
        $gtin = new Gtin12(TestHelper::$validGtin12);

        $this->assertTrue($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin12::isValidFormat
     */
    public function invalidGtinIsValidFormat()
    {
        $gtin = new Gtin12(TestHelper::$invalidGtin12);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin12::isValid
     */
    public function invalidGtinIsNotValid()
    {
        $gtin = new Gtin12(TestHelper::$invalidGtin12);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin12::isValidFormat
     */
    public function shortGtinIsNotValidFormat()
    {
        $gtin = new Gtin12(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin12::isValid
     */
    public function shortGtinIsNotValid()
    {
        $gtin = new Gtin12(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin12::isValidFormat
     */
    public function longGtinIsNotValidFormat()
    {
        $gtin = new Gtin12(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin12::isValid
     */
    public function longGtinIsNotValid()
    {
        $gtin = new Gtin12(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin12::isValidFormat
     */
    public function otherGtinFormatIsNotValidFormat()
    {
        $gtin = new Gtin12(TestHelper::$validGtin8);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin12::isValid
     */
    public function otherGtinFormatIsNotValid()
    {
        $gtin = new Gtin12(TestHelper::$validGtin8);
        $this->assertFalse($gtin->isValid());
    }
}
