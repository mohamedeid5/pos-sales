@extends('layouts.master')
@section('title')
    create Category Item
@endsection

@section('content')
    <div class="container">
        <h2>item-categories</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                add Category Item
            </div>
            <div class="card-body">
                <form action="{{ route('admin.item-categories.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select-box">Status</label>
                        <select class="form-control" name="status" id="select-box">
                            <option value="1">active</option>
                            <option value="0">inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Add</button>
                    <a href="{{ route('admin.item-categories.index') }}" class="btn btn-info">cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
