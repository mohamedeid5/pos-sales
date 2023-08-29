<?php

namespace App\Repositories;

use App\Http\Requests\Admin\AccountTypesRequest;
use App\Interfaces\AccountTypesRepositoryInterface;
use App\Models\AccountType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountTypesRepository implements AccountTypesRepositoryInterface
{

    public function allAccountTypes(): View
    {
        $accountTypes = AccountType::all();

        return view('admin.account_types.index', compact('accountTypes'));
    }

    public function createAccountTypes(): View
    {
        return view('admin.account_types.create');
    }

    public function storeAccountTypes(AccountTypesRequest $request): RedirectResponse
    {
        AccountType::create($request->validated());

        return redirect()->route('admin.account-types.index');
    }

    public function showAccountTypes(AccountType $accountType)
    {
        // TODO: Implement showAccountTypes() method.
    }

    public function editAccountTypes(AccountType $accountType): View
    {
        return view('admin.account_types.edit', compact('accountType'));
    }

    public function updateAccountTypes(AccountTypesRequest $accountTypesRequest, $id)
    {
       $accountType =  AccountType::findOrFail($id);
       $accountType->update($accountTypesRequest->validated());

        return redirect()->back();
    }

    public function deleteAccountTypes(AccountType $accountType): RedirectResponse
    {
        $accountType->delete();

        return redirect()->route('admin.account-types.index');
    }
}
