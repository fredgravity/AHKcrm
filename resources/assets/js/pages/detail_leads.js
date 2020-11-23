$(document).ready(function(){

	$('.make-customer').on('click', function(){

		let id = $(this).attr('id');
		$data = $.param({id:id});

		axios.post('/customers/change_status', $data).then(function(res){
			console.log(res.data);
			if (res.data.redirect) {
				window.location.href = '/customers';
			}else{
				
				// location.reload();
			}

		}).catch(function(err){
			console.log(err);
		})

	})

})