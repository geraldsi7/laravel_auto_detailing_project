@extends('layouts.app', [
'namePage' => 'Cart',
'class' => 'sidebar-mini',
'activePage' => 'cart',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<style type="text/css">
  .main-panel{
    background: #fff !important;
  }
</style>
<div class="container mt-5">
  @if(auth()->user()->order->where('status', 'in-cart')->sum('qty') >= 1)
  <div class="pull-right">
    <button  type="submit" form="selectionForm"  class="btn btn-link text-primary h6" id="remove" disabled type="button"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
  </div>


  <div class="clearfix"></div>
  <div id="manage-content">
   @include('cart.data')
 </div>
 @else
 <div class="centered-content">
  <p class="h4 text-muted">No item</p>
</div>
@endif
</div>
@include('cart.js')
@endsection