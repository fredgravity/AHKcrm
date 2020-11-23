@extends('layout.base.app')

@section('title', 'Customer Page')

@section('data-page-id', 'add_customers')

@section('content')


<section class="customer-add-new">
	<h3>Add New</h3>


	@include('includes.messages')
	<form action="/customers/add" method="post" enctype="multipart/form-data">
	<div class="grid-x grid-padding-x">
		
		<div class="small-12 medium-6 cell">
			<fieldset>
				<legend><h5>Company Details</h5></legend>
				@include('forms.new_leads.company_details_form')
			</fieldset>
			
		</div>

		<div class="small-12 medium-6 cell">
			
			<div class="grid-x grid-padding-x cell">
				<div class="small-12 ">
					<h5>Primary Contact</h5>

					@include('forms.new_leads.primary_contact_form')
				</div>

				<div class="small-12 cell">
					<h5>Lead Details</h5>

					@include('forms.new_leads.lead_details_form')
				</div>
				
			</div>

		</div>


	</div>
	<input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">

		<input type="submit" class="button success  company_details-btn" name="company_details_btn" value="Save">

</form>
</section>



@endsection