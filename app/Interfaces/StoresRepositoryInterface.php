<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\StoresRequest;
use App\Models\Store;

interface StoresRepositoryInterface
{
    public function allStores();
    public function createStores();
    public function storeStores(StoresRequest $request);
    public function showStores(Store $treasury);
    public function editStores(Store $store);
    public function updateStores(StoresRequest $request, $id);
    public function deleteStores($id);
}
