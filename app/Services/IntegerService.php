<?php

namespace App\Services;

use App\Interfaces\IntegerServiceInterface;
use App\Interfaces\RomanConversionInterface;
use App\Models\Integer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class IntegerService implements IntegerServiceInterface
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

    /**
     * Will get all records order by the most recent
     *
     * @return Collection
     */
    public function getRecentlyAddedIntergers(): Collection
    {
        return Integer::orderBy('id', 'Desc')->get();
    }

    /**
     * Will Convert Integer to Roman Numerals and save to database
     *
     * @param array $data
     * @return Model|null
     */
    public function storeInteger(array $data): ?Model
    {
        $data['roman_equivalent'] = $this->numeralToRomanConverter->convertToRomans($data['number']);

        $integer = new Integer();
        $integer->fill($data);
        $integer->save();

        return $integer;
    }

    /**
     * Get top 10 integer that was most converted
     *
     * @return Collection
     */
    public function getTopTen(): Collection
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

