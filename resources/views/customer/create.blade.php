@extends('layouts.app', [
'namePage' => 'Customers',
'class' => 'sidebar-mini',
'activePage' => 'add-customer',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
<?php
  $namePage = 'Customers';
?>

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-12">
          @include('alerts.success')
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Customer</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('customers.store') }}">
            @csrf
            @include('customer.form')
          </form>
        </div>
      </div>
    </div>
@endsection