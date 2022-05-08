<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\IntegerStoreRequest;
use App\Http\Resources\IntegerCollection;
use App\Http\Resources\IntegerResource;
use App\Http\Resources\IntegerTopTenCollection;
use App\Services\IntegerService;

class IntegerController extends Controller
{
    /**
     * Instantiate a service in the constructor
     *
     *
     * @param IntegerService $integerService
     */
    public function __construct(IntegerService $integerService)
    {
        $this->integerService = $integerService;
    }

    public function IntergerRecent()
    {
        $integers = $this->integerService->getRecentlyAddedIntergers();

        return new IntegerCollection($integers);
    }

    public function store(IntegerStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            // Will return only validated data
            $validated = $request->validated();
            $song = $this->integerService->storeInteger($validated);
        } catch (Exception $e) {
            DB::rollBack();
            return 'error: ' . $e->getMessage();
        }

        DB::commit();
        return new IntegerResource($song);
    }

    public function getTopTen()
    {
        return new IntegerTopTenCollection($this->integerService->getTopTen());
    }
}
