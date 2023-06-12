<?php

namespace App\Http\Controllers\Admin\Treasuries;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TreasuryCreateRequest;
use App\Interfaces\TreasuriesRepositoryInterface;
use App\Models\Treasury;
use Illuminate\Http\Request;

class TreasuriesController extends Controller
{
    protected TreasuriesRepositoryInterface $treasuriesRepository;

    public function __construct(TreasuriesRepositoryInterface $treasuriesRepository)
    {
        $this->treasuriesRepository = $treasuriesRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->treasuriesRepository->allTreasuries();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->treasuriesRepository->createTreasury();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TreasuryCreateRequest $request)
    {
        return $this->treasuriesRepository->storeTreasury($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Treasury $treasury)
    {
        return $this->treasuriesRepository->showTreasury($treasury);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->treasuriesRepository->editTreasury($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TreasuryCreateRequest $request, string $id)
    {
        return $this->treasuriesRepository->updateTreasury($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->treasuriesRepository->deleteTreasury($id);
    }

    public function addTreasuryDelivery($id)
    {
        return $this->treasuriesRepository->addTreasuryDelivery($id);
    }

    public function storeTreasuryDelivery(Request $request)
    {
        return $this->treasuriesRepository->storeTreasuryDelivery($request);
    }

    public function deleteTreasuryDelivery($id)
    {
        return $this->treasuriesRepository->deleteTreasuryDelivery($id);
    }
}
