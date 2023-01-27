@if(count($customers) >= 1)
<div class="table-responsive">
  <form id="selectionForm">
    @csrf
    <input type="hidden" name="actions" id="actions">
    <table class="table">
      <thead class="text-primary">
        <th>
          <input type="checkbox" id="all_check">
        </th>
        <th>
          Name
        </th>
        <th>
          Registered
        </th>
        <th class="text-right">
          Spent (GHS)
        </th>
        <th colspan="2">
          Status
        </th>
      </thead>                 
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td>
            <input type="checkbox" id="single_check" name="customer[]" value="{{ $customer->id }}">
          </td>
          <td>
            {{ $customer->name }}
            <br>
            <span class="text-muted">{{ $customer->email }}</span>
          </td>
          <td>{{ $customer->created_at->format('M d, Y') }}</td>
          <td class="text-right">
            {{ number_format($customer->order->where('status', '!=', 'in-cart')->where('status', '!=', 'cancelled')->sum('amount'), 2) }}
          </td>
          <td>
            @if($customer->trashed())
            <span class="badge bg-primary text-capitalize text-center p-2 text-white rounded-0">suspended</span>
            @else
            <span class="badge bg-primary text-capitalize text-center p-2 text-white rounded-0">active</span>
            @endif
          </td>
          <td>
           <a href="" type="button" class="text-capitalize text-primary h6" id="editData" data-toggle="modal" data-target="#manageModal" data-option="edit" data-update="" data-href="{{ $customer->id }}"><i class="fa-solid fa-eye"></i>
           </a>
         </td>
       </tr>


     </div>

     @endforeach
   </tbody>
 </table>
</form>

</div>
@else
<p class="text-center">No data</p>
@endif
