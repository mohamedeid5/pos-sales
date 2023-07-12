@extends('layouts.master')
@section('title')
    Stores
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">stores</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.stores.create') }}">create store</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>status</th>
                    <th>added by</th>
                    <th>updated by</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stores as $store)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $store->addedBy->name }}</td>
                        <td>{{ $store->updatedBy->name }}</td>
                        <td>{{ $store->created_at }}</td>
                        <td>{{ $store->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.stores.edit', $store->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.stores.show', $store->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $store->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.stores.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>status</th>
                    <th>added by</th>
                    <th>updated by</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection



