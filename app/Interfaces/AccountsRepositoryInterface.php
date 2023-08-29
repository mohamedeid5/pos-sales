<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\AccountsRequest;
use App\Http\Requests\Admin\AccountsUpdateRequest;
use App\Models\Account;

interface AccountsRepositoryInterface
{
    public function allAccounts();
    public function createAccount();
    public function storeAccount(AccountsRequest $request);
    public function showAccount(Account $account);
    public function editAccount(Account $account);
    public function updateAccount(AccountsUpdateRequest $request, $id);
    public function deleteAccount(Account $accountType);
}
