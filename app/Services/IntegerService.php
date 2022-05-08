<?php

namespace App\Services;

use App\Interfaces\RomanConversionInterface;
use App\Models\Integer;
use Illuminate\Support\Facades\DB;

class IntegerService
{
    /**
     * Instantiate a service in the constructor
     * Bind interface to a service
     *
     * @param RomanConversionInterface $numeralToRomanConverter
     */
    public function __construct(RomanConversionInterface $numeralToRomanConverter)
    {
        $this->numeralToRomanConverter = $numeralToRomanConverter;
    }

    public function getRecentlyAddedIntergers()
    {
        return Integer::all();
    }

    public function storeInteger(array $data)
    {
        $data['roman_equivalent'] = $this->numeralToRomanConverter->convertToRomans($data['number']);

        $integer = new Integer();
        $integer->fill($data);
        $integer->save();
        return $integer;
    }

    public function getTopTen()
    {
        $integers = DB::table('integers')
                 ->select('number', 'roman_equivalent', DB::raw('count(*) as converted_count'))
                 ->groupBy('number', 'roman_equivalent')
                 ->limit(10)
                 ->orderBy('converted_count', 'Desc')
                 ->orderBy('number')
                 ->get();

        return $integers;
    }
}

