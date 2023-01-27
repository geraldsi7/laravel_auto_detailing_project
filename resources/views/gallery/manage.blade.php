<div class="d-flex justify-content-between align-items-center">
    <span class="h4 card-title pr-5 text-capitalize" id="fetchCounter">
        @if(count($galleries) >= 1)
        {{ count($galleries) }}
        @if(count($galleries) == 1)
        photo
        @else
        photos
        @endif
        @endif
    </span>

    <div style="font-size: 1.5rem">
        <button type="button" class="btn btn-link text-capitalize text-primary" data-toggle="modal" data-target="#manageModal" data-option="add"><i class="fa-solid fa-plus" aria-hidden="true"></i>
        </button>
    </div>
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

<div class="clearfix"></div>



<!-- manage modal -->
<div class="modal fade" id="manageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="manageModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data">
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
                <h5 class="text-muted modal-title text-capitalize">Remove photo</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-muted">
                Are you sure you want to remove this photo?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default text-capitalize rounded-0" data-dismiss="modal">No</button>
                <a href="" id="confirmBtn" type="button" class="btn btn-primary text-capitalize rounded-0">yes</a>
            </div>
        </div>
    </div>
</div>





<div id="manage-content">
    @includeif('gallery.data')
</div>
@includeif('gallery.js')