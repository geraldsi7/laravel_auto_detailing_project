<script>
	// add item to cart

	$(document).on('click','#addItemToCart', function(e){

		e.preventDefault();

		var qty = 1;
		var price = {{ $item->price }};
		var amount = qty * price;
		var id = {{ $item->id }}; 
		var _token = $('meta[name="csrf-token"]').attr('content');  

		$.ajax({
			type: "POST",
			url: "{{ route('cart.store') }}",
			data:{
				qty,
				id,
				amount,
				_token
			},
			success:function(res){  
				$('#orderCounter').text( res.numberOfOrders );
				toastr.success(res.msg);
			}
		});

	});

	// end of item to cart

	// add item to wishlist

	$(document).on('click','#addItemToWishlist', function(e){

		e.preventDefault();

		var qty = 1;
		var price = {{ $item->price }};
		var amount = qty * price;
		var id = {{ $item->id }}; 
		var _token = $('meta[name="csrf-token"]').attr('content');  

		$.ajax({
			type: "POST",
			url: "{{ route('wishlist.store') }}",
			data:{
				qty,
				id,
				amount,
				_token
			},
			success:function(res){  
				toastr.success(res.msg);
			}
		});

	});

	// end of item to wishlist

	// review on item

	$(document).on('submit','#review_form', function(e){

		e.preventDefault();

		$.ajax({
			type: "POST",
			url: "{{ route('review.store') }}",
			data: $(this).serialize(),
			success:function(response){

				$('#manage-review-content').html(response);

				var fetchedRatingCount = $('#fetchedRatingCount').text();

				$('.ratingCount').text(fetchedRatingCount);
				$('#postReviewModal').modal('hide');
				$('#review_form')[0].reset();
				toastr.success('Thank you for rating this item');
				
			}
		});

	});


	// end review on item

		// delete review on item

		$(document).on('click', '.deleteReview', function(e){


			var id = $(this).attr('data-id');
			var itemID = "{{ $item->id }}";

			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "{{ route('review.destroy') }}",
				data: {
					id, 
					itemID
				},
				success:function(response){ 
					$('#manage-review-content').html(response);

					var fetchedRatingCount = $('#fetchedRatingCount').text();

					$('.ratingCount').text(fetchedRatingCount);

					toastr.success('Review removed');
					
				}
			});

		});

	// end delete review on item
</script>