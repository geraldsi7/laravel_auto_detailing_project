@extends('layouts.app', [
'namePage' => 'Orders',
'class' => 'sidebar-mini',
'activePage' => 'orders',
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
        @include('tasks.manage')
        </div>
      </div>
    </div>
  </div>
</div>



@endsection