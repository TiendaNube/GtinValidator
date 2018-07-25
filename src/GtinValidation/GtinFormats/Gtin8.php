<?php namespace GtinValidation\GtinFormats;

use GtinValidation\AbstractGtin;

/**
 * Class Gtin8
 * @package GtinValidation\GtinFormats
 */
class Gtin8 extends AbstractGtin
{
    protected $type = "GTIN-8";
    protected $expectedLength = 8;
}
