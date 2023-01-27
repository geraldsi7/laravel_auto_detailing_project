@extends('layouts.app', [
'namePage' => 'Orders',
'class' => 'sidebar-mini',
'activePage' => 'my-orders',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')

<div class="container">
  @if(count($cart) > 0)


  <div class="table-responsive">
    <table class="table table-shopping">
      <tbody>
        @foreach($cart as $carts)
        <tr>
          <td colspan="4" class="px-0 text-muted font-weight-bold">{{ $carts->orderNumber }}</td>
          <td colspan="2" class="px-0">
           <div class="bg-primary rounded-0 text-capitalize text-center text-white py-2">
            {{ $carts->status }}
          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="ms-1" style="height: 10vh; width: 10vh;">
              <img class="image-fill" src="{{ asset('assets') }}/img/menu/image/{{ $carts->services->image }}" alt="Card image cap">
            </div>
        </td>
        <td class="h3">
          <a href="{{ route('item.show',['category' =>  $carts->services->category->link, 'item' => $carts->services->link, 'id' => $carts->services->id ])  }}">{{ $carts->services->title }}</a>
          <br><small>{{ $carts->services->category->name }}</small>
        </td>
        <td class="text-right">
         GHS {{ number_format($carts->services->price, 2) }}
       </td>
       <td class="text-right">
        &times;{{ $carts->qty }}
      </td>
      <td class="text-right">
        GHS {{ number_format($carts->amount, 2) }}
      </td>

      <td class="td-actions">
        @if($carts->status != 1 && $carts->status != 4 && $carts->status != 5)  
        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-neutral btn-just-icon"  data-toggle="modal" data-target="#remove{{ $carts->id }}Modal">
          <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        @endif
      </td>

    </tr>


    <div class="modal fade" id="remove{{ $carts->id }}Modal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="{{ $carts->id }}RemoveLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-muted modal-title" id="{{ $carts->id }}RemoveModalLabel">Cancel Order</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="text-muted">Are you sure you want to cancel this order?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
            <a href="" id="removeCart{{ $carts->id }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
          </div>
        </div>
      </div>
    </div>

    <script>
    
   </script>
   @endforeach
 </tbody>
</table>
</div>

@else
<div class="centered-content">
  <p class="h4 text-muted">No orders</p>
</div>
@endif


</div>

@endsection