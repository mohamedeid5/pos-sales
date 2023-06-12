@extends('layouts.master')
@section('title')
    update treasury
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.treasuries.update', $treasury->id) }}">
        @csrf
        @method('PUT')

        <input type="hidden" value="{{ $treasury->id }}" name="id">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $treasury->name) }}" placeholder="Enter name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_master">Is Master:</label>
            <select class="form-control @error('is_master') is-invalid @enderror" id="is_master" name="is_master">
                <option value="1" {{ old('is_master', $treasury->is_master) == 1 ? 'selected' : '' }}>yes</option>
                <option value="0" {{ old('is_master', $treasury->is_master) == 0 ? 'selected' : '' }}>no</option>
            </select>
            @error('is_master')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_exchange_receipt">Last Exchange Receipt:</label>
            <input type="number" class="form-control @error('last_exchange_receipt') is-invalid @enderror" id="last_exchange_receipt" name="last_exchange_receipt" value="{{ old('last_exchange_receipt', $treasury->last_exchange_receipt) }}" placeholder="Enter last exchange receipt">
            @error('last_exchange_receipt')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_collection_receipt">Last Collection Receipt:</label>
            <input type="number" class="form-control @error('last_collection_receipt') is-invalid @enderror" id="last_collection_receipt" name="last_collection_receipt" value="{{ old('last_collection_receipt', $treasury->last_collection_receipt) }}" placeholder="Enter last collection receipt">
            @error('last_collection_receipt')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                <option value="1" {{ old('status', $treasury->status) == 1 ? 'selected' : '' }}>active</option>
                <option value="0" {{ old('status', $treasury->status) == 0 ? 'selected' : '' }}>inactive</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.treasuries.index') }}" class="btn btn-primary">Back</a>

    </form>
@endsection
