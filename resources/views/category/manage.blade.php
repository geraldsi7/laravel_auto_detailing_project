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

          <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('subcategory.manage.create') }}">Add</a>

          <a class="btn btn-danger btn-round text-white pull-right mr-3" href="" type="button"  data-toggle="modal" data-target="#removeAllModal">Remove all</a>

          <div class="modal fade" id="removeAllModal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="RemoveLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-muted modal-title">Remove Subcategories</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p class="text-muted">Are you sure you want to remove all subcategories?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
                  <a href="{{ route('subcategory.manage.destroy.all') }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
                </div>
              </div>
            </div>
          </div>

          <h4 class="card-title">{{ count($subcategory) }}
            @if( count($subcategory) != 1 ) 
            Subcategories 
            @else 
            Category
            @endif
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <th>
                  Category
                </th>
                <th>
                  Subcategory
                </th>
                <th class="text-right">
                  Actions
                </th>
              </thead>
              <tbody style="z-index: 2;">
               @foreach($subcategory as $subcategories)
               <tr>
                <td class="text-capitalize">
                  {{ $subcategories->category->name }}
                </td>
                <td class="text-capitalize">
                  {{ $subcategories->name }}
                </td>
                <td class="text-right">

                  <a href="{{ route('subcategory.manage.edit', $subcategories ) }}" type="button" class="text-capitalize btn btn-round btn-info p-2" style="width: 6em;">edit</a>  

                  <a href="" type="button"  data-toggle="modal" data-target="#removeCategory{{ $subcategories->id }}Modal" class="text-capitalize btn btn-round btn-danger p-2" style="width: 6em;">remove</a>
                </td>
              </tr>

              <div class="modal fade" id="removeCategory{{ $subcategories->id }}Modal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="{{ $subcategories->id }}RemoveLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="text-muted modal-title" id="{{ $subcategories->id }}RemoveModalLabel">Remove Subcategory</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p class="text-muted">Are you sure you want to remove this subcategory?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
                      <a href="{{ route('subcategory.manage.destroy', $subcategories) }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
                    </div>
                  </div>
                </div>
              </div>


              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end content-->
</div>
</div>



@endsection