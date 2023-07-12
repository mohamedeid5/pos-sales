<?php

namespace App\Repositories;

use App\Http\Requests\Admin\StoresRequest;
use App\Interfaces\StoresRepositoryInterface;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StoresRepository implements StoresRepositoryInterface
{

    public function allStores(): View
    {
        $stores = Store::all();

        return view('admin.stores.index', compact('stores'));
    }

    public function createStores(): View
    {
        return view('admin.stores.create');
    }

    public function storeStores(StoresRequest $request): RedirectResponse
    {
        Store::create($request->validated()+[
            'added_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect()->route('admin.stores.index')->with('success', 'store added successfully');
    }

    public function showStores(Store $treasury)
    {
        // TODO: Implement showStores() method.
    }

    public function editStores(Store $store): View
    {
        return view('admin.stores.edit', compact('store'));
    }

    public function updateStores(StoresRequest $request, $id): RedirectResponse
    {
        $store = Store::findOrFail($id);

        $store->update($request->validated()+[
            'updated_by' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'store updated successfully');
    }

    public function deleteStores($id): RedirectResponse
    {
        $store = Store::find($id);
        $store->delete();

        return redirect()->back();
    }
}
