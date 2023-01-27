    @for($i = 1; $i <= 4; $i++)
    @if(!empty($item['image' . $i]))
        <div class="col-4 col-lg-3">
        <div class="card">
              <div style="height: 15vh;">
                <a href="{{ asset('assets') }}/img/items/photos/{{ $item['image' . $i] }}">
                 <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $item['image' . $i] }}" alt="Card image cap">
               </a>
             </div>
             <button class="btn btn-link text-primary h6 pull-right" id="removeItemImage" data-ref-image="image{{ $i }}" type="button"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
           </div>
       </div>
       @endif
    @endfor