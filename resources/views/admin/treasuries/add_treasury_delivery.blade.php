@extends('layouts.master')
@section('title')
    {{ $mainTreasury->name }}
@endsection

@section('content')
   <div class="container">
       <h2>Treasuries</h2>
       <div class="card">
           <div class="card-header font-weight-bold">
               add a treasury to receive from the treasury ({{ $mainTreasury->name }})
           </div>
           <div class="card-body">
               <form action="{{ route('admin.treasuries.add.treasury.delivery.store') }}" method="post">
                   @csrf
                   <input type="hidden" name="treasury_id" value="{{ $mainTreasury->id }}">
                   <div class="form-group">
                       <label for="select-box">Select Box</label>
                       <select class="form-control" name="treasury_delivery" id="select-box">
                           @foreach($treasuries as $treasury)
                           <option value="{{ $treasury->id }}">{{ $treasury->name }}</option>
                           @endforeach
                       </select>
                   </div>
                   <button class="btn btn-primary">Add</button>
                   <a href="{{ route('admin.treasuries.show', $mainTreasury->id) }}" class="btn btn-secondary">Cancel</a>
               </form>
           </div>
       </div>
   </div>
@endsection
