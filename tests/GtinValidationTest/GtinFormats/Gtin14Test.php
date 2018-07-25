<?php namespace GtinValidationTest\GtinFormats;

use PHPUnit_Framework_TestCase;
use GtinValidationTest\TestHelper;
use GtinValidation\GtinFormats\Gtin14;

class Gtin14Test extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Gtin14::getType
     */
    public function typeIsGtin8()
    {
        $gtin = new Gtin14(TestHelper::$validGtin14);

        $this->assertEquals(
            'GTIN-14',
            $gtin->getType()
        );
    }

    /**
     * @test
     * @covers Gtin14::isValidFormat
     */
    public function validGtinIsValidFormat()
    {
        $gtin = new Gtin14(TestHelper::$validGtin14);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin14::isValid
     */
    public function validGtinIsValid()
    {
        $gtin = new Gtin14(TestHelper::$validGtin14);

        $this->assertTrue($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin14::isValidFormat
     */
    public function invalidGtinIsValidFormat()
    {
        $gtin = new Gtin14(TestHelper::$invalidGtin14);

        $this->assertTrue(
            $gtin->isValidFormat()
        );
    }

    /**
     * @test
     * @covers Gtin14::isValid
     */
    public function invalidGtinIsNotValid()
    {
        $gtin = new Gtin14(TestHelper::$invalidGtin14);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin14::isValidFormat
     */
    public function shortGtinIsNotValidFormat()
    {
        $gtin = new Gtin14(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin14::isValid
     */
    public function shortGtinIsNotValid()
    {
        $gtin = new Gtin14(TestHelper::$shortGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin14::isValidFormat
     */
    public function longGtinIsNotValidFormat()
    {
        $gtin = new Gtin14(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin14::isValid
     */
    public function longGtinIsNotValid()
    {
        $gtin = new Gtin14(TestHelper::$longGtin);
        $this->assertFalse($gtin->isValid());
    }

    /**
     * @test
     * @covers Gtin14::isValidFormat
     */
    public function otherGtinFormatIsNotValidFormat()
    {
        $gtin = new Gtin14(TestHelper::$validGtin12);
        $this->assertFalse($gtin->isValidFormat());
    }

    /**
     * @test
     * @covers Gtin14::isValid
     */
    public function otherGtinFormatIsNotValid()
    {
        $gtin = new Gtin14(TestHelper::$validGtin12);
        $this->assertFalse($gtin->isValid());
    }
}
