<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\AccountTypesRequest;
use App\Models\AccountType;

interface AccountTypesRepositoryInterface
{
    public function allAccountTypes();
    public function createAccountTypes();
    public function storeAccountTypes(AccountTypesRequest $request);
    public function showAccountTypes(AccountType $accountType);
    public function editAccountTypes(AccountType $accountType);
    public function updateAccountTypes(AccountTypesRequest $accountTypesRequest, $id);
    public function deleteAccountTypes(AccountType $accountType);
}
