<div class="reveal" id="call_modal" data-reveal data-overlay='false' data-animation-in='ease-in' >
	<h5 class="text-center modal-header-underline">Add Call</h5>

	<form action="/profile/add_call" method="post">

		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-2 cell"></div>

			<div class="small-12 medium-8 cell">
				
				
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
					  <input class="input-group-field" id="middle-label" type="date" name="call_date" value="" placeholder="Call Date">
					</div>
			    </div>


			    <div class="small-9 cell">
			       <div class="input-group">
					  <select class="input-group-field" name="call_lead" >
					  	@foreach($leads as $lead)
					  		<option value="{{$lead['id']}}">{{$lead['contact_name']}} | {{ $lead['contact_designation']}} | {{ $lead['contact_phone'] }} </option>	  	
					  	@endforeach
					  </select>
					</div>
			    </div>

					    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <textarea class="input-group-field" name="call_description"  placeholder="Call Description" rows="3"></textarea>
					</div>
			    </div>

			   

			    <input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}">
			    <input type="hidden" name="id" value="{{$customer->id}}">
			    <input type="submit" class="button primary float-center" name="edit_contact_modal_btn" value="Add Call">

			</div>

			<div class="small-12 medium-2 cell"></div>
			
		</div>
		
		


	</form>


	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden='true'>&times;</span>
	</button>
</div>