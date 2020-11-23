@extends('layout.base.app')

@section('title', 'Edit Leads Page')

@section('data-page-id', 'edit_leads')

@section('content')


<section class="leads-edit">
	<h3>Edit Leads</h3>


	@include('includes.messages')
	<form action="/leads/update" method="post" enctype="multipart/form-data">
	<div class="grid-x grid-padding-x">
		
		<div class="small-12 medium-6 cell">
			<fieldset>
				<legend><h5>Company Details</h5></legend>
				@include('forms.edit_leads.company_details_form', ['customer'=> $customer ] )
			</fieldset>
			
		</div>

		<div class="small-12 medium-6 cell">
			
			<div class="grid-x grid-padding-x cell">
				<div class="small-12 ">
					<h5>Primary Contact</h5>

					@include('forms.edit_leads.primary_contact_form', ['customer'=> $customer ])
				</div>

				<div class="small-12 cell">
					<h5>Lead Details</h5>

					@include('forms.edit_leads.lead_details_form', ['customer' => $customer])
				</div>
				
			</div>

		</div>


	</div>
	<input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">

		<input type="submit" class="button success  company_details-btn" name="company_details_btn" value="Update">

</form>
</section>



@endsection