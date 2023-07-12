<?php

namespace App\Repositories;

use App\Http\Requests\Admin\ItemCategoriesRequest;
use App\Interfaces\ItemCategoriesRepositoryInterface;
use App\Models\ItemCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ItemCategoriesRepository implements ItemCategoriesRepositoryInterface
{

    public function allItemCategories(): View
    {
        $itemCategories = ItemCategory::all();

        return view('admin.item_categories.index', compact('itemCategories'));
    }

    public function createItemCategory(): View
    {
        return view('admin.item_categories.create');
    }

    public function storeItemCategory(ItemCategoriesRequest $request): RedirectResponse
    {
        ItemCategory::create($request->validated()+[
                'added_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

        return redirect()->route('admin.item-categories.index')->with('success', 'Item Category added successfully');
    }

    public function showItemCategory(ItemCategory $treasury)
    {
        // TODO: Implement showItemCategory() method.
    }

    public function editItemCategory(ItemCategory $itemCategory): View
    {
        return view('admin.item_categories.edit', compact('itemCategory'));
    }

    public function updateItemCategory(ItemCategoriesRequest $request, $id): RedirectResponse
    {
        $store = ItemCategory::findOrFail($id);

        $store->update($request->validated()+[
                'updated_by' => auth()->user()->id,
            ]);

        return redirect()->back()->with('success', 'Item Category updated successfully');
    }

    public function deleteItemCategory($id): RedirectResponse
    {
        $store = ItemCategory::find($id);
        $store->delete();

        return redirect()->back();
    }
}
