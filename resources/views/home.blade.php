@extends('layout.base.app')

@section('title', ' Home page')
@section('data-page-id', 'home')


@section('content')

	<!--  @include('includes.navTop') -->


	<section class= "home">
		
		<div class="grid-x grid-padding-x medium-up-3" data-equalizer data-equalize-on="medium">

			<div class="small-12 medium-4 cell summary" data-equalizer-watch>
 				<div class="card-section">
 					<div class="grid-padding-x grid-x">
                        <div class="small-3 cell">
                            <i class="fa fa-headset icons" aria-hidden="true"></i>
                        </div>
                        <div class="small-9 cell icon-text">
                            <h4 class="text-right home-card total-leads">0</h4>
                        </div>
                    </div>
				 </div>

				<div class="card" style="width: auto; height: 3rem; padding: 0;">
				  <div class="card-divider">
				    <h5>Total Leads</h5>
				  </div>
				</div>
			</div>

			<div class="small-12 medium-4 cell  summary" data-equalizer-watch>
 				<div class="card-section">
 					<div class="grid-padding-x grid-x">
                        <div class="small-3 cell">
                            <i class="fa fa-hand-holding-usd icons" aria-hidden="true"></i>
                        </div>
                        <div class="small-9 cell icon-text">
                            <h4 class="text-right home-card total-customers">0</h4>
                        </div>
                    </div>
				 </div>

				<div class="card" style="width: auto; height: 3rem; padding: 0;">
				  <div class="card-divider">
				    <h5>Total Customers</h5>
				  </div>
				</div>
			</div>

			<!-- <div class="small-12 medium-3 cell summary" data-equalizer-watch>
 				<div class="card-section">
 					<div class="grid-padding-x grid-x">
                        <div class="small-3 cell">
                            <i class="fa fa-coins icons" aria-hidden="true"></i>
                        </div>
                        <div class="small-9 cell icon-text">
                            <h4 class="text-right">30</h4>
                        </div>
                    </div>
				 </div>

				<div class="card" style="width: auto; height: 3rem; padding: 0;">
				  <div class="card-divider">
				    <h5>Total Expenses</h5>
				  </div>
				</div>
			</div> -->

			<div class="small-12 medium-4 cell summary" data-equalizer-watch>
 				<div class="card-section">
 					<div class="grid-padding-x grid-x">
                        <div class="small-3 cell">
                            <i class="fa fa-users icons" aria-hidden="true"></i>
                        </div>
                        <div class="small-9 cell icon-text">
                            <h4 class="text-right home-card total-contacts">0</h4>
                        </div>
                    </div>
				 </div>

				<div class="card" style="width: auto; height: 3rem; padding: 0;">
				  <div class="card-divider">
				    <h5>Total Contacts</h5>
				  </div>
				</div>
			</div>

			
			
		</div>
		
	</section>

	<section class="home-2">
		<div class="grid-x grid-padding-x">
			
			<div class="small-12 medium-4 cell">
				<h4>Recent Leads</h4><hr>
				@foreach($leads as $counter => $lead)

					<div class="grid-x grid-padding-x my-small">
						<div class="medium-4 cell my-small-date" >
							<h3>0{{$counter+1}}</h3>
						</div>
						<div class="medium-8 my-small-card">
							<p><b>{{$lead->company}}</b></p>
							<p>{{$lead->phone}}</p>
							<p>{{$lead->email}}</p>
						</div>
					</div>

				@endforeach
			</div>

			<div class="small-12 medium-4 cell">
				<h4>Recent Customers</h4><hr>
				@foreach($customers as $counter => $customer)

					<div class="grid-x grid-padding-x my-small">
						<div class="medium-4 cell my-small-date" >
							<h3>0{{$counter+1}}</h3>
						</div>
						<div class="medium-8 my-small-card">
							<p><b>{{$customer->company}}</b></p>
							<p>{{$customer->phone}}</p>
							<p>{{$customer->email}}</p>
						</div>
					</div>

				@endforeach

				

			</div>

			<div class="small-12 medium-4 cell">
				<h4>Recent Contacts</h4><hr>
				@foreach($contacts as $counter => $contact)

					<div class="grid-x grid-padding-x my-small">
						<div class="medium-4 cell my-small-date" >
							<h3>0{{$counter+1}}</h3>
						</div>
						<div class="medium-8 my-small-card">
							<p><b>{{$contact->contact_name}}</b></p>
							<p>{{$contact->customer->company}}</p>
							<p>{{$contact->contact_phone}}</p>
							<p>{{$contact->contact_email}}</p>
						</div>
					</div>

				@endforeach

			</div>

		</div>
	</section>



@endsection