@extends('layouts.master')
@section('title')
    edit store
@endsection

@section('content')
    <div class="container">
        <h2>stores</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                edit store
            </div>
            <div class="card-body">
                <form action="{{ route('admin.stores.update', $store->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $store->id }}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $store->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $store->phone) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Address</label>
                        <textarea class="form-control" name="address" id="my-textarea" rows="3">{{ old('address', $store->address) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="select-box">Status</label>
                        <select class="form-control" name="status" id="select-box">
                            <option value="1" {{ $store->status ? 'selected' : '' }}>active</option>
                            <option value="0" {{ $store->status = 0 ? 'selected' : '' }}>inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">update</button>
                    <a href="{{ route('admin.stores.index') }}" class="btn btn-info">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
