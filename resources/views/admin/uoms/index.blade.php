@extends('layouts.master')
@section('title')
    Uoms
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Uoms</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.uoms.create') }}">create uom</a>
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
                @foreach($uoms as $uom)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $uom->name }}</td>
                        <td>{{ $uom->is_master == 1 ? 'yes' : 'no' }}</td>
                        <td>{{ $uom->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $uom->addedBy->name }}</td>
                        <td>{{ $uom->updatedBy->name }}</td>
                        <td>{{ $uom->created_at }}</td>
                        <td>{{ $uom->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.uoms.edit', $uom->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.uoms.show', $uom->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $uom->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.uoms.delete')
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



