  <!-- ajax create -->

  <script>
          $(document).ready(function(){

           $('#upload_form').on('submit', function(event){
            event.preventDefault();
            $('#send_form').html('Saving..');
            $.ajax({
             url:"{{ route('schools.store') }}",
             method:"POST",
             data:new FormData(this),
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
              $('#send_form').html('Save');
              $('#res_message').show();
              $('#res_message').html(data.msg);
              $('#msg_div').removeClass('d-none');
              document.getElementById("upload_form").reset(); 
            }
          })
          });

         });
       </script>

  <!-- ajax update -->

  <script>
          $(document).ready(function(){
            $("#logo").css('display', 'none');            
           $("#changeLogo").click(function(event){
            event.preventDefault();
            
            $("#changeLogo").css('display', 'none');
            $("#logo").css('display', 'block');
          });

           $('#upload_form').on('submit', function(event){
            event.preventDefault();
            let code = $('#code').val();
            let name = $('#name').val();
            let type_id = $('#type_id').val();
            let address = $('#address').val();
            let email = $('#email').val();
            let phone1 = $('#phone1').val();
            let phone2 = $('#phone2').val();

            $('#send_form').html('Saving..');
            $.ajax({
             url:"{{ route('schools.info.update', $school->id) }}",
             method:"PUT",
             data: {
              code : code,
              name : name,
              type_id : type_id,
              address : address,
              email : email,
              phone1 : phone1,
              phone2 : phone2,
             },
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
              $('#send_form').html('Save');
              $('#res_message').show();
              $('#res_message').html(data.msg);
              $('#msg_div').removeClass('d-none');
              document.getElementById("upload_form").reset(); 
            }
          })
          });

         });
       </script>