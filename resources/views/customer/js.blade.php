<script>

  $('#upload_form input[name="_method"]').prop('disabled', true);

  var numberOfRows = {{ count($customers) }}, selectCounter = 0, row;

  var manageModal = $('#manageModal'),
  button,
  option,
  modalDialog,
  modalTitle,
  form,
  action,
  ref,
  search = $('#search').val();


  // manage modal show function
  $(document).on('show.bs.modal', '#manageModal', function (event) {

    button = event.relatedTarget;

    option = button.getAttribute('data-option');

    modalTitle = $('#manageModal .modal-title');

    if(option == 'add'){
      action = "{{ route('category.manage.store') }}";
    }else{
      action = button.getAttribute('data-update');

    }

    modalTitle.text(option + ' customer');

    ref = button.getAttribute('data-href');

    formContent(ref);

  });


  function formContent(id){
    $.ajax({
      method: "GET",
      data: {
        id
      },
      url: "{{ route('customers.form') }}",
      success: function (response) {
        $('#formContent').html(response);
      }
    });
  }

  $(document).on('keyup', '#upload_form', function(){
    $.ajax({
      type: "POST",
      url: "{{ route('customers.validates') }}",
      data: $(this).serialize(),
      success: function (response) {

        $('#upload_form :input').removeClass('is-invalid');

        $('#upload_form .invalid-feedback').text("");

        if (response.status == 0) {
          $('#submit_form').prop('disabled', true);

          $.each(response.error, function(prefix, val){
           prefix = prefix.replace('.', '_');
           $('#' + prefix).addClass('is-invalid');
           $('.' + prefix +'_error').text(val[0]);
         });
        }
        else{
          $('#submit_form').prop('disabled', false);        
        }

      }
    })
  });

  $(document).on('submit', '#upload_form', function(e){
    e.preventDefault();

    if(option == 'edit'){
      $('#upload_form input[name="_method"]').prop('disabled', false);
    }

    $.ajax({
      type: "POST",
      url: action,
      data: $(this).serialize(),
      success: function (response) {

        $('#manageModal').modal('hide');

        $('#upload_form')[0].reset();

        $('#submit_form').prop('disabled', true); 

        if (option == 'add') {
         toastr.success('Customer saved');
       } else {
         toastr.success('Customer updated');
       }       

       fetchData(search);
     }
   });
  });



  $('#manageModal').on('hide.bs.modal', function (event) {

    $('#upload_form')[0].reset();

    ref = null;

  });


  $(document).on('keyup', '#search', function () {

    search = $(this).val();

    fetchData(search);
  });



  function fetchData(search) {
    $.ajax({
      type: "GET",
      url: "{{ route('customers.fetch') }}",
      data: {
        search
      },
      success: function (data) {
        $('#manage-content').html(data.view);

        numberOfRows = data.numberOfRows;
        selectCounter = 0;

        selectChecks(selectCounter, numberOfRows);

        var fetchedCount = numberOfRows;

        if(fetchedCount == 1){
          fetchedCount += ' customer';
        }else if(fetchedCount != 0 || fetchedCount > 1){
          fetchedCount += ' customers';
        }else{
          fetchedCount = '';
        }
        $('#fetchCounter').text(fetchedCount);           }
      });
  }

  function selectChecks(selected, items){
    if (selected == items) {
      $('#selectionForm :input').prop('checked', true);
    }
    else if(selected == 0){
      $('#selectionForm :input').prop('checked', false);
    }
    else{
      $('#all_check').prop('checked', false);
    }
    actionsCheck(selected);
  }

  $(document).on('change','#all_check', function() {
    if($(this).prop('checked')){
      selectCounter = numberOfRows;
    }
    else{
      selectCounter = 0;
    }

    selectChecks(selectCounter, numberOfRows);
  });


  $(document).on('change', '#single_check',function() {

    if($(this).prop('checked')){
      selectCounter++;    
    }
    else{
      selectCounter--;
    }

    selectChecks(selectCounter, numberOfRows);

  });


  function actionsCheck(selected) {
    if(selected >= 1){

     // $('#complete').prop('disabled', false);
     // $('#delivering').prop('disabled', false);
     // $('#in-process').prop('disabled', false);
     $('#allow').prop('disabled', false);

     $('#deny').prop('disabled', false);

     $('#remove').prop('disabled', false);     

     if(selected > 1){ 
      row = 'rows';
    }
    else{
      row = 'row';
    }

    $('#removeModalBody').text('Are you sure you want to remove the selected ' + row + '?');
  }
  else{

    //  $('#complete').prop('disabled', true);
    //  $('#delivering').prop('disabled', true);
    //  $('#in-process').prop('disabled', true);
    $('#allow').prop('disabled', true);

    $('#deny').prop('disabled', true);

    $('#remove').prop('disabled', true);

  }
}

$(document).on('click', '#allow', function(){
  $('#actions').val('allow');
});

$(document).on('click', '#deny', function(){
  $('#actions').val('deny');
});

$(document).on('click', '#remove', function(){

  $('#actions').val('remove');
});

$(document).on('submit', '#selectionForm',function (e) {
  e.preventDefault();

  $.ajax({
    type: "POST",
    url: "{{ route('customers.actions') }}",
    data: $(this).serialize(),
    success: function (response) {

      $('#removeModal').modal('hide');

      if (action == 'remove') {
          toastr.success('<span class="text-capitalize">' + row + '</span> removed');
        } else {
          toastr.success('<span class="text-capitalize">' + row + '</span> updated');
        }

      fetchData(search);
    }
  });
});

</script>