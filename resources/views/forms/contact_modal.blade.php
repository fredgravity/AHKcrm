<div class="reveal" id="contact_modal" data-reveal data-overlay='false' data-animation-in='ease-in' >
	<h5 class="text-center modal-header-underline">Add New Lead Contact</h5>

	<form action="/profile/add_contact" method="post" enctype="multipart/form-data">

		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-2 cell"></div>

			<div class="small-12 medium-8 cell">
				
				
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
					  <input class="input-group-field" id="middle-label" type="text" name="contact_name" value="{{ App\classes\Request::oldData('post', 'contact_name')}}" placeholder="Contact Name">
					</div>
			    </div>


			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="number" name="contact_phone" value="{{ App\classes\Request::oldData('post', 'contact_phone')}}" placeholder="Contact Phone Number">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
					  <input class="input-group-field" id="middle-label" type="email" name="contact_email" value="{{ App\classes\Request::oldData('post', 'contact_email')}}" placeholder="Contact Email">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <input class="input-group-field" id="middle-label" type="text" name="contact_designation" value="{{ App\classes\Request::oldData('post', 'contact_designation')}}" placeholder="Contact Designation">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <textarea class="input-group-field" name="lead_comment"  placeholder="Comment" rows="3">{{ App\classes\Request::oldData('post', 'lead_comment')}}</textarea>
					</div>
			    </div>

				<div class="small-9 cell">
			    	<div class="input-group">
					  <select class="input-group-field" name="lead_source" >
					  	<option disabled="true">Select a Source</option>
					    <option value="Facebook">Facebook</option>
					    <option value="Twitter">Twitter</option>
					    <option value="Instagram">Instagram</option>
					    <option value="LinkedIn">LinkedIn</option>
					  </select>
					</div>
			    </div>

			   

			    <div class="small-9 cell">
			       <div class="input-group">
					  <select class="input-group-field" name="lead_assigned" >
					  	<option disabled=true>Select a team member</option>
					    <option value="staff_one">Staff One</option>
					    <option value="staff_two">Staff Two</option>
					    <option value="staff_three">Staff Three</option>
					  </select>
					</div>
			    </div>

			    <div class="small-9 cell">
			       <div class="input-group">
					  <select class="input-group-field" name="lead_status" >
					  	<option disabled="true">Select status of lead</option>
					    <option value="new">New</option>
					    <option value="working">Working</option>
					    <option value="customer">Customer</option>
					    
					  </select>
					</div>
			    </div>

			    <div class="small-9 cell">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-image"></i></span>
					  <input type="file" class="input-group-field" id="middle-label" class="show-for-sr" name="leads_card">
					</div>
			    </div>

			    <input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
			    <input type="hidden" name="id" value="{{$customer->id}}">
			    <input type="submit" class="button primary float-center" name="contact_modal_btn" value="Add New Contact">

			</div>

			<div class="small-12 medium-2 cell"></div>
			
		</div>
		
		


	</form>


	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden='true'>&times;</span>
	</button>
</div>