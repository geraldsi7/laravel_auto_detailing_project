
<script>

  $(function(){
    $('#checkout-pay').submit(function(e){
      e.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var phone1 = $('#phone1').val();
      var phone2 = $('#phone2').val();
      var region = $('#region').val();
      var city = $('#city').val();
      var address = $('#address').val();
      var amount = "{{ $total }}";
      var _token = $("input[name='_token']").val();
      
      submitCheckout(phone1, phone2,region,city, address, _token);

    });
  });

  function makePayment(amount, email, phone_number, name) {   

    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-f00afa92d69128c7b5c50e54ec4cd64f-X",
      tx_ref: "DCTRNX_{{ $tr_id }}",
      amount,
      currency: "GHS",
      payment_options: " ",
      customer: {
        email,
        phone_number,
        name,
      },
      callback:  function (data) {
        var tr_id = data.transaction_id;
        var _token = $("input[name='_token']").val();
        var phone1 = $('#phone1').val();
        var phone2 = $('#phone2').val();
        var region = $('#region').val();
        var city = $('#city').val();
        var address = $('#address').val();
        // Make ajax request
        $.ajax({
          type: "POST",
          url: "{{ URL::to('verify-payment') }}",
          data: {
            tr_id,
            phone1,
            phone2,
            region,
            city,
            address,
            _token 
          },
          success: function (response) {
            if (response[0] == 'success') {
             window.location = "{{ route('cart.history') }}";
           } else {
            window.location = "{{ route('welcome') }}";
          }
        }
      });
      }, 
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "DeCraft",
        description: "Payment for items in cart",
        logo: "{{ asset('assets') }}/img/favicon.jpg",
      },
    });
  }



  function submitCheckout(phone1,phone2,region,city,address,_token) {

    $.ajax({
      type: "POST",
      url: "{{ route('cart.checkout') }}",
      data: {
        phone1,
        phone2,
        region,
        city,
        address,
        _token 
      },
      success: function (response) {
        $('#checkout-pay :input').removeClass('is-invalid');

        $('#checkout-pay span').text(""); 

        var name = $('#name').val();
        var email = $('#email').val();
        var phone1 = $('#phone1').val();
        var amount = "{{ $total }}";
        if (response.status == 0) {
         $.each(response.error, function(prefix, val){
          $('#'+prefix).addClass('is-invalid');
          $('.'+prefix+'_error').text(val[0]);
        });
       }else{
        makePayment(amount, email, phone1, name);
      }
    }
  });

  }
</script>