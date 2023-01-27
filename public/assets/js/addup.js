$(document).ready(function() {
 $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
    $('#view_more').hide();

    $("#seePostReview").click(function(){
      $('#view_less').hide();
      $('#view_more').show();
    });

    $("#readMoreBtn").click(function(){
      $('#view_less').hide();
      $('#view_more').show();
    });

    $("#readLessBtn").click(function(){
      $('#view_more').hide();
      $('#view_less').show();
    });

    $("#spendButton").click(function(){
      var spendAmount = $("#spendAmount").val();
      $("#spendNote").html('<p class="text-muted">Are you sure you spent GHS ' + spendAmount + '?</p>');
    });

    $("#addButton").click(function(){
      var addAmount = $("#addAmount").val();
      $("#addNote").html('<p class="text-muted">Are you sure you want to deposit GHS ' + addAmount + '?</p>');
    });

    $('#submit_form').prop('disabled', true);

    $('#submit_form').addClass('.disabled');

    $(document).on('click', '.submit_star', function() {
      var rating = $(this).data('rating');

      reset_background();

      for (var i = 1; i <= rating; i++) {
        $('#submit_star_' + i).addClass('fa-solid');

        $('#submit_star_' + i).removeClass('fa-regular');
      }

      $('#rate').val(rating);

      if(rating >= 1){
        $('#submit_form').prop('disabled', false);

      }
    });


    function reset_background() {
      for (var i = 1; i <= 5; i++) {
        $('#submit_star_' + i).addClass("fa-regular");

        $('#submit_star_' + i).removeClass('fa-solid');
      }
    }

    
    $("#printContent").click(function(){
      var mode = 'iframe';
      var close = mode == "popup";
      var options = { mode: mode , popClose: close };
      $("div.print-here").printArea(options);
    });

  });