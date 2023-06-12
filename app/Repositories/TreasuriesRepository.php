<?php

namespace App\Repositories;

use App\Http\Requests\Admin\TreasuryCreateRequest;
use App\Interfaces\TreasuriesRepositoryInterface;
use App\Models\Treasury;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TreasuriesRepository implements TreasuriesRepositoryInterface
{
    public function allTreasuries(): View
    {
        $treasuries = Treasury::where('status', 1)->get();

        return view('admin.treasuries.index', compact('treasuries'));
    }

    public function createTreasury(): View
    {
        return view('admin.treasuries.create');
    }

    public function storeTreasury(TreasuryCreateRequest $request): RedirectResponse
    {
        Treasury::create($request->validated() + [
           'added_by' => auth()->user()->id,
           'updated_by' => auth()->user()->id,
        ]);

        return redirect()->route('admin.treasuries.index');
    }

    public function showTreasury(Treasury $treasury)
    {
       // return $treasury->deliveries->toArray();
        return view('admin.treasuries.show', compact('treasury'));
    }

    public function editTreasury($id): View
    {
        $treasury = Treasury::find($id);

        return view('admin.treasuries.edit', compact('treasury'));
    }

    public function updateTreasury(TreasuryCreateRequest $request, $id): RedirectResponse
    {
       $treasury = Treasury::findOrFail($id);

       $treasury->update($request->validated()+[
            'updated_by' => auth()->user()->id
        ]);

        return redirect()->back();
    }


    public function deleteTreasury($id): RedirectResponse
    {
        $treasury = Treasury::findOrFail($id);
        $treasury->delete();

        return redirect()->back();
    }

    public function addTreasuryDelivery($id): View
    {
        $mainTreasury = Treasury::findOrFail($id);
        $treasuries = Treasury::where('status', 1)->get();

        return view('admin.treasuries.add_treasury_delivery', compact('mainTreasury', 'treasuries'));
    }

    public function storeTreasuryDelivery(Request $request): RedirectResponse
    {
        $treasury = Treasury::findOrFail($request->treasury_id);

        $treasury = $treasury->deliveries()->firstOrNew([
            'treasury_id' => $request->treasury_delivery,
            'treasury_delivery_id' => $request->treasury_id,
            'added_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        if (!$treasury->exists) {
            $treasury->save();
        } else {
            return redirect()->back()->withErrors('this treasury already exists!');
        }

        return redirect()->back()->with('success', 'treasury added successfully!');
    }

    public function deleteTreasuryDelivery($id): RedirectResponse
    {
        $treasury = Treasury::findOrFail(request('treasury_id'));

        $treasuryDelivery = $treasury->deliveries()->find($id);
        $treasuryDelivery->delete();

        return redirect()->back()->with('success', 'treasury delivery deleted!');
    }
}
