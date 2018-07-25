<?php namespace GtinValidation;

/**
 * Interface GtinFormatInterface
 * @package GtinValidation
 */
interface GtinFormatInterface
{
    public function getType();
    public function getCode();
    public function isValidFormat();
    public function isValid();
}
