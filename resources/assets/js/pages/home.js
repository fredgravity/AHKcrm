$(document).ready(function(){
	'use strict';
	
	setInterval(function(){
		getCounts();
	}, 8000)
	

	setInterval(function(){
		 getDetails();
	}, 4000)
	
	

})

function getCounts(){
	axios.get('/home_dashboard').then(function(res){
		// console.log(res.data.leads)
		$('.total-leads').html(res.data.leads)
		$('.total-customers').html(res.data.customers) 
		$('.total-contacts').html(res.data.contacts) 


	}).catch(function(err){
		console.log(err);
	})
}


function getDetails(){
	$('.home-2').load(location.href + " .home-2");
}