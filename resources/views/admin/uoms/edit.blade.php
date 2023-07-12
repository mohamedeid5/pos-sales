@extends('layouts.master')
@section('title')
    edit uom
@endsection

@section('content')
    <div class="container">
        <h2>uoms</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                edit uom
            </div>
            <div class="card-body">
                <form action="{{ route('admin.uoms.update', $uom->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $uom->id }}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $uom->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select-box">Is Master</label>
                        <select class="form-control" name="is_master" id="select-box">
                            <option value="1" {{ old('is_master', $uom->is_master) ? 'yes' : '' }}>active</option>
                            <option value="0" {{ old('is_master', $uom->is_master) == 0 ? 'no' : '' }}>inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-box">Status</label>
                        <select class="form-control" name="status" id="select-box">
                            <option value="1" {{ old('is_master', $uom->status) ? 'selected' : '' }}>active</option>
                            <option value="0" {{ old('is_master', $uom->status) == 0 ? 'selected' : '' }}>inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">update</button>
                    <a href="{{ route('admin.uoms.index') }}" class="btn btn-info">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
