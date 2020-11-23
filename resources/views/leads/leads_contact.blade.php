@extends('layout.base.app')

@section('title', 'Leads Contact Page')

@section('data-page-id', 'leads_contact')

@section('content')

	<section id="leads-contact">
		@include('includes.messages')
		<div class="grid-x grid-padding-x ">
			
			<div class="small-12 medium-3 cell">
				@include('includes.leads_side_profile')
				
			</div>

			<div class="small-12 medium-9 cell">
				<div class="grid-x grid-padding-x">
					
					@if($customer->leads ==0 )
						<div class="small-12 medium-6">
							<h4>Customer Contact</h4>
						</div>
					@else
						<div class="small-12 medium-6">
							<h4>Lead Contact</h4>
						</div>
					@endif
					
					<div class="small-12 medium-6">
						<a href="#" class="button primary float-right" data-open='contact_modal'><i class="fa fa-plus"></i> New Contact</a>
					</div>
				</div>

				<div class="grid-x grid-padding-x" style="overflow-y: auto; max-height: 600px;">

					@foreach($leads as $lead)
						<div class="small-12 medium-7 leads-card">
							<h5><strong>{{ ucfirst($lead['contact_name'])}}</strong> </h5>
							<h6><small>Phone: {{ $lead['contact_phone']}} </small> </h6>
							<h6><small>Email: {{ $lead['contact_email']}} </small></h6>
							<h6><small>Assigned To: {{ $lead['lead_assigned']}}</small> </h6>
							<h6><small>Status: {{ $lead['lead_status']}}</small> </h6>

							<a href="/profile/edit/contact_leads?id={{$lead['id']}}" class="button primary tiny" name="edit_contact_leads">Edit</a>

							<!-- <a href="/leads/details?id={{$customer->id}}" class="button warning tiny" name="details_leads" >Details</a> -->


							<form action="" method="post" style="display: inline-block;" class="delete" id="{{$lead->id}}">
								<input type="hidden" name="lead_id" value="{{$lead->id}}">
								<input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
								<input type="submit" class="button alert tiny" name="delete" value="Delete">
							</form>

							
						</div>

						<div class=" small-12 medium-5 leads-card">
							<img src="/{{$lead['image_path']}}" style="height: 10rem; width: 100%;">
						</div>
						

					@endforeach

					

					
				</div>
								
				</div>

			</div>


			</div>

		</div>
		@include('forms.contact_modal', ['customer' => $customer])
		
		

	</section>


@endsection