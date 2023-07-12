@extends('layouts.master')
@section('title')
    Item Cards
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">item cards</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('admin.item-cards.create') }}">create item card</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>type</th>
                    <th>item category</th>
                    <th>parent</th>
                    <th>uom name</th>
                    <th>retail unit</th>
                    <th>status</th>
                    <th>has retail unit</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($itemCards as $itemCard)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $itemCard->name }}</td>
                        <td>{{ $itemCard->itemCardType($itemCard->item_type) }}</td>
                        <td>{{ $itemCard->itemCategories->name }}</td>
                        <td>{{ $itemCard->parentItemCard->name ?? 'لا يوجد' }}</td>
                        <td>{{ $itemCard->uom->name }}</td>
                        <td>{{ $itemCard->retailUom->name ?? '' }}</td>
                        <td>{{ $itemCard->status == 1 ? 'active' : 'inactive' }}</td>
                        <td>{{ $itemCard->has_retailunit == 1 ? 'yes' : 'no' }}</td>
                        <td>
                            <a href="{{ route('admin.item-cards.edit', $itemCard->id) }}"  class="btn btn-sm btn-primary">edit</a>
                            <a href="{{ route('admin.item-cards.show', $itemCard->id) }}"  class="btn btn-sm btn-primary">details</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="display: inline-block;" data-target="#deleteModal{{ $itemCard->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('admin.item_cards.delete')
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>type</th>
                    <th>item category</th>
                    <th>parent</th>
                    <th>uom name</th>
                    <th>retail unit</th>
                    <th>status</th>
                    <th>has retail unit</th>
                    <th>actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection



