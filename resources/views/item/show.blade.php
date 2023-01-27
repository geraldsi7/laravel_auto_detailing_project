@extends('layouts.app', [
'namePage' => 'Subcategory',
'class' => 'sidebar-mini',
'activePage' => 'subcategory',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('title', ucwords( $item->title))

@section('content')
<style type="text/css">
  .main-panel{
    background: #fff !important;
  }
</style>
<div class="container mt-10">
  <div class="row">
    <div class="col-12 col-lg-9">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-5">
         <div style="position: relative;">
          <ul class="control" id="item-img-slider-control">
            <li class="prev">
              <i class="fa-solid fa-angle-left"></i>
            </li>
            <li class="next">
              <i class="fa-solid fa-angle-right"></i>
            </li>
          </ul>

          <div class="item-img-slider">
            @foreach(range(1, 4) as $img)
            @if(!empty($item['image' . $img]))
            <div class="card">
              <div style="height: 50vh;">
                <a href="{{ asset('assets') }}/img/items/photos/{{ $item['image' . $img] }}">
                 <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $item['image' . $img] }}" alt="Card image cap">
               </a>
             </div>
           </div>
           @endif
           @endforeach
         </div> 
       </div>
     </div>
     <div class="col-12 col-sm-12 col-md-6 col-lg-7">
      <h5 class="text-capitalize">{{ $item->title }}</h5>

      <h4 class="mt-4 text-uppercase">ghs {{ number_format($item->price, 2)}}</h4>

      <div>
        <span id="ratingStar"> @include('layouts.rating')
        </span>
        <span class="pl-3 ratingCount">
          @if($countRating > 0)
          {{ number_format($countRating) }}
          @endif
        </span>
      </div>

      <div class="mt-2">  
        <button type="button" id="addItemToCart" class="btn btn-primary rounded-0 btn-block btn-lg mt-4 col-12"><i class="now-ui-icons shopping_cart-simple"></i> Add to Cart 
        </button>
        <button type="button" id="addItemToWishlist" class="btn btn-outline-primary rounded-0 btn-block btn-lg mt-3 col-12"><i class="now-ui-icons ui-2_favourite-28 pr-1"></i>Add to Wishlist
        </button>
      </div>
      <hr>
      <div>
        <p class="fw-bold text-primary text-uppercase">description</p>

        <p>{{ !empty($item->description) ? $item->description : 'No description' }}</p>
      </div>
    </div>

    <div id="writeItemReview">
    </div>

    <div class="col-12 mt-5">
      <h5 class="text-capitalize">reviews • <span class="ratingCount"> {{ number_format($countRating) }}<span></span></h5>
      @auth
      @if(count($userOrders) >= 1 && count($userReview) == 0)
      <div class="text-capitalize">
        <button type="button"  data-toggle="modal" data-target="#postReviewModal" class="btn btn-primary rounded-0 text-capitalize"><i class="now-ui-icons ui-1_simple-add pr-1"></i>write review</button>
      </div>   
      @endif 

      <div class="modal fade" id="postReviewModal" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-hidden="true" aria-labelledby="postReviewModalLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary modal-title" id="openServiceModalLabel">Rate {{ $item->title }}</h5>
              <button type="button" class="close" data-dismiss="modal"  aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
              <form id="review_form">
                @csrf
                @include('rating.form')
              </form>
            </div>
          </div>
        </div>
      </div>
      @endauth
      <div class="d-flex flex-wrap">
        <div id="manage-review-content">
          @include('rating.data', ['activePage' => ''])
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-3">
  <div class="d-flex">
    <div class="flex-shrink-0 p-3">
     <i class="h2 fa-solid fa-reply"></i></a>
   </div>
   <div class="flex-grow-1 ms-3">
    <b class="text-uppercase">order return</b>
    <p>Free 15-Day returns</p>
  </div>
</div> 
<div class="d-flex">
  <div class="flex-shrink-0 p-3">
   <i class="h2 fa fa-truck"></i></a>
 </div>
 <div class="flex-grow-1 ms-3">
  <b class="text-uppercase">delivery</b>
  <p>Ready for delivery by <b>{{ date("D, j M", strtotime("+ 5days")) }}</b></p>
</div>
</div>

@if(count($others) >= 1)
<div class="mt-4">
  <b class="text-uppercase">you may also like</b>
  <div class="mt-3"></div>
  @foreach($others as $other)
  <a href="{{ route('item.show', ['category' =>  $other->category->link, 'item' => $other->link, 'id' => $other->id ])  }}" class="text-dark">
    <div class="card">
      <div class="d-flex align-items-center">
        <div class="flex-shrink-0 py-3 pl-2">
          <div class="ms-1" style="height: 13vh; width: 13vh;">
            <img class="image-fill" src="{{ asset('assets')}}/img/items/photos/{{ $other->image1 }}" alt="Card image cap">
          </div>
        </div>
        <div class="flex-grow-1 px-2 text-truncate ms-3">
         <span class=" text-capitalize">{{ $other->title }}</span>
         <br>
         <b class="text-uppercase">ghs {{ number_format($other->price, 2) }}</b>

       </div>
     </div> 
   </div>
 </a>
 @endforeach
</div>
@endif

</div>
</div>
</div>
@include('item.js')

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/itemImgSlider.js"></script>
@endpush
