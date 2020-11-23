$('.delete').on('click', function(e){
	e.preventDefault();
	let msg = 'Are you sure you want to delete this record?';

	
	if (confirm(msg) ) {
		
		
		let id = $(this).attr('id');
		let token = $('.delete input[name=token]').val();
		console.log(token);

		let params = $.param({id:id, token:token});

		// alert(params);

		axios.post('/profile/contact_delete', params).then(function(res){
			console.log(res.data);
			
			window.location.href = '/profile/contact?id='+res.data.id;
			
		

		}).catch(function(err){
			console.log(err);
		})



	}
	

	
})