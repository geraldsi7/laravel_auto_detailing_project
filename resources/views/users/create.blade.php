@extends('layouts.app', [
'namePage' => 'User',
'class' => 'sidebar-mini',
'activePage' => 'add-user',
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
          <h4 class="card-title">Add Staff</h4>
          <div class="col-12 mt-2">
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table_id">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th class="disabled-sorting text-right">Actions</th>
              </thead>
              <tbody>
               @foreach($customers as $customer)
               <tr>
                <td class="text-capitalize">
                  {{ $customer->name }}
                </td>
                <td>
                  {{ $customer->email }}
                </td>
                <td class="text-right">
                  <a href="{{ route('users.edit', $customer) }}" class="btn btn-info btn-round">Add as</a>
                </td>
              </tr>             
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- end content-->
    </div>
  </div>
</div>
</div>
@endsection