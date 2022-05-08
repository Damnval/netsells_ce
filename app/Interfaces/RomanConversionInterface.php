<?php

namespace App\Interfaces;

interface RomanConversionInterface
{
    /**
     * @param integer $number
     * @return integer
     */
    public function convertToRomans(int $number): string;
}
