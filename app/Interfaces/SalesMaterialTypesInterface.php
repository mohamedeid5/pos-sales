<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\SalesMaterialTypesRequest;
use App\Models\SalesMaterialType;
use Illuminate\Http\Request;

interface SalesMaterialTypesInterface
{
    public function allSalesMaterialTypes();
    public function createSalesMaterialTypes();
    public function storeSalesMaterialTypes(SalesMaterialTypesRequest $request);
    public function showSalesMaterialTypes(SalesMaterialType $treasury);
    public function editSalesMaterialTypes($id);
    public function updateSalesMaterialTypes(SalesMaterialTypesRequest $request, $id);
    public function deleteSalesMaterialTypes($id);
}
