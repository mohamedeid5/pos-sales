<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\ItemCategoriesRequest;
use App\Models\ItemCategory;

interface ItemCategoriesRepositoryInterface
{
    public function allItemCategories();
    public function createItemCategory();
    public function storeItemCategory(ItemCategoriesRequest $request);
    public function showItemCategory(ItemCategory $treasury);
    public function editItemCategory(ItemCategory $itemCategory);
    public function updateItemCategory(ItemCategoriesRequest $request, $id);
    public function deleteItemCategory($id);
}
