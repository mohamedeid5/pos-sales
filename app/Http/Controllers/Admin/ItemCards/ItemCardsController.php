<?php

namespace App\Http\Controllers\Admin\ItemCards;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemCardsRequest;
use App\Interfaces\ItemCardsRepositoryInterface;
use App\Models\ItemCard;
use Illuminate\Http\Request;

class ItemCardsController extends Controller
{


    public function __construct(protected ItemCardsRepositoryInterface $itemCardsRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->itemCardsRepository->allItemCards();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->itemCardsRepository->createItemCard();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemCardsRequest $request)
    {
        return $this->itemCardsRepository->storeItemCard($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemCard $itemCard)
    {
        return $this->itemCardsRepository->showItemCard($itemCard);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCard $itemCard)
    {
        return $this->itemCardsRepository->editItemCard($itemCard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemCardsRequest $request, string $id)
    {
        return $this->itemCardsRepository->updateItemCard($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemCard $itemCard)
    {
        return $this->itemCardsRepository->deleteItemCard($itemCard);
    }
}
