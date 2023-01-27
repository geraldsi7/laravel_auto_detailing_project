@extends('layouts.app', [
'namePage' => 'Checkout',
'class' => 'sidebar-mini',
'activePage' => 'checkout',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('title', ucwords("Checkout | Pay GHS") . number_format($total,2))
@section('content')

<div class="container mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-7">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Address Details</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('cart.checkout') }}" id="checkout-pay">
              @csrf
              <div class="form-group col-md-9 ps-1">
                <label>{{__(" Name")}}</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" readonly>
              </div>
              <div class="form-group col-md-9 ps-1">
                <label for="exampleInputEmail1">{{__(" Email")}}</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" readonly>
              </div>
              <div class="form-group col-md-9 ps-1">
                <label for="phone1">Phone Number <span class="text-danger">*</span></label>
                <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Phone Number">
                <span class="phone1_error invalid-feedback font-weight-bold" style="display: block;" role="alert"></span>
              </div>
              <div class="form-group col-md-9 ps-1">
                <label for="phone2">Phone Number</label>
                <input type="text" name="phone2" class="form-control" id="phone2" placeholder="Phone Number">
                <span class="phone2_error invalid-feedback font-weight-bold" style="display: block;" role="alert"></span>
              </div>

              <div class="form-group col-md-9 ps-1">
                <label for="region">Region<span class="text-danger">*</span></label>
                <input type="text" name="region" class="form-control" id="region" placeholder="Region">
                <span class="region_error invalid-feedback font-weight-bold" style="display: block;" role="alert"></span>
              </div>

              <div class="form-group col-md-9 ps-1">
                <label for="region">City<span class="text-danger">*</span></label>
                <input type="text" name="city" class="form-control" id="city" placeholder="City">
                <span class="city_error invalid-feedback font-weight-bold" style="display: block;" role="alert"></span>
              </div>

              <div class="form-group col-md-9 ps-1">
                <label for="address">Digital Address <span class="text-danger">*</span></label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Digital Address">
                <span class="address_error invalid-feedback font-weight-bold" style="display: block;" role="alert"></span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-5">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Order Summary</h5>
          </div>
          <div class="table-responsive">
            <table class="table table-shopping">
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th>Item</th>
                  <th class="text-right">Price (GHS)</th>
                  <th class="text-right">Qty</th>
                  <th class="text-right">Amount (GHS)</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($cart as $carts)
                <tr>
                  <td>
                    <div class="ms-1" style="height: 10vh; width: 10vh;">
                      <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $carts->services->image1 }}" alt="Card image cap">
                    </div>
                  </td>
                  <td>
                    <a href="{{ route('item.show',['category' =>  $carts->services->category->link, 'item' => $carts->services->link, 'id' => $carts->services->id ])  }}" class="text-primary">{{ $carts->services->title }}</a>
                    <br><small>{{ $carts->services->category->name }}</small>
                  </td>
                  <td class="text-right">
                   {{ number_format($carts->services->price, 2) }}
                 </td>
                 <td class="text-right">
                  &times; {{ $carts->qty }}
                </td>
                <td id="amount{{$carts->id }}" class="text-right">
                  {{ number_format($carts->amount, 2) }}
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="4" class="ps-2">Shipping cost</td>
                <td class="text-right">{{ number_format($shipping, 2) }}</td>
              </tr>
              <tr>
                <td colspan="4" class="ps-2">Tax amount</td>
                <td class="text-right">{{ number_format($tax, 2) }}</td>
              </tr>
              <tr>
                <td colspan="4" class="ps-2">Sub total</td>
                <td class="text-right">{{ number_format($shipping + $tax, 2) }}</td>
              </tr>
              <tr>
                <td colspan="4" class="ps-2 font-weight-bold">Total</td>
                <td class="text-right font-weight-bold">GHS {{ number_format($total, 2) }}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <button type="submit" form="checkout-pay" class="btn btn-primary rounded-0 btn-lg col-12">Pay GHS {{ number_format($total, 2) }}</button>
</div>
</div>
@include('checkout.js')

@endsection