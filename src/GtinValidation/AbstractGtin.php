<?php namespace GtinValidation;

/**
 * Class AbstractGtin
 * @package GtinValidation
 */
abstract class AbstractGtin implements GtinFormatInterface
{
    private $code;
    protected $type;
    protected $expectedLength;

    /**
     * @param string $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getReferenceNumber()
    {
        return substr($this->code, 0, -1);
    }

    /**
     * @return string
     */
    public function getCheckDigit()
    {
        return substr($this->code, -1);
    }

    /**
     * @return int
     */
    private function getExpectedLength()
    {
        return $this->expectedLength;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if (!$this->isValidFormat()) {
            return false;
        }

        if ($this->checkDigitIsIncorrect()) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isValidFormat()
    {
        if (!$this->isCorrectLength()) {
            return false;
        }

        if (!$this->containsOnlyNumbers()) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isCorrectLength()
    {
        return strlen($this->getCode()) == $this->getExpectedLength();
    }

    /**
     * @return bool
     */
    private function containsOnlyNumbers()
    {
        return ctype_digit($this->getCode());
    }

    /**
     * @return bool
     */
    private function checkDigitIsIncorrect()
    {
        return $this->generateValidCheckDigit() != $this->getCheckDigit();
    }

    /**
     * @return int
     */
    private function generateValidCheckDigit()
    {
        $gtinSum = 0;
        $digits = str_split($this->getReferenceNumber());
        $startPosition = 17 - $this->getExpectedLength();

        foreach ($digits as $key => $digit) {
            $digitPosition = $key + $startPosition;

            $gtinSum += $this->isOdd($digitPosition) ? ($digit * 3) : $digit;
        }

        return (10 - ($gtinSum % 10)) % 10;
    }

    /**
     * @param int $number
     * @return int
     */
    private function isOdd($number)
    {
        return $number % 2;
    }
}
