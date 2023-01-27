@extends('layouts.app', [
'namePage' => 'Item',
'class' => 'sidebar-mini',
'activePage' => 'manage-item',
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
          <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('menu.create') }}">Add</a>

          <a class="btn btn-danger btn-round text-white pull-right mr-3" href="" type="button"  data-toggle="modal" data-target="#removeAllModal">Remove all</a>

          <div class="modal fade" id="removeAllModal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="RemoveLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-muted modal-title">Remove Items</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p class="text-muted">Are you sure you want to remove all items?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
                  <a href="{{ route('menu.destroy.all') }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
                </div>
              </div>
            </div>
          </div>

          <h4 class="card-title">{{ count($services) }}
            @if( count($services) != 1 ) 
            Items 
            @else 
            Item
            @endif
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Category
                </th>
                <th>
                  Item
                </th>
                <th>
                  Description
                </th>                
                <th class="text-right">
                  Actions
                </th>
              </thead>
              <tbody style="z-index: 2;">
               @foreach($services as $items)
               <tr>                
                <td class="text-capitalize">
                  {{ $items->category->name }}
                </td>
                <td class="text-capitalize">
                  {{ $items->title }}
                </td>
                <td>
                  {{ ucfirst($items->description) }}
                </td>
                <td class="text-right">
                  <a href="{{ route('menu.review', $items ) }}" type="button" class="text-capitalize btn btn-round btn-primary py-2 px-3 my-1" >reviews</a> 

                  <a href="{{ route('menu.edit', $items ) }}" type="button" class="text-capitalize btn btn-round btn-info py-2 px-3 my-1" >edit</a>  

                  <a href="" type="button"  data-toggle="modal" data-target="#removeSchool{{ $items->id }}Modal" class="text-capitalize btn btn-round btn-danger py-2 px-2 my-1">remove</a>
                </td>
              </tr>

              <div class="modal fade" id="removeSchool{{ $items->id }}Modal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="{{ $items }}RemoveLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="text-muted modal-title" id="{{ $items }}RemoveModalLabel">Remove Item</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p class="text-muted">Are you sure you want to remove this item?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
                      <a href="{{ route('menu.destroy', $items) }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
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