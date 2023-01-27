@if(count($task) >= 1)
 <span class="d-none" id="fetchedCount">{{count($task)}}</span>
<div class="table-responsive">
  <form id="selectionForm">
    @csrf
    <input type="hidden" name="actions" id="actions">
    <input type="hidden" name="orderStatus" id="formOrderStatus">
    <table class="table">
      <thead class="text-primary">
        <th>
          <input type="checkbox" id="all_check">
        </th>
        <th>Date</th>
                <th>Order #</th>
                <th colspan="3">Customer Info</th>
                <th>Vehicle Info</th>
                <th>Description</th>
                <th>Status</th>
      </thead>                 
      <tbody>
        @foreach($task as $tasks)
        <tr>
          <td>
            <input type="checkbox" id="single_check" name="task[]" value="{{ $tasks->id }}">
          </td>
          <td>
                    {{ $tasks->created_at->format('d/m/Y g:i A') }}
                  </td>
                  <td>{{ $tasks->orderNumber }}</td>
                  <td>
                    {{ $tasks->name }}
                  </td>
                  <td>
                    {{ $tasks->email }}
                  </td>
                  <td>
                    {{ $tasks->phone_number }}
                  </td>
                  <td>
                    {{ $tasks->vehicle }}
                  </td>
                  <td>
                    {{ $tasks->description }}
                  </td>
                  <td>
                    <span class="badge bg-primary text-capitalize p-2 text-white rounded-0">{{ $tasks->status }}</span>
                  </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </form>

  </div>
  @else
  <p class="text-center">No orders</p>
  @endif
