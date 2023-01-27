@extends('layouts.app', [
'namePage' => 'Invoice',
'class' => 'sidebar-mini',
'activePage' => 'invoice',
])
@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card p-5">
        <div class="print-here">
          <div class="pull-left">
            <h5 class="title text-uppercase">invoice</h5>
            <p class="text-capitalize">NOA Enterprise
              <br>Danyame, Opposite Parks and Gardens
              <br>0205756551
              <br>0278946470
              <br>0550450655
            </p>
          </div>
          <div class="pull-right">
            <img src="{{ asset('assets') }}/img/img-100.png" height="90">
          </div>
          <div class="mt-5" style="clear: both;">
            <div class="pull-left">
              <p class="h6 text-primary">bill to</p>
              <p class="text-capitalize">
                {{ $order->user->name }}
                <br>
                {{ $order->region}}, {{ $order->city }}, {{ $order->address }}
                <br>{{ $order->phone1 }}
                @if(!empty($order->phone2))
                <br>{{ $order->phone2 }}
                @endif
              </p>
            </div>
            <div class="pull-right text-right">
              <span class="h6 text-primary mr-3">invoice</span>
              <span class="ml-2 text-uppercase">{{ $order->invoice  }}</span>
              <br>
              <span class="text-right">{{ $order->ordered_at->format('d/m/Y g:i A') }}</span>
            </div>
          </div>
          <div class="mt-5 mt-5" style="clear: both;">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary text-uppercase">
                  <th>
                    item
                  </th>
                  <th class="text-right">
                    unit price
                  </th>
                  <th class="text-right">
                    qty
                  </th>
                  <th class="text-right">
                    amount
                  </th>
                </thead>
                <tbody>
                  @foreach($cart as $item)
                  <tr class="h5">
                    <td class="text-capitalize">
                      {{ $item->services->title }}
                      <br><small>{{ $item->services->subcategory->category->name }}</small>
                    </td>
                    <td class="text-right">
                      GHS {{ number_format($item->services->price,2) }}
                    </td>
                    <td class="text-right">
                      {{ number_format($item->qty) }}
                    </td>
                    <td class="text-right">
                      GHS {{ number_format($item->amount,2) }}
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="3" class="h5 px-0 td-name font-weight-bold">Total</td>
                    <td class="px-0 text-right font-weight-bold h3">GHS {{ number_format($total, 2) }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="mt-5">
            <div class="pull-right">
              <p class="text-capitalize">issued by</p>
              <h2 class="text-capitalize title">{{ auth()->user()->name }}</h2>
            </div>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <h1 class="text-center text-capitalize title">thank you</h1>
        </div>
        <center id='center'>
          <a href="javascript:void(0)" class="btn btn-primary btn-round text-capitalize" id="printContent"><i class="fa fa-print" aria-hidden="true"></i> Download</a>
        </center>
      </div>
    </div>
  </div>
</div>
@endsection


