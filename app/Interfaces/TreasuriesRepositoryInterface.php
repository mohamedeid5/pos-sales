<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\TreasuryCreateRequest;
use App\Models\Treasury;
use Illuminate\Http\Request;

interface TreasuriesRepositoryInterface
{
    public function allTreasuries();
    public function createTreasury();
    public function storeTreasury(TreasuryCreateRequest $request);
    public function showTreasury(Treasury $treasury);
    public function editTreasury($id);
    public function updateTreasury(TreasuryCreateRequest $request, $id);
    public function deleteTreasury($id);
    public function addTreasuryDelivery($id);
    public function storeTreasuryDelivery(Request $request);
    public function deleteTreasuryDelivery($id);
}
