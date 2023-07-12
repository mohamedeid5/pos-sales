@extends('layouts.master')
@section('title')
    Item Cards
@endsection

@section('content')
    <div class="container">
        <h1>Inventory</h1>
        <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12">
                        <img src="{{ url('storage/admin/item_cards/'. $itemCard->item_code . '/' . $itemCard->image)  }}" class="card-img-top" alt="{{ $itemCard->name }}">
                        <div class="card-body">
                            <a href="{{ route('admin.item-cards.edit', $itemCard->id) }}" class="btn btn-info">edit {{ $itemCard->name }}</a>
                            <p class="card-text"><strong>Name:</strong> {{ $itemCard->name }}</p>
                            <p class="card-text"><strong>Type:</strong> {{ $itemCard->itemCardType($itemCard->item_type) }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $itemCard->itemCategories->name }}</p>
                            <p class="card-text"><strong>Main UOM:</strong> {{ $itemCard->uom->name }}</p>
                            <p class="card-text"><strong>Has Retail Unit:</strong> {{ $itemCard->has_retailunit ? 'yes' : 'no' }}</p>
                            <p class="card-text"><strong>Main Sub UOM:</strong> {{ $itemCard->retailUom->name }}</p>
                            <p class="card-text"><strong>Retail UOM Quantity to Parent:</strong> {{ $itemCard->retail_uom_quantity_to_parent }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $itemCard->status ? 'active' : 'inactive' }}</p>
                            <p class="card-text"><strong>Price:</strong> {{ $itemCard->price }}</p>
                            <p class="card-text"><strong>Wholesale Price:</strong> {{ $itemCard->wholesale_price }}</p>
                            <p class="card-text"><strong>Half Wholesale Price:</strong> {{ $itemCard->half_wholesale_price }}</p>
                            <p class="card-text"><strong>Retail Price:</strong> {{ $itemCard->retail_price }}</p>
                            <p class="card-text"><strong>Half Wholesale Retail Price:</strong> {{ $itemCard->half_wholesale_retail_price }}</p>
                            <p class="card-text"><strong>Wholesale Price Retail:</strong> {{ $itemCard->wholesale_price_retail }}</p>
                            <p class="card-text"><strong>Cost Price:</strong> {{ $itemCard->cost_price }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
