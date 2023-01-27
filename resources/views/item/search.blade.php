@extends('layouts.app', [
'namePage' => 'Item',
'class' => 'sidebar-mini',
'activePage' => 'item-search',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')
<div class="container">
  @if(count($post) > 0)
  <div class="row">
    @foreach($post as $posts)

    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
      <a href="{{ route('item.show',['category' =>  $posts->subcategory->category->link,'subcategory' =>  $posts->subcategory->link, 'item' => $posts->link, 'id' => $posts->id ])  }}" class="text-dark"><div class="card" style="width: 100%; height: auto;">
        <div style="height: 25vh;">
          <img class=" image-fill" src="{{ asset('assets')}}/img/menu/image/{{ $posts->image }}" alt="Card image cap">
        </div>
        <div class="card-body">
          <div class="mt-1">
            <p class="text-gray-600 dark:text-gray-400 text-sm text-truncate">{{ $posts->title }}
            </p>
          </div>
          <div class="mt-3">
            <b class="text-uppercase">ghs {{ number_format($posts->price, 2)}}</b>
          </div>
          <div class="mt-2"> 
            @php

            $avg = round($rating->where('services_id', $posts->id)->average('rate'),1);

            $cus = count($rating->where('services_id', $posts->id));

            $half = $avg - floor($avg);

            $rem = 5 - $avg;

            @endphp

            @include('layouts.rating')
            <span class="pl-3">
              @if($cus > 0)
              {{ number_format($cus) }}
              @endif
            </span>
          </div>
        </div> 
      </div> 
    </a>
  </div>

  @endforeach
</div>

<!-- end content-->
@else
<div class="centered-content">
  <p class="h4 text-muted">No item</p>
</div>
@endif
</div>



@endsection