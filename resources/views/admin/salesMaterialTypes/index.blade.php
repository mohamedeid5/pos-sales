@extends('layouts.master')
@section('title')
    Sales material types
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.sales-material-types.create') }}">create sales material type</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Treasure Name</th>
                    <th>status</th>
                    <th>added by</th>
                    <th>updated by</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($salesMaterialTypes as $salesMaterialType)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $salesMaterialType->name }}</td>
                        <td>{{ $salesMaterialType->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $salesMaterialType->addedBy->name }}</td>
                        <td>{{ $salesMaterialType->updatedBy->name }}</td>
                        <td>{{ $salesMaterialType->created_at }}</td>
                        <td>{{ $salesMaterialType->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.sales-material-types.edit', $salesMaterialType->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.sales-material-types.show', $salesMaterialType->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $salesMaterialType->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.salesMaterialTypes.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Treasure Name</th>
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



