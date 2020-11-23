$('.delete').on('click', function(e){
	e.preventDefault();
	let msg = 'Are you sure you want to delete this record?';
// alert('hi');
	
	if (confirm(msg) ) {
		
		
		let id = $(this).attr('id');
		let token = $('.delete-staff').val();
		// console.log($('.delete-staff ').val());

		let params = $.param({id:id, token:token});

		// alert(params);

		axios.post('/staff/delete_staff', params).then(function(res){
			console.log(res.data);
			
			location.reload();
			
		

		}).catch(function(err){
			console.log(err);
		})



	}
	

	
})