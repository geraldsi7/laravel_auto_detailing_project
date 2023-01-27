@extends('layouts.app', [
'namePage' => 'manage-gallery',
'class' => 'sidebar-mini',
'activePage' => 'manage-gallery',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
        @include('gallery.manage')
        </div>
      </div>
    </div>
  </div>
</div>



@endsection