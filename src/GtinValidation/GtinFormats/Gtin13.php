<?php namespace GtinValidation\GtinFormats;

use GtinValidation\AbstractGtin;

/**
 * Class Gtin13
 * @package GtinValidation\GtinFormats
 */
class Gtin13 extends AbstractGtin
{
    protected $type = "GTIN-13";
    protected $expectedLength = 13;
}
