<center>
    @if(isset($user_rating))
    @for($i = 1; $i <= $user_rating->rate; $i++)
       <i class="fa fa-star mr-2 text-primary submit_star h2" id="submit_star_{{ $i }}" data-rating="{{ $i }}"></i>
       @endfor
       @for($i = $user_rating->rate + 1; $i <= 5; $i++)
       <i class="far fa-star mr-2 text-primary submit_star h2" id="submit_star_{{ $i }}" data-rating="{{ $i }}"></i>
       @endfor
       @else
       @for($i = 1; $i <= 5; $i++)
       <i class="far fa-star mr-2 text-primary submit_star h2" id="submit_star_{{ $i }}" data-rating="{{ $i }}"></i>
       @endfor
       @endif
   </center>
   <input type="hidden" name="rate" id="rate" value="{{ isset($user_rating)? $user_rating->rate : old('rate') }}">
   <input type="hidden" name="service_id" value="{{ $post->id }}">
   <div class="form-group col-12">
    <textarea class="form-control {{ $errors->has('review') ? ' is-invalid' : '' }}" id="review" name="review" rows="5" placeholder="Write Review (optional)">{{ isset($user_rating->review)? $user_rating->review : old('review') }}</textarea>
    @if ($errors->has('review'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('review') }}</strong>
    </span>
    @endif
</div>

@if ($errors->has('review'))
<script>
    $('#postReview{{ $post->id }}Modal').modal('show');
</script>
@endif

<div class="mt-2">
    @if(isset($user_rating)) 
    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3 col-12">Post</button>
    @else
    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mt-2 mb-3 col-12" id="send_review">
        Post
    </button>
    @endif
</div>

