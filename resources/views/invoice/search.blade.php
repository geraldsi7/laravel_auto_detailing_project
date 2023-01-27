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
          @include('alerts.success')
          @if(isset($details))
          @if(count($details) > 0)
          <div class="row">
            @include('alerts.success')
            @foreach($details as $invoices)
            <div class="col-6 col-md-4 col-lg-3">
              <a href="{{ route('invoice.show', $invoices) }}">
                <div class="card" style="width: 100%;">
                  <div class="card-body">
                    <p class="text-capitalize text-primary"><i class="now-ui-icons education_paper"></i>  INV{{ str_pad($invoices->id, 4, '0', STR_PAD_LEFT)  }}</p>
                    <hr>
                    <h6 class="text-capitalize mb-2 text-muted">Issued to: CUST{{ str_pad($invoices->services->customer->id, 5, '0', STR_PAD_LEFT)  }}</h6>
                    <h6 class="mb-2 text-primary text-capitalize">Issued by: {{ $invoices->services->user->name }}</h6>
                    <p class="mb-2 text-muted">on {{ $invoices->created_at->format('d/m/Y') }} at {{ $invoices->created_at->format('g:i A') }}</p>
                  </div>
                </div>
              </a>
            </div>
            
            @endforeach

          </div>

          @endif
          @else
          <center>
            <p class="h6 text-muted">No result(s) found</p>
          </center>
          @endif
        </div>
        <!-- end content-->
      </div>

      @endsection