@if($activePage == 'manage-item')
@php
    $v = $items->subcategory->category->id;
@endphp
@endif
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="type">Category <span class="text-danger">*</span></label>
        <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id">
            @if( !isset($items) )
            <option value="" disabled selected>-- Select Category --</option>
            @endif
            @foreach($category as $categories)
            <option value="{{ $categories->id }}" @if( isset($items) ) {{ $items->subcategory->category->id === $categories->id  ? 'selected' : null }} @endif> {{ $categories->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
        @endif
    </div>

    <!-- <div class="form-group col-md-4">
        <label for="type">Subcategory <span class="text-danger">*</span></label>
        <select name="subcategory_id" id="subcategory_id" class="form-control {{ $errors->has('subcategory_id') ? ' is-invalid' : '' }}" id="subcategory_id">            
            <option value="" selected>-- Select Subcategory --</option>
            @if(isset($items))
            @foreach($subcategory->where('category_id', $v) as $subcategories)
            <option value="{{ $subcategories->id }}" @if( isset($items) ) {{ $items->subcategory_id === $subcategories->id  ? 'selected' : null }} @endif> {{ $subcategories->name }}</option>
            @endforeach
            @endif
        </select>
        @if ($errors->has('subcategory_id'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('subcategory_id') }}</strong>
        </span>
        @endif
    </div>

-->

    <div class="form-group col-md-4">
        <label for="name">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" placeholder="Title" value="{{ isset($items)? $items->title : old('title') }}">
        @if ($errors->has('title'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-4">
        <label for="description">Description</label>
        <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" rows="5">{{ isset($items->description)? $items->description : old('description') }}</textarea>
        @if ($errors->has('description'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <label for="name">Price <span class="text-danger">*</span></label>
        <input type="number" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" placeholder="Price" min="0" value="{{ isset($items->price)? $items->price : old('price') }}">
        @if ($errors->has('price'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
        @endif
    </div>

    @if(!isset($items))
    <div class="col-md-5">
        <label for="image">Image <span class="text-danger"></span></label>
        <br>
        <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="Image" type="file" name="image" value="{{ isset($items->image)? $items->image : old('image') }}" id="image">
        @if ($errors->has('image'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    </div>
    @endif

</div>

<div class="mt-2">
    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mt-2 mb-3 col-md-12" id="send_form">
        Save
    </button>
</div>
</div>
</div>
<script>
   $('#category_id').on('change',function(){
    var category = $(this).val();  
    if(category){
      $.ajax({
        type:"GET",
        url:"{{url('get-subcategory-list')}}?category_id="+category,
        success:function(res){        
          if(res){
            $("#subcategory_id").empty();
            $("#subcategory_id").append('<option value="" disabled selected>-- Select Subcategory -- </option>');
            $.each(res,function(key,value){
              $("#subcategory_id").append('<option value="'+value+'">'+key+'</option>');
          });

        }else{
            $("#subcategory_id").empty();
        }
    }
});
  }else{
      $("#subcategory_id").empty();
  }

});
</script>


