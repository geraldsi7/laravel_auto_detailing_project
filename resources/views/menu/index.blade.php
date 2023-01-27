@extends('layouts.app', [
'namePage' => 'category',
'class' => 'sidebar-mini',
'activePage' => 'category',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('title', ucwords("all categories"))

@section('content')
<div class="container">
  <div class="mt-5">
    <div class="row">
      @foreach($category as $categories)
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <p class="text-uppercase font-weight-bold" style="letter-spacing: 1px;">{{ $categories->name }}</p>
        @foreach($subcategory as $subcategories)
        @if($subcategories->category_id == $categories->id)
        <ul class="nav pb-1">
          <li>
            <a href="{{ route('category.show',['category' => $categories->link, 'subcategory' => $subcategories->link]) }}" class="text-capitalize text-dark">{{ $subcategories->name }}</a>
          </li>
        </ul>          
        @endif
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
</div>



@endsection