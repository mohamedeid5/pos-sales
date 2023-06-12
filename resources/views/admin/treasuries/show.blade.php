@extends('layouts.master')
@section('title')
{{ $treasury->name }}
@endsection

@section('content')
    <div class="container">
        <h1>Treasury Details</h1>
        <table class="table">
            <tr>
                <td>Name:</td>
                <td>{{ $treasury->name }}</td>
            </tr>
            <tr>
                <td>Is Master:</td>
                <td>{{ $treasury->is_master ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>{{ $treasury->status ? 'active' : 'inactive' }}</td>
            </tr>
            <tr>
                <td>Last Exchange Receipt:</td>
                <td>{{ $treasury->last_exchange_receipt }}</td>
            </tr>
            <tr>
                <td>Last Collection Receipt:</td>
                <td>{{ $treasury->last_collection_receipt }}</td>
            </tr>
            <tr>
                <td>Added By:</td>
                <td>{{ $treasury->addedBy->name }}. at ({{ $treasury->created_at }})</td>
            </tr>
            <tr>
                <td>Updated By:</td>
                <td>{{ $treasury->updatedBy->name }}. at ({{ $treasury->updated_at }})</td>
            </tr>
        </table>
        <a href="{{ route('admin.treasuries.index') }}" class="btn btn-primary">Back to List</a>
        <a href="{{ route('admin.treasuries.edit', $treasury->id) }}" class="btn btn-primary">Edit</a>

        <br>

        <h3>الخزن الفرعية التي ستسلم عهدتها الى الخرنة ({{ $treasury->name }})
            <a href="{{ route('admin.treasuries.add.treasury.delivery', $treasury->id) }}" class="btn btn-info">add new</a>
        </h3>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Updated At</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($treasury->deliveries as $treasuryDelivery)
                <tr>
                    <td>{{ $treasuryDelivery->treasury->name }}</td>
                    <td>{{ $treasuryDelivery->treasury->updated_at }}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $treasuryDelivery->id }}">Delete</button>

                    </td>
                </tr>
                @include('admin.treasuries.delete_delivery')
            @endforeach
            </tbody>
        </table>

    </div>


@endsection
