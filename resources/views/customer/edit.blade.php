@extends('layouts.app', [
'namePage' => 'Customers',
'class' => 'sidebar-mini',
'activePage' => 'manage-customer',
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
    <div class="col-md-8">

      <div class="row">
        <div class="col-md-12">@include('alerts.success')
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Customers</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('ssa.info.update', $users) }}">
            @csrf
            @method('PUT')
            @include('ssa.form')
          </form>
        </div>

        <div class="col-md-4">
          <div class="card card-user">
            <div class="card-body">
              <div class="author" style="margin-top: 3em;">
               <a href="{{asset('assets')}}/img/ssa/photo/{{ $users->photo }}">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/ssa/photo/{{ $users->photo }}" alt="...">
              </a>
              <br>
              <a href="" class="text-capitalize btn btn-round btn-primary" id="changeLogo">change photo</a>
            </div>
            <div id="setLogo">
              <form class="form-horizontal" method="POST" id="upload_photo_form" enctype="multipart/form-data" action="{{ route('ssa.photo.update', $users->id) }}">
                @csrf
                @method('PUT')
                <div class="col-md-12 pt-2">
                  <label for="photo">Photo <span class="text-danger">*</span></label>
                  <input class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}" placeholder="Logo" type="file" name="photo" value="{{ isset($school->photo)? $school->photo : old('photo') }}" id="photo">
                  @if ($errors->has('photo'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('photo') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mt-2 mb-3 col-md-12" id="send_photo_form">
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      $("#setLogo").css('display', 'none');            
      $("#changeLogo").click(function(event){
        event.preventDefault();

        $("#changeLogo").css('display', 'none');
        $("#setLogo").css('display', 'block');
      });
    });

  </script>
  @endsection