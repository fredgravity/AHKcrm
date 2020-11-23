<?php



	$routeArray = [
		['home'			=>['GET','/home', 'App\Controllers\IndexController@home']] ,

		['dashboard'			=>['GET','/home_dashboard', 'App\Controllers\IndexController@homeDashboard']] ,

		['dashboard_details'			=>['GET','/home_dashboard_details', 'App\Controllers\IndexController@homeDashboardDetails']] ,

		['welcome'			=>['GET','/welcome', 'App\Controllers\IndexController@welcome']] ,

		// LEADS
		['leads'		=>['GET','/leads', 'App\Controllers\LeadsController@manageLeads']] ,

		['new_leads_form'=>['GET','/leads/add_new', 'App\Controllers\LeadsController@addNewLeadsForm']] ,

		['new_leads_add'=>['POST','/leads/add', 'App\Controllers\LeadsController@addNewLeads']] ,

		['edit_leads'=>['GET','/leads/edit', 'App\Controllers\LeadsController@editLeads']] ,

		['update_leads'=>['POST','/leads/update', 'App\Controllers\LeadsController@updateLeads']] ,

		['delete_leads'=>['POST','/leads/delete', 'App\Controllers\LeadsController@deleteLeads']] ,

		['detail_leads'=>['POST','/leads/details', 'App\Controllers\LeadsController@detailsLeads']] ,

		// CONTACT
		['contact'=>['GET','/profile/contact', 'App\Controllers\ContactController@leadsContact']] ,

		['add_contact'=>['POST','/profile/add_contact', 'App\Controllers\ContactController@addContact']] ,

		['delete_contact'=>['POST','/profile/delete_contact', 'App\Controllers\ContactController@deleteContactLeads']] ,


		['contact_edit'=>['POST','/profile/contact/edit', 'App\Controllers\ContactController@editContactLeads']] ,

		['edit_contact_leads_form'=>['POST','/profile/edit/contact_leads', 'App\Controllers\ContactController@editContactLeadsForm']] ,

		['delete_leads_contact'=>['POST','/profile/contact_delete', 'App\Controllers\ContactController@deleteContactLeads']] ,

		['axios_lead_edit'=>['POST','/profile/get_leads', 'App\Controllers\ContactController@axiosGetLeads']] ,



		//CALLS
		['calls'=>['POST','/profile/calls', 'App\Controllers\CallController@leadsCalls']] ,

		['add_call'=>['POST','/profile/add_call', 'App\Controllers\CallController@addCall']] ,



		//CUSTOMERS
		['customer_status'=>['POST','/customers/change_status', 'App\Controllers\CustomerController@status']] ,

		['customers'=>['GET','/customers', 'App\Controllers\CustomerController@manageCustomers']] ,

		['edit_customers'=>['GET','/customers/edit', 'App\Controllers\CustomerController@editCustomers']] ,

		['update_customers'=>['POST','/customers/update', 'App\Controllers\CustomerController@updateCustomers']] ,

		['delete_customers'=>['POST','/customers/delete', 'App\Controllers\CustomerController@deleteCustomers']] ,

		['new_customers_add'=>['POST','/customers/add', 'App\Controllers\CustomerController@addNewCustomers']] ,

		['new_customer_form'=>['GET','/customers/add_new', 'App\Controllers\CustomerController@addNewCustomersForm']] ,

		['detail_customers'=>['POST','/customers/details', 'App\Controllers\CustomerController@detailsCustomers']] ,


		//STAFF
		['staff'=>['GET','/staff', 'App\Controllers\StaffController@manageStaff']] ,

		['add_staff'=>['POST','/staff/add_staff', 'App\Controllers\StaffController@addStaff']] ,

		['add_edit'=>['GET','/staff/edit', 'App\Controllers\StaffController@editStaff']] ,

		['add_update'=>['POST','/staff/update_staff', 'App\Controllers\StaffController@updateStaff']] ,

		['add_delete'=>['POST','/staff/delete_staff', 'App\Controllers\StaffController@deleteStaff']] ,




		['login_form'	=>['GET','/login_form', 'App\Controllers\AuthController@loginForm']] ,

		['login'		=>['POST','/login', 'App\Controllers\AuthController@login']] ,

		['logout'		=>['GET','/logout', 'App\Controllers\AuthController@logout']] ,


		//SEARCH
		['search_leads'	=>['POST','/search_leads', 'App\Controllers\IndexController@searchLeads']] ,

		['search_customers'	=>['POST','/search_customers', 'App\Controllers\IndexController@searchCustomers']],

		// ['contact_us_2' =>['GET','/contact', 'App\Controllers\IndexController@contactUs']] ,
	
	];

	



?>