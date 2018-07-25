<?php namespace GtinValidationTest;

use PHPUnit_Framework_TestCase;

class AbstractGtinTest extends PHPUnit_Framework_TestCase
{
    protected $stub;
    protected $stubWithLetters;

    protected function setUp()
    {
        $this->stub = $this->getMockForAbstractClass(
            'GtinValidation\AbstractGtin',
            [TestHelper::$validGtin8]
        );

        $this->stubWithLetters = $this->getMockForAbstractClass(
            'GtinValidation\AbstractGtin',
            [TestHelper::$gtinWithLetters]
        );

        $this->stubWithLetters
             ->method('getExpectedLength')
             ->will($this->returnValue(strlen(TestHelper::$gtinWithLetters))
        );
    }

    /**
     * @test
     * @covers AbstractGtin::getCode
     */
    public function retrievedCodeMatchesInput()
    {
        $this->assertEquals(
            TestHelper::$validGtin8,
            $this->stub->getCode()
        );
    }

    /**
     * @test
     * @covers AbstractGtin::getReferenceNumber
     */
    public function referenceNumberMatchesInput()
    {
        $this->assertEquals(
            TestHelper::$validGtin8Reference,
            $this->stub->getReferenceNumber()
        );
    }

    /**
     * @test
     * @covers AbstractGtin::getCheckDigit
     */
    public function checkDigitMatchesInput()
    {
        $this->assertEquals(
            TestHelper::$validGtin8CheckDigit,
            $this->stub->getCheckDigit()
        );
    }

    /**
     * @test
     * @covers AbstractGtin::isValidFormat
     */
    public function inputWithLettersIsNotValidFormat()
    {
        $this->assertFalse($this->stubWithLetters->isValidFormat());
    }

    /**
     * @test
     * @covers AbstractGtin::isValid
     */
    public function inputWithLettersIsNotValid()
    {
        $this->assertFalse($this->stubWithLetters->isValid());
    }
}
