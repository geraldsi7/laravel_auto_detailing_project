<script>
	$('#upload_form input[name="_method"]').prop('disabled', true);

	var numberOfRows = {{ count($items) }}, selectCounter = 0, row;

	var modalBody = manageModal.querySelector('.modal-body');

	var category = $('#category').val(),
	search = $('#search').val(), 
	button,
	option,
	modalTitle,
	action;


	$(document).on('change', '#category', function () {

		category = $(this).val();

		fetchData(category, search);
	});

	$(document).on('keyup', '#search', function () {

		search = $(this).val();

		fetchData(category, search);
	});

	$(document).on('show.bs.modal', '#manageModal', function (event) {

		button = event.relatedTarget;

		option = button.getAttribute('data-option');

		modalTitle = $('#manageModal .modal-title');

		if(option == 'add'){
			action = "{{ route('item.manage.store') }}";
		}else{
			action = button.getAttribute('data-update');

		}

		modalTitle.text(option + ' item');

		ref = button.getAttribute('data-href');

		formContent(ref);

	});


	function formContent(id){

		$.ajax({
			method: "GET",
			data: {
				id
			},
			url: "{{ route('item.manage.form') }}",
			success: function (response) {
				$('#formContent').html(response);
			}
		});
	}


	$(document).on('keyup change', '#upload_form', function(e){

		$.ajax({
			type: "POST",
			url: "{{ route('item.manage.validates') }}",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
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
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {

				$('#manageModal').modal('hide');

				$('#upload_form')[0].reset();		
				if (option == 'add') {
					toastr.success('Item saved');
				} else {
					toastr.success('Item updated');
				}       

				fetchData(category, search);
			}
		});
	});


	$('#manageModal').on('hide.bs.modal', function (event) {

		$('#upload_form')[0].reset();

		$('#upload_form input[name="_method"]').prop('disabled', true);

		$('#submit_form').prop('disabled', true); 

		ref = null;

	});



	function fetchData(category, search) {
		$.ajax({
			type: "GET",
			url: "{{ route('manage.item.fetch') }}",
			data: {
				category,
				search
			},
			success: function (data) {

				$('#manage-content').html(data.view);

				numberOfRows = data.numberOfRows;
				selectCounter = 0;

				selectChecks(selectCounter, numberOfRows);

				var fetchedCount = numberOfRows;

				if(fetchedCount == 1){
					fetchedCount += ' item';
				}else if(fetchedCount != 0 || fetchedCount > 1){
					fetchedCount += ' items';
				}else{
					fetchedCount = ''
				}
				$('#fetchCounter').text(fetchedCount);		
			}
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
    $('#remove').prop('disabled', true);

}
}


$(document).on('click', '#remove', function(){

	$('#actions').val('remove');
});

$(document).on('submit', '#selectionForm',function (e) {
	e.preventDefault();

	$.ajax({
		type: "POST",
		url: "{{ route('manage.item.actions') }}",
		data: $(this).serialize(),
		success: function (response) {

			$('#removeModal').modal('hide');

			toastr.success('<span class="text-capitalize">' + row + '</span> removed');

			fetchData(category, search);

			$('#selectionForm')[0].reset();	
		}
	});
});

$(document).on('click', '#changeItemImgButton', function () { 
	$('#itemImgUploadForm').toggle(
		function() {
			$( this ).removeClass("d-none");
		}
		);

});

$(document).on('click', '#removeItemImage', function (e) {
	e.preventDefault();

	var id = $('#item_id').val();

	var img = $(this).attr('data-ref-image');

	$.ajax({
		type: 'POST',
		url: "{{ route('item.manage.remove.image') }}",
		data:{
			id,
			img
		},
		success: function (data) {
			$('#itemImgPreview').html(data);

			toastr.success('Image removed');
		}
	})

});

</script>