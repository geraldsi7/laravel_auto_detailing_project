@extends('layouts.app', [
'namePage' => 'Item',
'class' => 'sidebar-mini',
'activePage' => 'add-item',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@php
$activePage = 'add-item';
@endphp

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Item</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('menu.store') }}">
            @csrf
            @include('menu.form')
          </form>
        </div>
      </div>
    </div>
@endsection