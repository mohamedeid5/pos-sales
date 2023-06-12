@extends('layouts.master')
@section('title')
    Edit Settings
@endsection
@section('content')
    edit settings
    <div class="">
        <form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="system-name">System Name</label>
                <input type="text" value="{{ $settings['system_name'] }}" class="form-control" id="system-name" name="system_name">
            </div>
            @error('system_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="active {{ $settings['status'] == 'active' ? 'selected' : '' }}">Active</option>
                    <option value="inactive" {{ $settings['status'] == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address">
                    {{ $settings['address'] }}
                </textarea>
            </div>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" value="{{ $settings['phone'] }}" class="form-control" id="phone" name="phone">
            </div>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <br>

            <img src="{{ Storage::url('admin/settings/' . $settings['image']) }}" alt="Image description">

            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
