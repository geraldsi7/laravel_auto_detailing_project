<script>
	$(document).on('change', '.itemQty', function(event){

		var itemID = $(this).attr('data-id');
		var qty = $(this).val();

		$.ajax({
			type: "POST",
			url: "{{ route('cart.qty.update') }}",
			data:{
				itemID,
				qty
			},
			success: function (response) {

				$('#manage-content').html(response.view);

				toastr.success(response.msg);

				selectCounter = 0;

				numberOfRows = response.numberOfRows;

				if (response.numberOfOrders == 0) {
					$('#orderCounter').text('');
				} else {
					$('#orderCounter').text( response.numberOfOrders );
				}	

				if (numberOfRows == 0) {
					$('#remove').hide()
				}
				else{
					$('#selectionForm')[0].reset();	
				}

				selectChecks(selectCounter, numberOfRows);
			}
		});

	});

	var numberOfRows = "{{ count($carts) }}";

	var selectCounter = 0;

	selectChecks(selectCounter, numberOfRows);

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

			$('#remove').prop('disabled', false);

		}
		else{

			$('#remove').prop('disabled', true);
		}
	}

	$(document).on('click', '#remove', function(){
		$('#actions').val('remove');
	});

	$(document).on('submit', '#selectionForm',function (e) {
		e.preventDefault();
		var action = $('#actions').val();

		$.ajax({
			type: "POST",
			url: "{{ route('cart.actions') }}",
			data: $(this).serialize(),
			success: function (response) {

				$('#manage-content').html(response.view);

				toastr.success(response.msg);

				selectCounter = 0;

				numberOfRows = response.numberOfRows;

				if (response.numberOfOrders == 0) {
					$('#orderCounter').text('');
				} else {
					$('#orderCounter').text( response.numberOfOrders );
				}

				if (numberOfRows == 0) {
					$('#remove').hide()
				}
				else{
					$('#selectionForm')[0].reset();	
				}

				selectChecks(selectCounter, numberOfRows);
			}
		});
	});

</script>