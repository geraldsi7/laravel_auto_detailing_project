<script>
  $('#upload_form input[name="_method"]').prop('disabled', true);

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
  $(document).on('show.bs.modal', '#manageModal', function(event) {

    button = event.relatedTarget;

    option = button.getAttribute('data-option');

    modalTitle = $('#manageModal .modal-title');

    if (option == 'add') {
      action = "{{ route('gallery.store') }}";
    } else {
      action = button.getAttribute('data-update');

    }

    modalTitle.text(option + ' photo');

    ref = button.getAttribute('data-href');

    formContent(ref);

  });


  function formContent(id) {
    $.ajax({
      method: "GET",
      data: {
        id
      },
      url: "{{ route('gallery.create') }}",
      success: function(response) {
        $('#formContent').html(response);
      }
    });
  }

  //validate form on keyup
  var timer = null

  $(document).on('change', '#upload_form', function(e) {
    e.preventDefault()
    // let data = new FormData(this)

    let fileInput = document.getElementById('photo')

    let file = fileInput.files[0]


    if (file) {

      let fileReader = new FileReader()

      fileReader.onload = function() {
        var fileOutput = document.getElementById('imgPreview')
        var imgContainer = document.getElementById('imgContainer')
        imgContainer.style.width = '16em'
        imgContainer.style.height = '16em'
        fileOutput.style.width = '100%'
        fileOutput.style.height = '100%'
        fileOutput.style.objectFit = 'cover'
        fileOutput.src = fileReader.result
      }

      fileReader.readAsDataURL(file)
    } else {
      var fileOutput = document.getElementById('imgPreview')
      fileOutput.src = ''
    }


  })

  $(document).on('submit', '#upload_form', function(e) {
    e.preventDefault();

    $('#submit_form').prop('disabled', true);

    if (option == 'replace') {
      $('#upload_form input[name="_method"]').prop('disabled', false);
    }

    $.ajax({
      type: "POST",
      url: action,
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response) {

        $('#upload_form :input').removeClass('is-invalid');

        $('#upload_form .invalid-feedback').text("");

        if (response.status == 0) {
          toastr.error(response.msg);
          $.each(response.error, function(prefix, val) {
            prefix = prefix.replace('.', '_');
            $('#' + prefix).addClass('is-invalid');
            $('.' + prefix + '_error').text(val[0]);
          });
        } else {
          toastr.success(response.msg);
          $('#manageModal').modal('hide');

          $('#upload_form')[0].reset();

          fetchData();
          $('#upload_form input[name="_method"]').prop('disabled', true);
        }
        $('#submit_form').prop('disabled', false);


      }
    });
  });



  $('#manageModal').on('hide.bs.modal', function(event) {
    $('#upload_form :input').removeClass('is-invalid');

    $('#upload_form .invalid-feedback').text("");

    $('#upload_form')[0].reset();

    $('#upload_form input[name="_method"]').prop('disabled', true);

    ref = null;

  });


  function fetchData() {
    $.ajax({
      type: "GET",
      url: "{{ route('gallery.fetch') }}",
      success: function(data) {
        $('#manage-content').html(data.view);

        numberOfRows = data.numberOfRows;
        selectCounter = 0;

        var fetchedCount = numberOfRows;

        if (fetchedCount == 1) {
          fetchedCount += ' photo';
        } else if (fetchedCount != 0 || fetchedCount > 1) {
          fetchedCount += ' photos';
        } else {
          fetchedCount = '';
        }
        $('#fetchCounter').text(fetchedCount);
      }
    });
  }



  $(document).on('show.bs.modal', '#removeModal', function(event) {
    button = event.relatedTarget;
    ref = button.getAttribute('data-href')
  })

  $(document).on('hide.bs.modal', '#removeModal', function() {
    ref = null
  })

  $(document).on('click', '#confirmBtn', function(e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "{{ route('gallery.destroy') }}",
      data: {
        ref
      },
      success: function(response) {

        toastr.success(response.msg)

        $('#removeModal').modal('hide');

        fetchData();
      }
    });
  });
</script>