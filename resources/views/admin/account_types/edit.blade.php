@extends('layouts.master')
@section('title')
    edit account types
@endsection

@section('content')
    <div class="container">
        <h2>Account Types</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                edit account type
            </div>
            <div class="card-body">
                <form action="{{ route('admin.account-types.update', $accountType->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $accountType->name) }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="select-box">related internal accounts</label>
                        <input type="number" name="related_internal_accounts" value="{{ old('related_internal_accounts', $accountType->related_internal_accounts) }}" class="form-control @error('related_internal_accounts') is-invalid @enderror">
                        @error('related_internal_accounts')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="select-box">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="select-box">
                            <option value="1" {{ old('status', $accountType->status) == 1 ? 'selected' : '' }}>active</option>
                            <option value="0" {{ old('status', $accountType->status) == 0 ? 'selected' : '' }}>inactive</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="select-box">related internal accounts</label>
                        <select class="form-control @error('related_internal_accounts') is-invalid @enderror" name="related_internal_accounts" id="select-box">
                            <option value="1" {{ old('status', $accountType->related_internal_accounts) == 1 ? 'selected' : '' }}>yes</option>
                            <option value="0" {{ old('status', $accountType->related_internal_accounts) == 0 ? 'selected' : '' }}>no</option>
                        </select>
                        @error('related_internal_accounts')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">update</button>
                    <a  href="{{ url()->previous() }}" class="btn btn-primary">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
