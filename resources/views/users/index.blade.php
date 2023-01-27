@extends('layouts.app', [
'namePage' => 'User',
'class' => 'sidebar-mini',
'activePage' => 'manage-user',
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

          <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('users.create') }}">Add</a>

           <a class="btn btn-danger btn-round text-white pull-right mr-3" href="" type="button"  data-toggle="modal" data-target="#removeAllModal">Remove all</a>

          <div class="modal fade" id="removeAllModal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="RemoveLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-muted modal-title">Remove Staff</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p class="text-muted">Are you sure you want to remove all staff?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
                  <a href="{{ route('users.destroy.all') }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
                </div>
              </div>
            </div>
          </div>

          <h4 class="card-title">{{ count($user) }} 
            Staff
          </h4>
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
                <th>
                  Role
                </th>
                <th class="text-right">
                  Actions
                </th>
              </thead>
              <tbody style="z-index: 2;">
               @foreach($user as $users)
               <tr>
                <td class="text-capitalize">
                  {{ $users->name }}
                </td>
                <td class="text-lowercase">
                 <a href="mailto:{{ $users->email }}"> {{ $users->email }}
                 </a>
               </td>
               <td class="text-capitalize">
                {{ $users->role }}
              </td>
              <td class="text-right">

                <a href="{{ route('users.edit', $users ) }}" type="button" class="text-capitalize btn btn-round btn-info p-2" style="width: 6em;">edit</a>  

                <a href="" type="button"  data-toggle="modal" data-target="#removeSchool{{ $users->id }}Modal" class="text-capitalize btn btn-round btn-danger p-2" style="width: 6em;">remove</a>
              </td>
            </tr>

            <div class="modal fade" id="removeSchool{{ $users->id }}Modal" tabindex="-1"  role="dialog" aria-hidden="true" aria-labelledby="{{ $users->id }}RemoveLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="text-muted modal-title" id="{{ $users->id }}RemoveModalLabel">Remove Staff</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p class="text-muted">Are you sure you want to remove this staff?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default text-capitalize btn-round" data-dismiss="modal">No</button>
                    <a href="{{ route('users.destroy', $users) }}"  class="btn btn-danger text-capitalize btn-round">yes</a>
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