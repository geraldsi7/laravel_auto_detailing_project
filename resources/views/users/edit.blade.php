@extends('layouts.app', [
'namePage' => 'Users',
'class' => 'sidebar-mini',
'activePage' => 'add-user',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
<?php
$namePage = 'Users';
?>

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit User</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('users.update', $users) }}">
            @csrf
            @method('PUT')
            @include('customer.form')
          </form>
        </div>
      </div>
    </div>

    @endsection