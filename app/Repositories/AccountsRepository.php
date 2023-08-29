<?php

namespace App\Repositories;

use App\Http\Requests\Admin\AccountsRequest;
use App\Http\Requests\Admin\AccountsUpdateRequest;
use App\Interfaces\AccountsRepositoryInterface;
use App\Interfaces\AccountTypesRepositoryInterface;
use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountsRepository implements AccountsRepositoryInterface
{

    public function allAccounts(): View
    {
        $accounts = Account::all();

        return view('admin.accounts.index', compact('accounts'));
    }

    public function createAccount(): View
    {
        $accountTypes = AccountType::all();
        $parentAccounts = Account::where('is_parent', 1)->get();
        return view('admin.accounts.create' ,compact('accountTypes', 'parentAccounts'));
    }

    public function storeAccount(AccountsRequest $request)
    {
        $lastAccount = Account::latest()->first();

        $accountNumber = $lastAccount ? $lastAccount->account_number + 1 : 1;

        $account = new Account();

        $account->name = $request->name;
        $account->account_types_id = $request->account_types_id;
        $account->is_parent = $request->is_parent;

        if ($request->is_parent == 1) {
            $account->parent_account_id = $request->parent_account_id;
        }

        $account->account_number = $accountNumber;
        $account->start_balance_status = $request->start_balance_status;
        $account->current_balance = 0;
        $account->other_table_fk = 0;

        if ($request->start_balance_status == 1) {
            $account->start_balance = $request->start_balance*(-1);
        } else if ($request->start_balance_status == 2) {
            $account->start_balance = $request->start_balance;
        } else if ($request->start_balance_status == 3) {
            $account->start_balance = 0;
        }
        $account->is_archived = $request->is_archived;
        $account->notes = $request->notes;
        $account->added_by = auth()->user()->id;
        $account->updated_by = auth()->user()->id;
        $account->save();

        return redirect()->route('admin.accounts.index');
    }

    public function showAccount(Account $account)
    {

    }

    public function editAccount(Account $account): View
    {
        $accountTypes = AccountType::all();
        $parentAccounts = Account::where('is_parent', 1)->get();
        return view('admin.accounts.edit', compact('account', 'accountTypes',  'parentAccounts'));
    }

    public function updateAccount(AccountsUpdateRequest $request, $id): RedirectResponse
    {
        $account = Account::find($id);
        $account->update($request->validated()+['updated_by'=>auth()->user()->id]);

        return redirect()->back()->with('success', 'account updated successfully');
    }

    public function deleteAccount(Account $accountType): RedirectResponse
    {
        $accountType->delete();

        return redirect()->back()->with('success', 'account deleted successfully');
    }
}
