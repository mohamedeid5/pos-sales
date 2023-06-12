@extends('layouts.master')
@section('title')
    Show All Treasuries
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.treasuries.create') }}">create treasury</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Treasure Name</th>
                    <th>master</th>
                    <th>status</th>
                    <th>last exchange receipt</th>
                    <th>last collection receipt</th>
                    <th>added by</th>
                    <th>updated by</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($treasuries as $treasury)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $treasury->name }}</td>
                        <td>{{ $treasury->is_master == 1 ? 'yes' : 'no' }}</td>
                        <td>{{ $treasury->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $treasury->last_exchange_receipt }}</td>
                        <td>{{ $treasury->last_collection_receipt }}</td>
                        <td>{{ $treasury->addedBy->name }}</td>
                        <td>{{ $treasury->updatedBy->name }}</td>
                        <td>{{ $treasury->created_at }}</td>
                        <td>{{ $treasury->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.treasuries.edit', $treasury->id) }}"  class="btn btn-primary">edit</a>
                            <a href="{{ route('admin.treasuries.show', $treasury->id) }}"  class="btn btn-primary">details</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $treasury->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.treasuries.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Treasure Name</th>
                    <th>master</th>
                    <th>status</th>
                    <th>last exchange receipt</th>
                    <th>last collection receipt</th>
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



