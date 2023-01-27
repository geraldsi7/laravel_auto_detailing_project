
<script>
    Dropzone.autoDiscover = false;

    var token = $('meta[name="csrf-token"]').attr('content');

    $(function () {
        var myDropzone = new Dropzone("div#dropzoneDragArea", {
            paramName: "file", 
            url: "{{ route('item.manage.store.image') }}",
            previewsContainer: 'div.dropzone-previews',
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 1,
            maxFiles: 4,
            params:{
                _token: token
            },

            init: function () {
                var myDropzone = this;

                $(document).on('submit', '#upload_form', function(e){
                    e.preventDefault();

                    if(option == 'edit'){
                        $('#upload_form input[name="_method"]').prop('disabled', false);
                    }

                    var formData = $(this).serialize();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('item.manage.store.data') }}",
                        data: formData,
                        success: function (response) {

                            if (response.status == "success") {
                                myDropzone.processQueue();

                                let itemID = response.id;

                                alert(itemID)

                                $('#item_id').val(itemID);

                            } else {
                                console.log("error ")
                            }


                        }
                    });
                });

                this.on("sending", function (file, xhr, formData) {
                    let itemID = $('#item_id').val();

                    alert(itemID)

                    var token = $('meta[name="csrf-token"]').attr('content')


                    formData.append('_token', token);

                });

                this.on("success", function (file, response) {
                    $('#manageModal').modal('hide');

                    $('#upload_form')[0].reset();

                    $('.dropzone-previews').empty();

                    $('#submit_form').prop('disabled', true); 

                    if (option == 'add') {
                        toastr.success('Item saved');
                    } else {
                        toastr.success('Item updated');
                    }       

                    fetchData(category, search);
                });

                this.on("queuecomplete", function () {
                // body...
            });

                this.on("sendingmultiple", function () {
                // body...
            });
            }
        });
    });


</script>
