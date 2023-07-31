<?php

namespace App\Http\Controllers\Admin\Stores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoresRequest;
use App\Interfaces\StoresRepositoryInterface;
use App\Models\Store;
use App\Repositories\StoresRepository;
use Illuminate\Http\Request;

class StoresController extends Controller
{



    public function __construct(protected StoresRepositoryInterface $storesRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return $this->storesRepository->allStores();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->storesRepository->createStores();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresRequest $request)
    {
        return $this->storesRepository->storeStores($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return $this->storesRepository->editStores($store);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoresRequest $request, string $id)
    {
        return $this->storesRepository->updateStores($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->storesRepository->deleteStores($id);
    }
}
