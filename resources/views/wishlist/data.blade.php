@if(count($wishlists) >= 1)
<div class="table-responsive">
  <form id="selectionForm" action="{{ route('wishlist.actions') }}" method="POST">
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
      <th></th>
    </thead>                 
    <tbody>
      @foreach($wishlists as $wishlist)
      <tr>
        <td>
          <input type="checkbox" id="single_check" name="wishlist[]" value="{{ $wishlist->id }}">
        </td>
        <td>
          <div class="ms-1" style="height: 10vh; width: 10vh;">
            <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $wishlist->services->image1 }}" alt="Card image cap">
          </div>
        </td>
        <td>
          <a href="{{ route('item.show',['category' =>  $wishlist->services->category->link, 'item' => $wishlist->services->link, 'id' => $wishlist->services->id ])  }}" class="text-primary">{{ $wishlist->services->title }}</a>
          <br><small>{{ $wishlist->services->category->name }}</small>
        </td>
        <td class="text-right">
         {{ number_format($wishlist->services->price, 2) }}
       </td>
    </tr>
    @endforeach
        </tbody>
  </table>
</form>
</div>
@else
<div class="centered-content">
  <p class="h4 text-muted">No item</p>
</div>
@endif

