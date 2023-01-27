  <span class="h4 card-title pr-5 text-capitalize" id="fetchCounter">
    @if(count($items) >= 1)
    {{ count($items) }} 
    @if(count($items) == 1)
    item
    @else
    items
    @endif
    @endif
  </span>
  <div class="pull-right" style="font-size: 1.1rem">
   <button type="button" class="btn btn-link text-capitalize text-primary h6" data-toggle="modal" data-target="#manageModal" data-option="add"><i class="fa-solid fa-plus" aria-hidden="true"></i>
   </button>

   <button class="btn btn-link text-primary h6" id="remove" disabled data-toggle="modal" data-target="#removeModal" type="button"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
 </div >
 <div class="clearfix mt-3"></div>
 <div class="pull-left">
  <label>Fetch 
    <select  class="py-1 pr-4 pl-1 border border-gray-300" name="category" id="category">
      @foreach($categories as $key => $category)
      <option value="{{ $category->id }}" @if($key == 0) selected @endif>{{ $category->name }}</option>
      @endforeach
    </select>
  items </label>
</div>



 <!--
<div class="pull-left">
 <label>
    Show
    <select class="py-1 pr-4 pl-1 border border-gray-300" name="numberOfRows" id="numberOfRows">
      <option value="25" selected>25</option>
      <option value="50">50</option>
      <option value="100">100</option>
      <option value="250">250</option>
      <option value="500">500</option>
    </select>
    entries
  </label>

</div>
-->
<div class="pull-right">
  <input type="text" name="search" class="form-control rounded-0" id="search" placeholder="Search">
</div>

<div class="clearfix"></div>



<!-- manage modal -->
<div class="modal fade" id="manageModal"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="manageModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="upload_form" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div id="formContent">
         </div>
       </form>
     </div>
   </div>
 </div>
</div>

<!-- remove modal -->
<div class="modal" id="removeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-muted modal-title text-capitalize">Remove row</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p class="text-muted" id="removeModalBody"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default text-capitalize rounded-0" data-dismiss="modal">No</button>
        <button type="submit" form="selectionForm" class="btn btn-primary text-capitalize rounded-0">yes</button>
      </div>
    </div>
  </div>
</div>





<div id="manage-content">
  @includeif('item.manage.data')
</div>


<script>  
    

</script>


@includeif('item.manage.js')