<?php namespace GtinValidationTest;

use PHPUnit_Framework_TestCase;
use GtinValidation\GtinValidator;

class GtinValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers GtinValidator::isValid
     */
    public function validGtinReturnsTrue()
    {
        $gtin8 = new GtinValidator(TestHelper::$validGtin8);
        $gtin12 = new GtinValidator(TestHelper::$validGtin12);
        $gtin13 = new GtinValidator(TestHelper::$validGtin13);
        $gtin14 = new GtinValidator(TestHelper::$validGtin14);

        $this->assertTrue($gtin8->isValid());
        $this->assertTrue($gtin12->isValid());
        $this->assertTrue($gtin13->isValid());
        $this->assertTrue($gtin14->isValid());
    }

    /**
     * @test
     * @covers GtinValidator::isValid
     */
    public function invalidGtinReturnsFalse()
    {
        $gtin8 = new GtinValidator(TestHelper::$invalidGtin8);
        $gtin12 = new GtinValidator(TestHelper::$invalidGtin12);
        $gtin13 = new GtinValidator(TestHelper::$invalidGtin13);
        $gtin14 = new GtinValidator(TestHelper::$invalidGtin14);

        $this->assertFalse($gtin8->isValid());
        $this->assertFalse($gtin12->isValid());
        $this->assertFalse($gtin13->isValid());
        $this->assertFalse($gtin14->isValid());
    }

    /**
     * @test
     * @covers GtinValidator::getGtinObject
     */
    public function validGtinReturnsCorrespondingValidObject()
    {
        $gtin8 = new GtinValidator(TestHelper::$invalidGtin8);
        $gtin12 = new GtinValidator(TestHelper::$invalidGtin12);
        $gtin13 = new GtinValidator(TestHelper::$invalidGtin13);
        $gtin14 = new GtinValidator(TestHelper::$invalidGtin14);

        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin8', $gtin8->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin12', $gtin12->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin13', $gtin13->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin14', $gtin14->getGtinObject());
    }

    /**
     * @test
     * @covers GtinValidator::isValid
     * @covers GtinValidator::getGtinObject
     */
    public function invalidGtinReturnsCorrespondingInvalidObject()
    {
        $gtin8 = new GtinValidator(TestHelper::$invalidGtin8);
        $gtin12 = new GtinValidator(TestHelper::$invalidGtin12);
        $gtin13 = new GtinValidator(TestHelper::$invalidGtin13);
        $gtin14 = new GtinValidator(TestHelper::$invalidGtin14);

        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin8', $gtin8->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin12', $gtin12->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin13', $gtin13->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\Gtin14', $gtin14->getGtinObject());

        $this->assertFalse($gtin8->isValid());
        $this->assertFalse($gtin12->isValid());
        $this->assertFalse($gtin13->isValid());
        $this->assertFalse($gtin14->isValid());
    }

    /**
     * @test
     * @covers GtinValidator::isValid
     * @covers GtinValidator::getGtinObject
     */
    public function invalidFormatGtinReturnsInvalidGtinObject()
    {
        $shortGtin = new GtinValidator(TestHelper::$shortGtin);
        $longGtin = new GtinValidator(TestHelper::$longGtin);
        $gtinWithLetters = new GtinValidator(TestHelper::$gtinWithLetters);

        $this->assertInstanceOf('GtinValidation\GtinFormats\InvalidGtin', $shortGtin->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\InvalidGtin', $longGtin->getGtinObject());
        $this->assertInstanceOf('GtinValidation\GtinFormats\InvalidGtin', $gtinWithLetters->getGtinObject());

        $this->assertFalse($shortGtin->isValid());
        $this->assertFalse($longGtin->isValid());
        $this->assertFalse($gtinWithLetters->isValid());
    }
  }
