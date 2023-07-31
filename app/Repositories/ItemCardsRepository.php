<?php

namespace App\Repositories;

use App\Http\Controllers\Admin\Uploader;
use App\Http\Requests\Admin\ItemCardsRequest;
use App\Interfaces\ItemCardsRepositoryInterface;
use App\Models\ItemCard;
use App\Models\ItemCategory;
use App\Models\Uom;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ItemCardsRepository implements ItemCardsRepositoryInterface
{

    public function allItemCards(): View
    {
        $itemCards = ItemCard::latest('created_at')->get();

        return view('admin.item_cards.index', compact('itemCards'));
    }

    public function createItemCard(): View
    {
        $itemCategories = ItemCategory::where('status', 1)->get();
        $uoms = Uom::where('status', 1)->where('is_master', 1)->get();
        $subUoms = Uom::where('status', 1)->where('is_master', 0)->get();

        return view('admin.item_cards.create', compact('itemCategories', 'uoms','subUoms'));
    }

    public function storeItemCard(ItemCardsRequest $request): RedirectResponse
    {

        $lastItem = ItemCard::latest()->first();

        $itemCode = $lastItem ? $lastItem->item_code + 1 : 1;

        $itemCard = new ItemCard();

        $itemCard->item_code = $itemCode;
        $itemCard->name = $request->name;
        $itemCard->barcode = $request->barcode;
        $itemCard->item_type = $request->item_type;
        $itemCard->status = $request->status;
        $itemCard->item_categories_id = $request->item_categories_id;
        $itemCard->uom_id = $request->uom_id;
        $itemCard->price = $request->price;
        $itemCard->wholesale_price = $request->wholesale_price;
        $itemCard->half_wholesale_price = $request->half_wholesale_price;
        $itemCard->cost_price = $request->cost_price;
        $itemCard->has_retailunit = $request->has_retailunit;

        if ($request->has_retailunit == 1){
            $itemCard->retail_uom_id = $request->retail_uom_id;
            $itemCard->retail_uom_quantity_to_parent = $request->retail_uom_quantity_to_parent;
            $itemCard->retail_price = $request->retail_price;
            $itemCard->half_wholesale_retail_price = $request->half_wholesale_retail_price;
            $itemCard->wholesale_price_retail = $request->wholesale_price_retail;
            $itemCard->retail_cost_price = $request->retail_cost_price;
        }

        if ($request->image) {
            $itemCard->image = Uploader::upload($request, 'admin/item_cards/'.$itemCode);
        }

        $itemCard->added_by = auth()->user()->id;
        $itemCard->save();

        return redirect()->route('admin.item-cards.index');
    }

    public function showItemCard(ItemCard $itemCard): View
    {
        return view('admin.item_cards.show', compact('itemCard'));
    }

    public function editItemCard(ItemCard $itemCard): View
    {
        $itemCategories = ItemCategory::where('status', 1)->get();
        $uoms = Uom::where('status', 1)->where('is_master', 1)->get();
        $subUoms = Uom::where('status', 1)->where('is_master', 0)->get();

        return view('admin.item_cards.edit', compact('itemCard', 'itemCategories', 'uoms', 'subUoms'));
    }

    public function updateItemCard(ItemCardsRequest $request, $id): RedirectResponse
    {

        $itemCard = ItemCard::find($id);

        $itemCard->name = $request->name;
        $itemCard->barcode = $request->barcode;
        $itemCard->item_type = $request->item_type;
        $itemCard->status = $request->status;
        $itemCard->item_categories_id = $request->item_categories_id;
        $itemCard->uom_id = $request->uom_id;
        $itemCard->price = $request->price;
        $itemCard->wholesale_price = $request->wholesale_price;
        $itemCard->half_wholesale_price = $request->half_wholesale_price;
        $itemCard->cost_price = $request->cost_price;
        $itemCard->has_retailunit = $request->has_retailunit;

        if ($request->has_retailunit == 1){
            $itemCard->retail_uom_id = $request->retail_uom_id;
            $itemCard->retail_uom_quantity_to_parent = $request->retail_uom_quantity_to_parent;
            $itemCard->retail_price = $request->retail_price;
            $itemCard->half_wholesale_retail_price = $request->half_wholesale_retail_price;
            $itemCard->wholesale_price_retail = $request->wholesale_price_retail;
            $itemCard->retail_cost_price = $request->retail_cost_price;
        }

        if ($request->image) {
            Uploader::deleteFile('admin/item_cards/'.$itemCard->item_code.'/'.$itemCard->image);
            $itemCard->image = Uploader::upload($request, 'admin/item_cards/'.$itemCard->item_code);
        }

        $itemCard->updated_by = auth()->user()->id;
        $itemCard->save();

        return redirect()->back();
    }

    public function deleteItemCard(ItemCard $itemCard): RedirectResponse
    {
        $itemCard->delete();
        Uploader::deleteDirectory('admin/item_cards/' . $itemCard->item_code);

        return redirect()->back();
    }
}
