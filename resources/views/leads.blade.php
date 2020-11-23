@extends('layout.base.app')

@section('title', 'Leads Page')

@section('data-page-id', 'leads')

@section('content')

	<section class="leads">

		<div class="grid-x grid-padding-x cell">
			

			<div class="medium-6 cell">
		        <a href="/leads/add_new" class="button success"><i class="fa fa-plus"></i> Add New Lead</a>
		     </div>

		    <div class="medium-6 ">
		        <ul class="menu  cell align-right">
					<li><input type="search" placeholder="Search"></li>
		      		<li><button type="button" class="button">Search</button></li>
		         </ul>
		     </div>

		</div>

	<h5 class="text-center">Leads</h5>
	<div class="grid-x grid-padding-x" >
			
			<div class="small-12 medium-12">
				
			</div>

	</div>
				

		
	</section>









@endsection