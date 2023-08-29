@extends('layouts.master')
@section('title')
    accounts
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Accounts</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.accounts.create') }}">create account</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>account type</th>
                    <th>Parent Account</th>
                    <th>account number</th>
                    <th>start_balance</th>
                    <th>current_balance</th>
                    <th>notes</th>
                    <th>is archived</th>
                    <th>added By</th>
                    <th>updated By</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->accountType->name }}</td>
                        <td>{{ $account->parentAccount->name ?? 'has no parent' }}</td>
                        <td>{{ $account->account_number }}</td>
                        <td>{{ $account->start_balance }}</td>
                        <td>{{ $account->current_balance }}</td>
                        <td>{{ $account->notes }}</td>
                        <td>{{ $account->is_archived == 1 ? 'yes' : 'no' }}</td>
                        <td>{{ $account->addedBy->name }}</td>
                        <td>{{ $account->updatedBy->name }}</td>
                        <td>{{ $account->created_at }}</td>
                        <td>{{ $account->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.accounts.edit', $account->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.accounts.show', $account->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $account->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.accounts.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>account type</th>
                    <th>Parent Account</th>
                    <th>account number</th>
                    <th>start_balance</th>
                    <th>current_balance</th>
                    <th>notes</th>
                    <th>is archived</th>
                    <th>added By</th>
                    <th>updated By</th>
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



