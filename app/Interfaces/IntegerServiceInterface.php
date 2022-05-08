<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IntegerServiceInterface
{
    /**
     * @return Collection
     */
    public function getRecentlyAddedIntergers(): Collection;

    /**
     * @param array $data
     * @return Model|null
     */
    public function storeInteger(array $data): ?Model;

    /**
     * @return Collection
     */
    public function getTopTen(): Collection;
}
