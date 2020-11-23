@extends('layout.base.app')

@section('title', 'Details Leads Page')

@section('data-page-id', 'detail_leads')

@section('content')

	<section id="detail-leads">
@include('includes.messages')
		<div class="grid-x grid-padding-x ">
			
			
			<div class="small-12 medium-3 cell">
				@include('includes.leads_side_profile')				
				
			</div>

			<div class="small-12 medium-9 cell">
				<table>
					<tr>
						<td>Company Name:</td>
						<td>{{ $customer->company }}</td>
					</tr>

					<tr>
						<td>Phone Number:</td>
						<td>{{ $customer->phone }}</td>
					</tr>

					<tr>
						<td>Company Name:</td>
						<td>{{ $customer->company }}</td>
					</tr>

					<tr>
						<td>Company Email:</td>
						<td>{{ $customer->email }}</td>
					</tr>

					<tr>
						<td>Contact Name:</td>
						<td>{{ $customer->lead->contact_name }}</td>
					</tr>

					<tr>
						<td>Contact Phone:</td>
						<td>{{ $customer->lead->contact_phone }}</td>
					</tr>

					<tr>
						<td>Contact Designation:</td>
						<td>{{ $customer->lead->contact_designation }}</td>
					</tr>

					<tr>
						<td>Assigned To:</td>
						<td>{{ $customer->lead->lead_assigned }}</td>
					</tr>

					<tr>
						<td>Company Address:</td>
						<td>{{ $customer->address_detail[0]['address'] }}</td>
					</tr>

					<tr>
						<td>City:</td>
						<td>{{ $customer->address_detail[0]['city'] }}</td>
					</tr>

					<tr>
						<td>State:</td>
						<td>{{ $customer->address_detail[0]['state'] }}</td>
					</tr>

					<tr>
						<td>Country:</td>
						<td>{{ $customer->address_detail[0]['country'] }}</td>
					</tr>

					<tr>
						<td>Company Website:</td>
						<td>{{ $customer->address_detail[0]['website'] }}</td>	
					</tr>
				</table>
			</div>


		</div>

		<div class="grid-padding-x grid-x align-right">
			<button id="{{$customer->id}}" class="button success make-customer">Make a Customer</button>
			
		</div>



		

		
	</section>






@endsection