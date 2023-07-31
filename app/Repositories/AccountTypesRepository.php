<?php

namespace App\Repositories;

use App\Http\Requests\Admin\AccountTypesRequest;
use App\Interfaces\AccountTypesRepositoryInterface;
use App\Models\AccountType;
use Illuminate\View\View;

class AccountTypesRepository implements AccountTypesRepositoryInterface
{

    public function allAccountTypes(): View
    {
        return view('admin.account_types');
    }

    public function createAccountTypes()
    {
        // TODO: Implement createAccountTypes() method.
    }

    public function storeAccountTypes(AccountTypesRequest $request)
    {
        // TODO: Implement storeAccountTypes() method.
    }

    public function showAccountTypes(AccountType $accountType)
    {
        // TODO: Implement showAccountTypes() method.
    }

    public function editAccountTypes(AccountType $accountType)
    {
        // TODO: Implement editAccountTypes() method.
    }

    public function updateAccountTypes(AccountTypesRequest $accountTypesRequest, $id)
    {
        // TODO: Implement updateAccountTypes() method.
    }

    public function deleteAccountTypes(AccountType $accountType)
    {
        // TODO: Implement deleteAccountTypes() method.
    }
}
