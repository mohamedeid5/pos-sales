<?php

namespace App\Repositories;

use App\Http\Requests\Admin\SalesMaterialTypesRequest;
use App\Interfaces\SalesMaterialTypesInterface;
use App\Models\SalesMaterialType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SalesMaterialTypesRepository implements SalesMaterialTypesInterface
{


    public function allSalesMaterialTypes(): View
    {
        $salesMaterialTypes = SalesMaterialType::all();

        return view('admin.salesMaterialTypes.index', compact('salesMaterialTypes'));
    }

    public function createSalesMaterialTypes(): View
    {
        return view('admin.salesMaterialTypes.create');
    }

    public function storeSalesMaterialTypes(SalesMaterialTypesRequest $request): RedirectResponse
    {
        SalesMaterialType::create($request->validated()+[
            'added_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect()->route('admin.sales-material-types.index');
    }

    public function showSalesMaterialTypes(SalesMaterialType $treasury)
    {
        // TODO: Implement showSalesMaterialTypes() method.
    }

    public function editSalesMaterialTypes($id): View
    {
        $salesMaterialType = SalesMaterialType::find($id);

        return view('admin.salesMaterialTypes.edit', compact('salesMaterialType'));
    }

    public function updateSalesMaterialTypes(SalesMaterialTypesRequest $request, $id)
    {
        $salesMaterialType =  SalesMaterialType::find($id);

        $salesMaterialType->update($request->validated()+[
                'updated_by' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    public function deleteSalesMaterialTypes($id): RedirectResponse
    {
        $salesMaterialType = SalesMaterialType::find($id);
        $salesMaterialType->delete();

        return redirect()->back();
    }
}
