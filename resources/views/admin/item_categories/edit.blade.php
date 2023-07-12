@extends('layouts.master')
@section('title')
    edit  {{ $itemCategory->name }}
@endsection

@section('content')
    <div class="container">
        <h2>item-categories</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                edit Item Category | {{ $itemCategory->name }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.item-categories.update', $itemCategory->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $itemCategory->id }}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $itemCategory->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select-box">Is Master</label>
                        <select class="form-control" name="is_master" id="select-box">
                            <option value="1" {{ old('is_master', $itemCategory->is_master) ? 'yes' : '' }}>yes</option>
                            <option value="0" {{ old('is_master', $itemCategory->is_master) == 0 ? 'no' : '' }}>no</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-box">Status</label>
                        <select class="form-control" name="status" id="select-box">
                            <option value="1" {{ old('is_master', $itemCategory->status) ? 'selected' : '' }}>active</option>
                            <option value="0" {{ old('is_master', $itemCategory->status) == 0 ? 'selected' : '' }}>inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">update</button>
                    <a href="{{ route('admin.item-categories.index') }}" class="btn btn-info">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
