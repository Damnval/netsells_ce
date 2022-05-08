<?php

namespace App\Interfaces;

interface RomanConversionInterface
{
    /**
     * @param integer $number
     * @return string
     */
    public function convertToRomans(int $number): string;
}
