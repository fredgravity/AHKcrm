<div class="reveal" id="staff_modal" data-reveal data-overlay='false' data-animation-in='ease-in' >

	<h5 class="text-center modal-header-underline">Add Staff</h5>

	<form action="/staff/add_staff" method="post">

		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-2 cell"></div>

			<div class="small-12 medium-8 cell" style="overflow-y: auto; max-height: 700px;">
				
				
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-child"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="username" value="{{App\classes\Request::oldData('post', 'username')}}" placeholder="Username">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="fullname" value="{{App\classes\Request::oldData('post', 'fullname')}}" placeholder="Fullname">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
					  <input class="input-group-field" id="middle-label" type="email" name="email" value="{{App\classes\Request::oldData('post', 'email')}}" placeholder="Email Address">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="number" name="phone" value="{{App\classes\Request::oldData('post', 'phone')}}" placeholder="Phone Number">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-city"></i></span>
					  <input class="input-group-field" id="middle-label" type="city" name="city" value="{{App\classes\Request::oldData('post', 'city')}}" placeholder="City">
					</div>
			    </div>

			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-map-marked-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="state" value="{{App\classes\Request::oldData('post', 'state')}}" placeholder="Region">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-handshake"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="designation" value="{{App\classes\Request::oldData('post', 'designation')}}" placeholder="Position">
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
					  <textarea class="input-group-field" name="address"  placeholder="Address" rows="3">{{App\classes\Request::oldData('post', 'address')}}</textarea>
					</div>
			    </div>

			   

			    <input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
			    <input type="hidden" name="id" value="{{user()->id}}">
			    <input type="submit" class="button primary float-center" name="add_staff" value="Add Staff">

			</div>

			<div class="small-12 medium-2 cell"></div>
			
		</div>
		
		


	</form>


	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden='true'>&times;</span>
	</button>

</div>