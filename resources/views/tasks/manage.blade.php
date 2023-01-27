   <span class="h4 card-title pr-5 text-capitalize" id="fetchCounter">
    @if(count($task) == 1)
    {{ count($task) }} 
    @if(count($task) == 1)
    order
    @else
    orders
    @endif
    @endif
  </span>

  <div class="pull-right" style="font-size: 1.1rem">
    <button type="button" form="selectionForm" id="complete" disabled data-toggle="modal" data-target="#manageModal" class="btn btn-link text-capitalize  h6"><i class="fa fa-check-double" aria-hidden="true"></i></button> 

    <button type="button" form="selectionForm" id="delivering" disabled data-toggle="modal" data-target="#manageModal" class="btn btn-link text-capitalize  h6"><i class="fa fa-truck" aria-hidden="true"></i></button> 

    <button type="button" form="selectionForm" id="in-process" disabled data-toggle="modal" data-target="#manageModal" class="btn btn-link text-capitalize  h6"><i class="fa fa-check" aria-hidden="true"></i></button> 

    <button type="button" form="selectionForm" id="cancel" disabled data-toggle="modal" data-target="#manageModal" class="btn btn-link  text-capitalize  h6"><i class="fa fa-ban" aria-hidden="true"></i></button> 
  </div >
  <div class="clearfix mt-3"></div>
  <div class="pull-left">
    <label>Fetch 
      <select  class="py-1 pr-4 pl-1 border border-gray-300" name="status" id="orderStatus">
        <option value="completed">Completed</option>
        <option value="delivering">Delivering</option>
        <option selected value="in-process">In-Process</option>
        <option value="cancelled">Cancelled</option>
      </select>
    orders </label>
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



<div class="modal" id="manageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class=" modal-title text-capitalize">Manage order</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p class="" id="manageModalBody"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default text-capitalize rounded-0" data-dismiss="modal">No</button>
        <button type="submit" form="selectionForm" class="btn btn-primary text-capitalize rounded-0">yes</button>
      </div>
    </div>
  </div>
</div>

<div id="manage-content">
  @include('tasks.data')
</div>


@include('tasks.js')