<?php

namespace App\Http\Controllers\Admin\ItemCategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemCategoriesRequest;
use App\Interfaces\ItemCategoriesRepositoryInterface;
use App\Models\ItemCategory;
use App\Repositories\ItemCategoriesRepository;
use Illuminate\Http\Request;

class ItemCategoriesController extends Controller
{

    public function __construct(protected ItemCategoriesRepositoryInterface $itemCategoriesRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->itemCategoriesRepository->allItemCategories();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->itemCategoriesRepository->createItemCategory();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemCategoriesRequest $request)
    {
        return $this->itemCategoriesRepository->storeItemCategory($request);
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
    public function edit(ItemCategory $itemCategory)
    {
        return $this->itemCategoriesRepository->editItemCategory($itemCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemCategoriesRequest $request, string $id)
    {
        return $this->itemCategoriesRepository->updateItemCategory($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->itemCategoriesRepository->deleteItemCategory($id);
    }
}
