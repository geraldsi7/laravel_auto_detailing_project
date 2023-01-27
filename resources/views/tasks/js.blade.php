<script>

	var numberOfRows = {{ count($task) }}, selectCounter = 0, row;

	var modalBody = manageModal.querySelector('.modal-body');

	var orderStatus, search;


	$(document).on('change', '#orderStatus', function () {

		orderStatus = $(this).val();

		fetchData(orderStatus, search);
	});

	$(document).on('keyup', '#search', function () {

		search = $(this).val();

		fetchData(orderStatus, search);
	});


	function fetchData(orderStatus, search) {
		$.ajax({
			type: "GET",
			url: "{{ route('tasks.fetch') }}",
			data: {
				orderStatus,
				search
			},
			success: function (data) {
				$('#manage-content').html(data);

				var fetchedCount = $('#fetchedCount').text();

				numberOfRows = fetchedCount;
				selectCounter = 0;

				selectChecks(selectCounter, numberOfRows);

				if(fetchedCount == 1){
					fetchedCount += ' order';
				}else if(fetchedCount != 0 || fetchedCount > 1){
					fetchedCount += ' orders';
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

			$('#complete').prop('disabled', false);
			$('#delivering').prop('disabled', false);
			$('#in-process').prop('disabled', false);
			$('#cancel').prop('disabled', false);

			

			if(selected > 1){ 
				row = 'orders';
			}
			else{
				row = 'order';
			}
		}
		else{

			$('#complete').prop('disabled', true);
			$('#delivering').prop('disabled', true);
			$('#in-process').prop('disabled', true);
			$('#cancel').prop('disabled', true);

		}
	}

	$(document).on('click', '#complete', function(){
		modalBody.textContent = 'Are you sure you want to complete selected ' + row + '?';
		$('#actions').val('completed');
	});

	$(document).on('click', '#delivering', function(){
		modalBody.textContent = 'Are you sure you want to deliver the selected ' + row + '?';
		$('#actions').val('delivering');
	});

	$(document).on('click', '#in-process', function(){ 

		modalBody.textContent = 'Are you sure you want to process the selected ' + row + '?';

		$('#actions').val('in-process');
	});

	$(document).on('click', '#cancel', function(){
		modalBody.textContent = 'Are you sure you want to cancel the selected ' + row + '?';
		$('#actions').val('cancelled');
	});

	$(document).on('submit', '#selectionForm',function (e) {
		e.preventDefault();

		$('#formOrderStatus').val(orderStatus);
		$.ajax({
			type: "POST",
			url: "{{ route('tasks.actions') }}",
			data: $(this).serialize(),
			success: function (response) {

				$('#manageModal').modal('hide');

				$('#manage-content').html(response.view);

				toastr.success(response.msg);

				selectCounter = 0;

				numberOfRows = response.numberOfRows;

				if (numberOfRows != 0) {
					$('#selectionForm')[0].reset();	
				}

				var fetchedOrdersCount = numberOfRows;

				if(fetchedOrdersCount == 1){
					fetchedOrdersCount += ' order';
				}else if(fetchedOrdersCount != 0 || fetchedOrdersCount > 1){
					fetchedOrdersCount += ' orders';
				}else{
					fetchedOrdersCount = '';
				}
				$('#fetchCounter').text(fetchedOrdersCount);				
				selectChecks(selectCounter, numberOfRows);
			}
		});
	});

	
</script>