<?php namespace Examples;

require '../vendor/autoload.php';

use GtinValidation\GtinValidator;

$gtins = [
    '74826476',
    '748439345049',
    '7484393450407',
    '74843934504016',
    '74826471',
    '234234',
    '34degfe'
];

array_walk(
    $gtins,
    function ($gtin) {
        $validityString = (new GtinValidator($gtin))->isValid() ? 'is a valid GTIN' : 'is not a valid GTIN';
        echo $gtin . '  ' . $validityString . PHP_EOL;
    }
);
