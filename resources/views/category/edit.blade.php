@extends('layouts.app', [
'namePage' => 'Subcategory',
'class' => 'sidebar-mini',
'activePage' => 'manage-subcategory',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Subcategory</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('subcategory.manage.update', $subcategories) }}">
            @csrf
            @method('PUT')
            @include('subcategory.form')
          </form>
        </div>
      </div>
    </div>
        @endsection