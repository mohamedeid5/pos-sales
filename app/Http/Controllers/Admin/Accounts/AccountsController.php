<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountsRequest;
use App\Http\Requests\Admin\AccountsUpdateRequest;
use App\Interfaces\AccountsRepositoryInterface;
use App\Interfaces\AccountTypesRepositoryInterface;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{

    public function __construct(protected AccountsRepositoryInterface $accountsRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->accountsRepository->allAccounts();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->accountsRepository->createAccount();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountsRequest $request)
    {
        return $this->accountsRepository->storeAccount($request);
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
    public function edit(Account $account)
    {
        return $this->accountsRepository->editAccount($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountsUpdateRequest $request, string $id)
    {
        return $this->accountsRepository->updateAccount($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        return $this->accountsRepository->deleteAccount($account);
    }
}
