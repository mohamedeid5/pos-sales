@extends('layouts.master')
@section('title')
    create account
@endsection

@section('content')
    <div class="container">
        <h2>Accounts</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                accounts
            </div>
            <div class="card-body">
                <form action="{{ route('admin.accounts.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="select-box">Accounts Types</label>
                        <select class="form-control @error('account_types_id') is-invalid @enderror" name="account_types_id" id="select-box">
                            <option value="">select account type..</option>
                        @foreach($accountTypes as $accountType)
                            <option value="{{ $accountType->id }}" {{ old('account_types_id') == $accountType->id ? 'selected' : '' }}>{{ $accountType->name }}</option>
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
                            <option value="1" {{ old('is_parent') == '1' ? 'selected' : '' }}>yes</option>
                            <option value="0" {{ old('is_parent') == '0' ? 'selected' : '' }}>no</option>
                        </select>
                        @error('is_parent')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group" id="parent_account" @if(!old('parent_account_id') and !$errors->has('parent_account_id')) style="display: none" @endif>
                        <label for="select-box">Parent Account</label>
                        <select class="form-control @error('parent_account_id') is-invalid @enderror" name="parent_account_id" id="select-box">
                            <option value="">select parent...</option>
                        @foreach($parentAccounts as $parentAccount)
                                <option value="{{ $parentAccount->id }}" {{ old('parent_account_id') == $parentAccount->id ? 'selected' : '' }}>{{ $parentAccount->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_account_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="start_balance_status">
                        <label for="select-box">start balance status</label>
                        <select class="form-control @error('start_balance_status') is-invalid @enderror" name="start_balance_status" id="select-box">
                                <option value="">select balance status...</option>
                                <option value="1" {{ old('start_balance_status') == 1 ? 'selected' : '' }}>Debit</option>
                                <option value="2" {{ old('start_balance_status') == 2 ? 'selected' : '' }}>Credit</option>
                                <option value="3" {{ old('start_balance_status') == 3 ? 'selected' : '' }}>balance</option>
                        </select>
                        @error('start_balance_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="select-box">start balance</label>
                        <input type="number" name="start_balance" value="{{ old('start_balance', 0) }}" class="form-control @error('start_balance') is-invalid @enderror">
                        @error('start_balance')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="select-box">is archived</label>
                        <select class="form-control @error('is_archived') is-invalid @enderror" name="is_archived" id="select-box">
                            <option value="1" {{ old('is_archived') == '1' ? 'selected' : '' }}>yes</option>
                            <option value="0" {{ old('is_archived') == '0' ? 'selected' : '' }}>no</option>
                        </select>
                        @error('is_archived')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" rows="3">{{ old('notes') }}</textarea>
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
