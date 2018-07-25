<?php namespace GtinValidation;

use GtinValidation\GtinFormats\Gtin8;
use GtinValidation\GtinFormats\Gtin12;
use GtinValidation\GtinFormats\Gtin13;
use GtinValidation\GtinFormats\Gtin14;
use GtinValidation\GtinFormats\InvalidGtin;

/**
 * Validates GTIN and provides access to the generated GtinFormatInterface object
 *
 * Class GtinValidator
 * @package GtinValidation
 */
class GtinValidator
{
    private $gtinObject;
    private $isValid;

    /**
     * Creates correct GTIN object, validates that object and stores
     * resulting object and validity in member variables
     *
     * @param string $gtin
     */
    public function __construct($gtin)
    {
        $this->gtinObject = $this->createGtinObject($gtin);
        $this->isValid = $this->validate($this->gtinObject);
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     * @return GtinFormatInterface
     */
    public function getGtinObject()
    {
        return $this->gtinObject;
    }

    /**
     * @param GtinFormatInterface $gtinObject
     * @return bool
     */
    private function validate(GtinFormatInterface $gtinObject)
    {
        if ($gtinObject instanceof InvalidGtin) {
            return false;
        }

        if (!$gtinObject->isValid()) {
            return false;
        }

        return true;
    }

    /**
     * @param string $gtin
     * @return GtinFormatInterface
     */
    private function createGtinObject($gtin)
    {
        $gtinObjects = [
            new Gtin8($gtin),
            new Gtin12($gtin),
            new Gtin13($gtin),
            new Gtin14($gtin)
        ];

        // Return a valid GTIN object if the GTIN
        // matches any of our desired formats
        foreach ($gtinObjects as $gtinObject) {
            if ($gtinObject->isValidFormat()) {
                return $gtinObject;
            }
        }

        return new InvalidGtin($gtin);
    }
}
