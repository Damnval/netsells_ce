<?php

namespace App\Interfaces;

interface RomanConversionInterface
{
    public function convertToRomans(int $number): string;
}
