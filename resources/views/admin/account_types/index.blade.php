@extends('layouts.master')
@section('title')
    account types
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Account Types</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.account-types.create') }}">create account types</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>status</th>
                    <th>related internal accounts</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accountTypes as $accountType)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $accountType->name }}</td>
                        <td>{{ $accountType->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $accountType->related_internal_accounts == 1 ? 'yes' : 'no' }}</td>
                        <td>{{ $accountType->created_at }}</td>
                        <td>{{ $accountType->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.account-types.edit', $accountType->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.account-types.show', $accountType->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $accountType->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.account_types.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Treasure Name</th>
                    <th>status</th>
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



