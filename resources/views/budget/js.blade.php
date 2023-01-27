<script>
  var budget = $('#budget').val();

  var from_date = $('#from_date').val();

  var to_date = $('#to_date').val();

  fetchData(budget, from_date, to_date);

  $(document).on('change', '#budget', function () {
    budget = $(this).val();

    fetchData(budget, from_date, to_date);
  });

  $(document).on('change', '#from_date', function () {
    from_date = $(this).val();

    fetchData(budget, from_date, to_date);
  });

  $(document).on('change', '#to_date', function () {
    to_date = $(this).val();

    fetchData(budget, from_date, to_date);
  });


  $(document).on('change keyup', '#upload_form', function(){
   $.ajax({
    type: "POST",
    url: "{{ route('budgets.validates') }}",
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
  });
 });


  $(document).on('submit', '#upload_form', function(e){
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "{{ route('budgets.store') }}",
      data: $(this).serialize(),
      success: function (response) {

        $('#manageModal').modal('hide');

        $('#upload_form')[0].reset();

        $('#submit_form').prop('disabled', true); 

        toastr.success('Record saved');

        fetchData(budget, from_date, to_date);
      }
    });
  });


 $(document).on('click', '#print', function(){
    
    $.ajax({
      type: "GET",
      url: "{{ route('budgets.print') }}",
      data: {
        budget,
        from_date,
        to_date
      }
    });
  });




  function fetchData(budget, from_date, to_date) {
    $.ajax({
      type: "GET",
      url: "{{ route('budgets.fetch') }}",
      data: {
        budget,
        from_date,
        to_date
      },
      success: function (data) {
        $('#manage-content').html(data);     
      }
    });
  }
</script>