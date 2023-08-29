@extends('layouts.master')
@section('title')
    edit account
@endsection

@section('content')
    <div class="container">
        <h2>Accounts</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                accounts
            </div>
            <div class="card-body">
                <form action="{{ route('admin.accounts.update', $account->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="account_id" value="{{ $account->id }}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $account->name) }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="select-box">Accounts Types</label>
                        <select class="form-control @error('account_types_id') is-invalid @enderror" name="account_types_id" id="select-box">
                            <option value="">select account type..</option>
                            @foreach($accountTypes as $accountType)
                                <option value="{{ $accountType->id }}" {{ old('account_types_id', $account->account_types_id) == $accountType->id ? 'selected' : '' }}>{{ $accountType->name }}</option>
                            @endforeach
                        </select>
                        @error('account_types_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="select-box">is parent</label>
                        <select class="form-control @error('is_parent') is-invalid @enderror" id="is_parent" name="is_parent" >
                            <option value="" selected>select parent...</option>
                            <option value="1" {{ old('is_parent', $account->is_parent) == '1' ? 'selected' : '' }}>yes</option>
                            <option value="0" {{ old('is_parent', $account->is_parent) == '0' ? 'selected' : '' }}>no</option>
                        </select>
                        @error('is_parent')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group" id="parent_account" @if(!old('parent_account_id', $account->parent_account_id) and !$errors->has('parent_account_id')) style="display: none" @endif>
                        <label for="select-box">Parent Account</label>
                        <select class="form-control @error('parent_account_id') is-invalid @enderror" name="parent_account_id" id="select-box">
                            <option value="">select parent...</option>
                            @foreach($parentAccounts as $parentAccount)
                                <option value="{{ $parentAccount->id }}" {{ old('parent_account_id', $account->parent_account_id) == $parentAccount->id ? 'selected' : '' }}>{{ $parentAccount->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_account_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="select-box">is archived</label>
                        <select class="form-control @error('is_archived') is-invalid @enderror" name="is_archived" id="select-box">
                            <option value="1" {{ old('is_archived', $account->is_archived) == '1' ? 'selected' : '' }}>yes</option>
                            <option value="0" {{ old('is_archived', $account->is_archived) == '0' ? 'selected' : '' }}>no</option>
                        </select>
                        @error('is_archived')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" rows="3">{{ old('notes', $account->notes) }}</textarea>
                        @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Add</button>
                    <a  href="{{ url()->previous() }}" class="btn btn-primary">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
