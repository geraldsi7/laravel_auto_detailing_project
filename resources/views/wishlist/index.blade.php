@extends('layouts.app', [
'namePage' => 'Wishlist',
'class' => 'sidebar-mini',
'activePage' => 'my-wishlist',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')

@section('content')
<style type="text/css">
  .main-panel{
    background: #fff !important;
  }
</style>
<div class="container mt-5">
  @if(count($wishlists) >= 1)
  <div class="pull-right">
    <button  type="submit" form="selectionForm"  class="btn btn-link text-primary h6" id="remove" disabled type="button"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
  </div>

  <div class="clearfix"></div>
  <div id="manage-content">
   @include('wishlist.data')
 </div>
 @else
 <div class="centered-content">
  <p class="h4 text-muted">No item</p>
</div>
@endif
</div>
@includeif('wishlist.js')
@endsection