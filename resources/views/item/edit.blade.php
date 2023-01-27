@extends('layouts.app', [
'namePage' => 'Menu',
'class' => 'sidebar-mini',
'activePage' => 'manage-menu',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

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
          <h4 class="card-title">Edit Menu</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" id="upload_form" enctype="multipart/form-data" action="{{ route('menu.info.update', $menus) }}">
            @csrf
            @method('PUT')
            @include('menu.form')
          </form>
        </div>

        <div class="col-md-4">
          <div class="card card-user">
            <div class="card-body">
              <div class="author" style="margin-top: 3em;">
               <a href="{{ asset('assets')}}/img/menu/image/{{ $menus->image }}">
                <img class="avatar border-gray" src="{{ asset('assets')}}/img/menu/image/{{ $menus->image }}" alt="...">
              </a>
              <br>
              <a href="" class="text-capitalize btn btn-round btn-primary" id="changeLogo">change image</a>

              <a href="" type="button"  data-toggle="modal" data-target="#remove{{ $menus->id }}Modal"class="text-capitalize btn btn-round btn-danger">remove image</a>
            </div>
            <div id="setLogo">
              <form class="form-horizontal" method="POST" id="upload_image_form" enctype="multipart/form-data" action="{{ route('menu.image.update', $menus) }}">
                @csrf
                @method('PUT')
                <div class="col-md-12 pt-2">
                  <label for="image">Image <span class="text-danger"></span></label>
                  <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="Image" type="file" name="image" value="{{ isset($menua->image)? $menu->image : old('image') }}" id="image">
                  @if ($errors->has('image'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary btn-round btn-block mt-2 mb-3 col-md-12" id="send_image_form">
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

  <div class="modal fade" id="remove{{ $menus->id }}Modal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="{{ $menus }}RemoveLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-muted modal-title" id="{{ $menus }}RemoveModalLabel">Remove Image</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p class="text-muted">Are you sure you want to remove this image?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
          <a href="{{ route('menu.destroy.image', $menus) }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
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