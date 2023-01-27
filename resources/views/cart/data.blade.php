@if(count($carts) >= 1)
<span class="d-none" id="fetchedCartCount">{{count($carts)}}</span>
<div class="table-responsive">
  <form id="selectionForm" action="{{ route('cart.actions') }}" method="POST">
    @csrf
    <input type="hidden" name="actions" id="actions">
    <table class="table">
      <thead class=" text-primary">
       <th>
        <input type="checkbox" id="all_check">
      </th>
      <th></th>
      <th>
        Item 
      </th>
      <th class="text-right">
        Price (GHS) 
      </th>
      <th>
        Quantity 
      </th>
      <th class="text-right">
        Amount (GHS)
      </th>
      <th></th>
    </thead>                 
    <tbody>
      @foreach($carts as $cart)
      <tr>
        <td>
          <input type="checkbox" id="single_check" name="cart[]" value="{{ $cart->id }}">
        </td>
        <td>
          <div class="ms-1" style="height: 10vh; width: 10vh;">
            <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $cart->services->image1 }}" alt="Card image cap">
          </div>
        </td>
        <td>
          <a href="{{ route('item.show',['category' =>  $cart->services->category->link, 'item' => $cart->services->link, 'id' => $cart->services->id ])  }}" class="text-primary">{{ $cart->services->title }}</a>
          <br><small>{{ $cart->services->category->name }}</small>
        </td>
        <td class="text-right">
         {{ number_format($cart->services->price, 2) }}
       </td>
       <td>
        <input type="number" class="itemQty" name="qty" data-id="{{ $cart->id }}" min="1" value="{{ $cart->qty }}">
      </td>
      <td id="amount{{$cart->id }}" class="text-right">
        {{ number_format($cart->amount, 2) }}
      </td>
    </tr>
    @endforeach
    <tr>
      <td class="px-0 font-weight-bold">Total</td>
      <td colspan="4">
        <td class="px-0 text-right h5" id="total">GHS {{ number_format($total, 2) }}</td>
      </tr>
    </tbody>
  </table>
</form>
</div>
<a class="btn btn-primary btn-round float-right mt-4 rounded-0" href="{{ route('cart.show') }}"><i class="now-ui-icons arrows-1_minimal-right pr-2"></i>Proceed to Checkout</a>
@else
<div class="centered-content">
  <p class="h4 text-muted">No item</p>
</div>
@endif

