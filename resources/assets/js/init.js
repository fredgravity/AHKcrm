$(document).ready(function(){
'use strict';

function callJS(jsfiles){
    let srcp = document.createElement("script");
    srcp.setAttribute("type", "text/javascript");
    srcp.setAttribute("src", jsfiles);
    $js = document.getElementsByTagName("body")[0].appendChild(srcp); 
    //console.log(document.getElementsByTagName("body")[0]);
	//console.log($js);
}


	switch($('body').data('page-id')){

		case 'home':

			callJS('/resources/assets/js/pages/home.js');
			break;

		case 'leads':

			callJS('/resources/assets/js/pages/leads.js');
			break;

		case 'leads_contact':
			callJS('/resources/assets/js/pages/contact_lead_delete_btn.js');
			break;

		case 'detail_leads':
			callJS('/resources/assets/js/pages/detail_leads.js');
		break;

		case 'staff':

			callJS('/resources/assets/js/pages/staff.js');
			break;

	}

});