@extends('layouts.app', [
'namePage' => 'manage category',
'class' => 'sidebar-mini',
'activePage' => 'manage-category',
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
          <div class="pull-left">  
            @if( count($categories) >= 1 )      
            <h4 class="card-title text-capitalize" id="fetchCounter">{{ count($categories) }}
              @if( count($categories) != 1 ) 
              Categories 
              @else 
              Category
              @endif
            </h4>
            @endif
          </div>

          <div class="pull-right">
            <button type="button" class="btn btn-link text-capitalize text-primary" data-toggle="modal" data-target="#manageModal" data-option="add" style="font-size: 1.1rem"><i class="fa-solid fa-plus" aria-hidden="true"></i>
            </button>

            <button class="btn btn-link text-primary" id="remove" disabled data-toggle="modal" data-target="#removeModal" type="button"><i class="fa-solid fa-trash" aria-hidden="true" style="font-size: 1.1rem"></i></button>
          </div>

          <div class="clearfix"></div>

          <div class="pull-right">
            <input type="text" name="search" class="form-control rounded-0" id="search" placeholder="Search">
          </div>

          <div class="clearfix"></div>

          <div id="manage-content">
            @include('category.manage.data')
          </div>
        </div>

      </div>
    </div>
    <!-- end content-->
  </div>
</div>

<!-- manage modal -->
<div class="modal fade" id="manageModal"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="manageModalLabel">gy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="upload_form" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div id="formContent">
         </div>
       </form>
     </div>
   </div>
 </div>
</div>

<!-- remove modal -->
<div class="modal" id="removeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-muted modal-title text-capitalize">Remove row</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p class="text-muted" id="removeModalBody"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default text-capitalize rounded-0" data-dismiss="modal">No</button>
        <button type="submit" form="selectionForm" class="btn btn-primary text-capitalize rounded-0">yes</button>
      </div>
    </div>
  </div>
</div>

@include('category.manage.js')


@endsection