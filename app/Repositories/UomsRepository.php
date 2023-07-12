<?php

namespace App\Repositories;

use App\Http\Requests\Admin\UomsRequest;
use App\Interfaces\UomsRepositoryInterface;
use App\Models\Uom;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UomsRepository implements UomsRepositoryInterface
{

    public function allUoms(): View
    {
        $uoms = Uom::all();

        return view('admin.uoms.index', compact('uoms'));
    }

    public function createUoms(): View
    {
        return view('admin.uoms.create');
    }

    public function storeUoms(UomsRequest $request): RedirectResponse
    {
        Uom::create($request->validated()+[
                'added_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

        return redirect()->route('admin.uoms.index')->with('success', 'uom added successfully');
    }

    public function showUoms(Uom $treasury)
    {
        // TODO: Implement showUoms() method.
    }

    public function editUoms(Uom $uom): View
    {
        return view('admin.uoms.edit', compact('uom'));
    }

    public function updateUoms(UomsRequest $request, $id): RedirectResponse
    {
        $store = Uom::findOrFail($id);

        $store->update($request->validated()+[
                'updated_by' => auth()->user()->id,
            ]);

        return redirect()->back()->with('success', 'uom updated successfully');
    }

    public function deleteUoms($id): RedirectResponse
    {
        $store = Uom::find($id);
        $store->delete();

        return redirect()->back();
    }
}
