$(document).ready(function(){
	'use strict';

$('.delete').on('click', function(e){
	e.preventDefault();
	let msg = 'Are yo sure you want to delete this record?';

	
	if (confirm(msg) ) {
		
		
		let id = $(this).attr('id');
		let token = $('.delete input[name=token]').val();
		console.log(token);

		let params = $.param({id:id, token:token});

		// alert(params);

		axios.post('/leads/delete', params).then(function(res){
			console.log(res.data);
			
			window.location.href = '/leads/';
			
		

		}).catch(function(err){
			console.log(err);
		})

	};
});
	
});