@extends('layout.base.app')

@section('title', 'Leads Call Page')

@section('data-page-id', 'leads_calls')

@section('content')

	<section id="leads_calls">

		

		@include('includes.messages')
		<div class="grid-x grid-padding-x ">
			
			<div class="small-12 medium-3 cell">
				@include('includes.leads_side_profile')
				
			</div>

			<div class="small-12 medium-9 cell">
				<div class="grid-x grid-padding-x">
					@if($customer->leads == 0)
						<div class="small-12 medium-6"><h4>Customer Call Logs</h4></div>
					@else
						<div class="small-12 medium-6"><h4>Leads Call Logs</h4></div>
					@endif
					
					<div class="small-12 medium-6">
						<a href="#" class="button primary float-right" data-open='call_modal'><i class="fa fa-plus"></i> New Call</a>
					</div>
				</div>

				<div class="grid-x grid-padding-x">
					

					<div class="cell" style="overflow-y: auto; max-height: 600px;">
					@if(!count($callLogs))
						<h5>No call records</h5>
					@else

						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Contact Name</th>
									<th>Called By</th>
									<th>Call Description</th>
								</tr>

							</thead>
							<tbody>
								@foreach($callLogs as $callLog)
								
									<tr>
										<td>{{ date('d-m-Y', strtotime($callLog->call_date)) }}</td>
										<td>{{ $callLog->lead->contact_name }}</td>
										<td>{{ $callLog->user['username']}}</td>
										<td>
											<textarea cols="20" rows="3">{{ $callLog->description }}</textarea>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
											
					</div>
					
					
				</div>
								
				</div>

			</div>


			</div>

		</div>
@include('forms.call_modal', ['leads'=>$leads])
		
	</section>



@endsection