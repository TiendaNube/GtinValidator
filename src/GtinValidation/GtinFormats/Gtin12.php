<?php namespace GtinValidation\GtinFormats;

use GtinValidation\AbstractGtin;

/**
 * Class Gtin12
 * @package GtinValidation\GtinFormats
 */
class Gtin12 extends AbstractGtin
{
    protected $type = "GTIN-12";
    protected $expectedLength = 12;
}
