@extends('layouts.master')
@section('title')
    create uom
@endsection

@section('content')
    <div class="container">
        <h2>uoms</h2>
        <div class="card">
            <div class="card-header font-weight-bold">
                add uom
            </div>
            <div class="card-body">
                <form action="{{ route('admin.uoms.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select-box">Is Master</label>
                        <select class="form-control" name="is_master" id="select-box">
                            <option value="1">yes</option>
                            <option value="0">no</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-box">Status</label>
                        <select class="form-control" name="status" id="select-box">
                            <option value="1">active</option>
                            <option value="0">inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Add</button>
                    <a href="{{ route('admin.uoms.index') }}" class="btn btn-info">cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
