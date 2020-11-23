@extends('layout.base.app')

@section('title', 'Leads Page')

@section('data-page-id', 'leads')

@section('content')

	<section class="leads">
@include('includes.messages')

		<div class="grid-x grid-padding-x cell">
			
			<div class="medium-2 cell">
		        <a href="/leads/add_new" class="button success"><i class="fa fa-plus"></i> New Lead</a>
		     </div>

		     <div class="medium-3 cell">
			     <select>
				        @foreach($searchByLetter as $letter)
				        	<option>{{ucwords($letter)}}</option>
				        @endforeach
			     </select>
		     </div>

		    <div class="medium-7 ">
		        <ul class="menu  cell align-right">
					<li><input type="search" placeholder="Search" style="width: 400px;"></li>
		      		<li><button type="button" class="button">Search</button></li>
		         </ul>
		     </div>

		</div>

	<h5 class="text-center">Leads</h5>

		
			<div class="grid-x grid-padding-x cell" style="overflow-y: auto; max-height: 600px;">
			@foreach( $customers as $customer)
				<div class="small-12 medium-8 leads-card">
					
					<h5><strong>{{ ucfirst($customer->company)}}</strong> </h5>
					<h6><small>Phone: {{ $customer->phone}} </small> </h6>
					<h6><small>Email: {{ $customer->email}} </small></h6>
					<h6><small>Assigned To: {{ $customer['lead']['lead_assigned']}}</small> </h6>
					<h6><small>Status: {{ $customer['lead']['lead_status']}}</small> </h6>

					<a href="/leads/edit?id={{$customer->id}}" class="button primary tiny" name="edit_leads">Edit</a>

					<a href="/leads/details?id={{$customer->id}}" class="button warning tiny" name="details_leads" >Details</a>

					<form action="/leads/delete" method="post" style="display: inline-block;" class="delete" id="{{$customer->id}}">
						<input type="hidden" name="customer_id" value="{{$customer->id}}">
						<input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
						<input type="submit" class="button alert tiny" name="delete_leads" value="Delete">
					</form>
					
				</div>

				<div class="small-12 medium-4 leads-card">
					<img src="/{{$customer['lead']['image_path']}}" style="height: 10rem; width: 100%;">
				</div>
			@endforeach
			</div>

		


	</section>









@endsection