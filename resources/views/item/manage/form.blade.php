<div class="form-row">
    <input type="hidden" name="id" id="item_id" value="{{ isset( $item ) ? $item->id : '' }}">

    <div class="form-group col-12">
        <label for="type">Category <span class="text-danger">*</span></label>
        <select name="category_id" class="form-control" id="category_id">
            <option value="" disabled selected>-- Select Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if( isset($item) ) {{ $item->category->id === $category->id  ? 'selected' : null }} @endif> {{ $category->name }}</option>
            @endforeach
        </select>
        <span class="category_id_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
    </div>




    <!-- <div class="form-group col-12-md-4">
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

<div class="form-group col-12">
    <label for="name">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ isset($item)? $item->title : old('title') }}">
    <span class="title_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
</div>

<div class="form-group col-12">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="5">{{ isset($item)? $item->description : old('description') }}</textarea>
    <span class="description_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
</div>

<div class="form-group col-12">
    <label for="name">Price <span class="text-danger">*</span></label>
    <input type="number" name="price" class="form-control" id="price" placeholder="Price" value="{{ isset($item)? $item->price : old('price') }}">
    <span class="price_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
</div>
</div>
<div class="row my-4" id="itemImgPreview">
    @include('item.manage.img-data')
</div>

<div class="@if(isset($item)) d-none @endif" id="itemImgUploadForm">
<div class="form-row">
   @for($img = 1; $img <= 4; $img++)
   <div class="col-2 my-2">
      Image {{ $img }}
  </div>
  <div class="col-10 my-2">
<input class="form-control" placeholder="Image" type="file" id="image{{ $img }}" name="image{{ $img }}">

    <span class="image{{ $img }}_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
</div>
@endfor
</div>
</div>

<button type="button" class="btn btn-primary rounded-0 btn-lg btn-block my-2 col-12 {{ !isset( $item ) ? 'd-none' : '' }}"  id="changeItemImgButton">Change images</button>

<div class="mt-3">
    <button type="submit" class="btn btn-primary rounded-0 btn-lg btn-block my-2 col-12" {{ !isset( $item ) ? 'disabled' : '' }} id="submit_form">
        Save
    </button>
</div>
</div>
</div>

</script>

