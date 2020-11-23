<div class="reveal" id="edit_contact_modal" data-reveal data-overlay='false' data-animation-in='ease-in' >
	<h5 class="text-center modal-header-underline">Edit Contact</h5>

	<form action="/leads/contact/edit" method="post" enctype="multipart/form-data">

		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-2 cell"></div>

			<div class="small-12 medium-8 cell">
				
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
					  <input class="input-group-field contact_name" id="middle-label" type="text" name="contact_name" value="{{$customer->lead['contact_name']}}" placeholder="Contact Name" data-contact_name>
					</div>
			    </div>


			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="number" name="contact_phone" value="{{ $customer->lead['contact_phone']}}" placeholder="Contact Phone Number">
					</div>
			
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
					  <input class="input-group-field" id="middle-label" type="email" name="contact_email" value="{{$customer->lead['contact_email']}}" placeholder="Contact Email" readonly="readonly">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <input class="input-group-field" id="middle-label" type="text" name="contact_designation" value="{{ $customer->lead['contact_designation'] }}" placeholder="Contact Designation">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <textarea class="input-group-field" name="lead_comment"  placeholder="Comment" rows="3">{{ $customer->lead['lead_comment']}}</textarea>
					</div>
			    </div>

			    <div class="small-9 cell">
			       <div class="input-group">
					  <select class="input-group-field" name="lead_status" >
					  	<option>{{ $customer->lead['lead_status'] }}</option>
					    <option value="new">New</option>
					    <option value="working">Working</option>
					    
					  </select>
					</div>
			    </div>

			    <div class="small-9 cell">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-image"></i></span>
					  <input type="file" class="input-group-field" id="middle-label" class="show-for-sr" name="edit_leads_card">
					</div>
			    </div>

			    <input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
			    <input type="hidden" name="id" value="{{$customer->id}}">
			    <input type="submit" class="button primary float-center" name="edit_contact_modal_btn" value="Edit Contact">

			</div>

			<div class="small-12 medium-2 cell"></div>
			
		</div>
		
		


	</form>


	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden='true'>&times;</span>
	</button>
</div>