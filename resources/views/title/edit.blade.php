@extends('layouts.app', [
'namePage' => 'Title',
'class' => 'sidebar-mini',
'activePage' => 'manage-title',
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
          <h4 class="card-title">Edit Category</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('title.update', $titles) }}">
            @csrf
            @method('PUT')
            @include('title.form')
          </form>
        </div>
      </div>
    </div>
@endsection