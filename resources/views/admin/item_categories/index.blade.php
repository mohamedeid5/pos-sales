@extends('layouts.master')
@section('title')
    Item Categories
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Uoms</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.item-categories.create') }}">create item category</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>is_master</th>
                    <th>status</th>
                    <th>added by</th>
                    <th>updated by</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($itemCategories as $itemCategory)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $itemCategory->name }}</td>
                        <td>{{ $itemCategory->is_master == 1 ? 'yes' : 'no' }}</td>
                        <td>{{ $itemCategory->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $itemCategory->addedBy->name }}</td>
                        <td>{{ $itemCategory->updatedBy->name }}</td>
                        <td>{{ $itemCategory->created_at }}</td>
                        <td>{{ $itemCategory->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.item-categories.edit', $itemCategory->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.item-categories.show', $itemCategory->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $itemCategory->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.item_categories.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>is_master</th>
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



