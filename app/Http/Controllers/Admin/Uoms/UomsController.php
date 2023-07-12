<?php

namespace App\Http\Controllers\Admin\Uoms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UomsRequest;
use App\Interfaces\UomsRepositoryInterface;
use App\Models\Uom;
use Illuminate\Http\Request;

class UomsController extends Controller
{

    protected UomsRepositoryInterface $uomsRepository;

    public function __construct(UomsRepositoryInterface $uomsRepository)
    {
        $this->uomsRepository = $uomsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->uomsRepository->allUoms();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->uomsRepository->createUoms();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UomsRequest $request)
    {
        return $this->uomsRepository->storeUoms($request);
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
    public function edit(Uom $uom)
    {
        return $this->uomsRepository->editUoms($uom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UomsRequest $request, string $id)
    {
        return $this->uomsRepository->updateUoms($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->uomsRepository->deleteUoms($id);
    }
}
