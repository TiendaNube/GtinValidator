<?php namespace GtinValidationTest;

class TestHelper
{
    public static $shortGtin = '123';
    public static $longGtin = '123456789123454250';
    public static $gtinWithLetters = '123456RF';

    public static $validGtin8 = '12345670';
    public static $validGtin8Reference = '1234567';
    public static $validGtin8CheckDigit = '0';
    public static $invalidGtin8 = '12345678';

    public static $validGtin12 = '123456789104';
    public static $validGtin12Reference = '12345678910';
    public static $validGtin12CheckDigit = '4';
    public static $invalidGtin12 = '123456789101';

    public static $validGtin13 = '1234567891019';
    public static $validGtin13Reference = '123456789101';
    public static $validGtin13CheckDigit = '9';
    public static $invalidGtin13 = '1234567891011';

    public static $validGtin14 = '12345678910110';
    public static $validGtin14Reference = '1234567891011';
    public static $validGtin14CheckDigit = '0';
    public static $invalidGtin14 = '12345678910111';
}