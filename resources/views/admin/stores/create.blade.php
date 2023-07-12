@extends('layouts.master')
@section('title')
    create store
@endsection

@section('content')
<div class="container">
    <h2>stores</h2>
    <div class="card">
        <div class="card-header font-weight-bold">
            add store
        </div>
        <div class="card-body">
            <form action="{{ route('admin.stores.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-textarea">Address</label>
                    <textarea class="form-control" name="address" id="my-textarea" rows="3">{{ old('address') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="select-box">Status</label>
                    <select class="form-control" name="status" id="select-box">
                        <option value="1">active</option>
                        <option value="0">inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary">Add</button>
                <a href="{{ route('admin.stores.index') }}" class="btn btn-info">cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
