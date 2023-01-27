@extends('layouts.app', [
'namePage' => 'category',
'class' => 'sidebar-mini',
'activePage' => 'category',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('title', ucwords( $category->name))

@section('content')
<div class="container">
  <p class="font-weight-bold h4 text-capitalize pb-5">shop {{ $category->name }}</p>
  <div class="row">
    @forelse($items as $item)
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 py-3">
      <a href="{{ route('item.show', ['category' =>  $category->link, 'item' => $item->link, 'id' => $item->id ])  }}" class="text-dark"><div class="card" style="width: 100%; height: auto;">
        <div style="height: 25vh;">
          <img class=" image-fill" src="{{ asset('assets')}}/img/items/photos/{{ $item->image1 }}" alt="Card image cap">
        </div>
        <div class="card-body">
          <div class="mt-1">
            <p class="text-gray-600 dark:text-gray-400 text-sm text-truncate">{{ $item->title }}
            </p>
          </div>
          <div class="mt-3">
            <b class="text-uppercase">ghs {{ number_format($item->price, 2)}}</b>
          </div>
          <div class="mt-2"> 
            @php

            $rating = App\Models\Rating::where('services_id', $item->id)->get();

            $countRating = count($rating);

            $avg = $rating->average('rate');

            $roundedAvg = round($avg, 1);

            $halfRating = $roundedAvg - floor($roundedAvg);

            $ratingRemainder = 5 - $roundedAvg;


            @endphp

            @include('layouts.rating')
            <span class="pl-3">
              @if($countRating > 0)
              {{ number_format($countRating) }}
              @endif
            </span>
          </div>
        </div> 
      </div> 
    </a>
  </div>
  @empty
  <div class="centered-content">
    <p class="h4 text-muted">No item</p>
  </div>
  @endforelse
</div>

<!-- end content-->
</div>



@endsection