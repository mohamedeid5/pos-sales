<?php

namespace App\Http\Controllers\Admin\AccountTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountTypesRequest;
use App\Interfaces\AccountTypesRepositoryInterface;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypesController extends Controller
{


    public function __construct(protected AccountTypesRepositoryInterface $accountTypesRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->accountTypesRepository->allAccountTypes();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->accountTypesRepository->createAccountTypes();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountTypesRequest $request)
    {
        return $this->accountTypesRepository->storeAccountTypes($request);
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
    public function edit(AccountType $accountType)
    {
        return $this->accountTypesRepository->editAccountTypes($accountType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountTypesRequest $request, string $id)
    {
        return $this->accountTypesRepository->updateAccountTypes($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountType $accountType)
    {
        return $this->accountTypesRepository->deleteAccountTypes($accountType);
    }
}
