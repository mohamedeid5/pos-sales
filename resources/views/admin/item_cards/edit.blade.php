@extends('layouts.master')
@section('title')
    Create Item Card
@endsection

@section('content')
    <div class="container">
        <h3>card</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <br>
                <form method="post" action="{{ route('admin.item-cards.update', $itemCard->id) }}" enctype="multipart/form-data" novalidate id="itemcardform">
                    @csrf
                    @method('PUT')

                    <input type="hidden" value="{{ $itemCard->id }}" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" name="barcode" id="barcode" class="form-control @error('name') is-invalid @enderror" value="{{ old('barcode', $itemCard->barcode) }}">
                                @error('barcode')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $itemCard->name) }}">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_type">Type</label>
                                <select name="item_type" id="item_type" class="form-control @error('item_type') is-invalid @enderror">
                                    <option value="">Select Type</option>
                                    <option value="1" {{ old('item_type', $itemCard->item_type) == 1 ? 'selected' : '' }}>مخزني</option>
                                    <option value="2" {{ old('item_type', $itemCard->item_type) == 2 ? 'selected' : '' }}>استهلاكي بصلاحية</option>
                                    <option value="3" {{ old('item_type', $itemCard->item_type) == 3 ? 'selected' : '' }}>عهدة</option>
                                    <option value="4" {{ old('item_type', $itemCard->item_type) == 4 ? 'selected' : '' }}>غير محدد</option>
                                </select>
                                @error('item_type')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_categories_id">Item Category</label>
                                <select name="item_categories_id" id="item_categories_id" class="form-control @error('item_categories_id') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($itemCategories as $category)
                                        <option value="{{ $category->id }}" {{ old('item_categories_id', $itemCard->item_categories_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('item_categories_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uom_id">Main UOM</label>
                                <select name="uom_id" id="uom_id" class="form-control @error('uom_id') is-invalid @enderror">
                                    <option value="">Select UOM</option>
                                    @foreach($uoms as $uom)
                                        <option value="{{ $uom->id }}" {{ old('uom_id', $itemCard->uom_id) == $uom->id ? 'selected' : '' }}>{{ $uom->name }}</option>
                                    @endforeach
                                </select>
                                @error('uom_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="has_retailunit">has retail unit</label>
                                <select name="has_retailunit" id="has_retailunit" class="form-control @error('has_retailunit') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="1" {{ old('has_retailunit', $itemCard->has_retailunit) == 1 ? 'selected' : '' }}>yes</option>
                                    <option value="0" {{ old('has_retailunit', $itemCard->has_retailunit) == 0 ? 'selected' : '' }}>no</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6" >
                            <div class="form-group related_retail" @if(!old('retail_uom_id') and !$errors->has('retail_uom_id') and !$itemCard->retail_uom_id) style="display: none" @endif>
                                <label for="retail_uom_id">Main Sub UOM <span class="parent_uom_name"></span></label>
                                <select name="retail_uom_id" id="retail_uom_id" class="form-control @error('retail_uom_id') is-invalid @enderror">
                                    <option value="">Select UOM</option>
                                    @foreach($subUoms as $uom)
                                        <option value="{{ $uom->id }}" {{ old('retail_uom_id', $itemCard->retail_uom_id) == $uom->id ? 'selected' : '' }}>{{ $uom->name }}</option>
                                    @endforeach
                                </select>
                                @error('retail_uom_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group related_retail" @if(!old('retail_uom_quantity_to_parent') and !$errors->has('retail_uom_quantity_to_parent') and !$itemCard->retail_uom_quantity_to_parent) style="display: none" @endif>
                                <label for="retail_uom_quantity_to_parent">Retail UOM Quantity to Parent <span class="parent_uom_name"></span></label>
                                <input type="number" name="retail_uom_quantity_to_parent" id="retail_uom_quantity_to_parent" class="form-control @error('retail_uom_quantity_to_parent') is-invalid @enderror" value="{{ old('retail_uom_quantity_to_parent', $itemCard->retail_uom_quantity_to_parent) }}">
                                @error('retail_uom_quantity_to_parent')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Select a status</option>
                                    <option value="1" {{ old('status', $itemCard->status) == 1 ? 'selected' : '' }}>active</option>
                                    <option value="0" {{ old('status', $itemCard->status) == 0 ? 'selected' : '' }}>inactive</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    <img src="{{ url('storage/admin/item_cards/' . $itemCard->id . '/' . $itemCard->image) }}" id="preview" alt="uploaded image" style="width: 200px;height: 200px;">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 related_parent_price" @if(!old('price') and !$errors->has('price') and !$itemCard->price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="price">Price: <span class="parent_price"></span></label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $itemCard->price) }}" step="0.01" required>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 related_parent_price" @if(!old('wholesale_price') and !$errors->has('wholesale_price') and !$itemCard->wholesale_price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="wholesale_price">Wholesale Price: <span class="parent_price"></span></label>
                                <input type="number" class="form-control @error('wholesale_price') is-invalid @enderror" id="wholesale_price" name="wholesale_price" value="{{ old('wholesale_price', $itemCard->wholesale_price) }}" step="0.01" required>
                                @error('wholesale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 related_parent_price" @if(!old('half_wholesale_price') and !$errors->has('half_wholesale_price') and !$itemCard->half_wholesale_price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="half_wholesale_price">Half Wholesale Price: <span class="parent_price"></span></label>
                                <input type="number" class="form-control @error('half_wholesale_price') is-invalid @enderror" id="half_wholesale_price" name="half_wholesale_price" value="{{ old('half_wholesale_price', $itemCard->half_wholesale_price) }}" step="0.01" required>
                                @error('half_wholesale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 related_retail_price" @if(!old('retail_price') and !$errors->has('retail_price') and !$itemCard->retail_price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="retail_price">Retail Price: <span class="retail_price"></span></label>
                                <input type="number" class="form-control @error('retail_price') is-invalid @enderror" id="retail_price" name="retail_price" value="{{ old('retail_price', $itemCard->retail_price) }}" step="0.01" required>
                                @error('retail_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 related_retail_price" @if(!old('half_wholesale_retail_price') and !$errors->has('half_wholesale_retail_price') and !$itemCard->half_wholesale_retail_price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="half_wholesale_retail_price">Half Wholesale Retail Price:<span class="retail_price"></span></label>
                                <input type="number" class="form-control @error('half_wholesale_retail_price') is-invalid @enderror" id="half_wholesale_retail_price" name="half_wholesale_retail_price" value="{{ old('half_wholesale_retail_price', $itemCard->half_wholesale_retail_price) }}" step="0.01" required>
                                @error('half_wholesale_retail_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 related_retail_price" @if(!old('wholesale_price_retail') and !$errors->has('wholesale_price_retail') and !$itemCard->wholesale_price_retail) style="display: none" @endif>
                            <div class="form-group">
                                <label for="wholesale_price_retail">Wholesale Price Retail:<span class="retail_price"></span></label>
                                <input type="number" class="form-control @error('wholesale_price_retail') is-invalid @enderror" id="wholesale_price_retail" name="wholesale_price_retail" value="{{ old('wholesale_price_retail', $itemCard->wholesale_price_retail) }}" step="0.01" required>
                                @error('wholesale_price_retail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 related_parent_price" @if(!old('cost_price') and !$errors->has('cost_price') and !$itemCard->cost_price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="cost_price">Cost Price:<span class="parent_price"></span></label>
                                <input type="number" class="form-control @error('cost_price') is-invalid @enderror" id="cost_price" name="cost_price" value="{{ old('cost_price', $itemCard->cost_price) }}" step="0.01" required>
                                @error('cost_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 related_retail_price" @if(!old('retail_cost_price') and !$errors->has('retail_cost_price') and !$itemCard->retail_cost_price) style="display: none" @endif>
                            <div class="form-group">
                                <label for="retail_cost_price">Cost Price Retail: <span class="retail_price"></span></label>
                                <input type="number" class="form-control @error('retail_cost_price') is-invalid @enderror" id="retail_cost_price" name="retail_cost_price" value="{{ old('retail_cost_price', $itemCard->retail_cost_price) }}" step="0.01" required>
                                @error('retail_cost_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
