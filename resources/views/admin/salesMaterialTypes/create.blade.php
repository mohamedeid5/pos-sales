@extends('layouts.master')
@section('title')
    create sales material type
@endsection

@section('content')
    <div class="container">
        <h2>Treasuries</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                add sales material type
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sales-material-types.store') }}" method="post">
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
                </form>
            </div>
        </div>
    </div>
@endsection
