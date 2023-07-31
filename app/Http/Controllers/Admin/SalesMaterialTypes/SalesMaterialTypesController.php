<?php

namespace App\Http\Controllers\Admin\SalesMaterialTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalesMaterialTypesRequest;
use App\Interfaces\SalesMaterialTypesInterface;
use Illuminate\Http\Request;

class SalesMaterialTypesController extends Controller
{


    public function __construct(protected SalesMaterialTypesInterface $salesMaterialTypes)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->salesMaterialTypes->allSalesMaterialTypes();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->salesMaterialTypes->createSalesMaterialTypes();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesMaterialTypesRequest $request)
    {
        return $this->salesMaterialTypes->storeSalesMaterialTypes($request);
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
    public function edit(string $id)
    {
        return $this->salesMaterialTypes->editSalesMaterialTypes($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesMaterialTypesRequest $request, string $id)
    {
        return $this->salesMaterialTypes->updateSalesMaterialTypes($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->salesMaterialTypes->deleteSalesMaterialTypes($id);
    }
}
