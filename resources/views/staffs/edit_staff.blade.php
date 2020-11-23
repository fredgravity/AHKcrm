@extends('layout.base.app')

@section('title', 'Staff Edit Page')

@section('data-page-id', 'staff_edit')

@section('content')


	<section id="leads_contact_edit">
		@include('includes.messages')

		<h5 class="text-center">Edit Staff</h5>

	<form action="/staff/update_staff" method="post" enctype="multipart/form-data">

		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-2 cell"></div>

			<div class="small-12 medium-8 cell">

				<div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-child"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="username" value="{{$staff['username']}}" placeholder="Username">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="fullname" value="{{$staff['fullname']}}" placeholder="Fullname">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
					  <input class="input-group-field" id="middle-label" type="email" name="email" value="{{$staff['email']}}" placeholder="Email Address" readonly="readonly">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="number" name="phone" value="{{$staff['phone']}}" placeholder="Phone Number">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-city"></i></span>
					  <input class="input-group-field" id="middle-label" type="city" name="city" value="{{$staff['city']}}" placeholder="City">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-map-marked-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="state" value="{{$staff['state']}}" placeholder="Region">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-handshake"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="designation" value="{{$staff['designation']}}" placeholder="Position">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-eye-slash"></i></span>
					  <input class="input-group-field" id="middle-label" type="password" name="password" value="" placeholder="Enter New Password">
					</div>
			    </div>


			    <div class="small-9 cell">
			       <div class="input-group">
					  <select class="input-group-field" name="role" >
					  	<option value="staff">Staff</option>
					  	<option value="admin">Admin</option>
					  	
					  </select>
					</div>
			    </div>

					    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <textarea class="input-group-field" name="address"  placeholder="Address" rows="3">{{$staff['address']}}</textarea>
					</div>
			    </div>

			</div>
		</div>

			   

			    <input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
			    <input type="hidden" name="id" value="{{$staff->id}}">
			    <input type="submit" class="button primary float-center" name="edit_staff" value="Edit Staff">
		
		


	</form>

		
	</section>



@endsection