<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\ItemCardsRequest;
use App\Models\ItemCard;

interface ItemCardsRepositoryInterface
{
    public function allItemCards();
    public function createItemCard();
    public function storeItemCard(ItemCardsRequest $request);
    public function showItemCard(ItemCard $itemCard);
    public function editItemCard(ItemCard $itemCategory);
    public function updateItemCard(ItemCardsRequest $request, $id);
    public function deleteItemCard(ItemCard $itemCard);
}
