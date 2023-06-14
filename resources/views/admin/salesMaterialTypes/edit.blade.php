@extends('layouts.master')
@section('title')
    edit sales material type
@endsection

@section('content')
    <div class="container">
        <h2>Treasuries</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                edit sales material type
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sales-material-types.update', $salesMaterialType->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ $salesMaterialType->id }}" name="id">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $salesMaterialType->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select-box">Select Box</label>
                        <select class="form-control" name="status" id="select-box">
                            <option value="1" {{ $salesMaterialType->status ? 'selected' : '' }} >active</option>
                            <option value="0" {{ $salesMaterialType->status == 0 ? 'selected' : '' }}>inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
