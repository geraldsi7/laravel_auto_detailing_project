@extends('layouts.app', [
'namePage' => 'Invoice',
'class' => 'sidebar-mini',
'activePage' => 'invoice',
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
          <h4 class="card-title">{{ count($invoice) }} @if( count($invoice) > 1 ) Invoices @else Invoice @endif</h4>
          <div class="col-12 mt-2">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            @include('alerts.success')
            @foreach($invoice as $invoices)
            
            <div class="col-12 col-sm-6 col-lg-3">
              <a href="{{ route('invoice.show', $invoices->invoice) }}">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-5 col-md-5 col-lg-5">
                      <button class="btn btn-primary btn-icon btn-round btn-lg btn-outline-primary">
                        <i class="now-ui-icons education_paper"></i>
                      </button>
                    </div>
                    <div class="col-7 col-md-7 col-lg-7 mt-3 text-right">
                     <span class="h3 font-weight-bold">{{ $invoices->invoice }}</span>
                     <br>
                     <span class="text-right text-muted">{{ $invoices->orderNumber }}</span> 
                    </div>
                  </div>
                      <hr>       
                        <div class="text-left">
                          <i class="now-ui-icons ui-2_time-alarm text-right"></i> <span class="ml-2 text-capitalize">{{ $invoices->ordered_at->format('d/m/Y g:i A') }}</span>      </div>
                       </div>
                     </div>
                   </a>
                 </div>
                 @endforeach
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

     @endsection