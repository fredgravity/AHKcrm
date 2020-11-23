

	<div class="grid-x grid-padding-x">
		<!-- company -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Source</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <select class="input-group-field" name="lead_source" >
			  	<!-- <option disabled="">Select a Source</option> -->
			    <option value="Facebook">Facebook</option>
			    <option value="Twitter">Twitter</option>
			    <option value="Instagram">Instagram</option>
			    <option value="LinkedIn">LinkedIn</option>
			  </select>
			</div>
	    </div>

	    <!-- phone -->
		<div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Assined To*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <select class="input-group-field" name="lead_assigned" >
			  	<!-- <option disabled=true>Select a Staff member</option> -->
			    <option value="staff_one">Staff One</option>
			    <option value="staff_two">Staff Two</option>
			    <option value="staff_three">Staff Three</option>
			  </select>
			</div>
	    </div>


	    <!-- email -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Comment*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <textarea class="input-group-field" name="lead_comment"  placeholder="Comment">{{ App\classes\Request::oldData('post', 'lead_comment')}}</textarea>
			</div>
	    </div>

	    <!-- address -->
	   <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Status</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <select class="input-group-field" name="lead_status" >
			  	<option>New</option>
			    <option value="new">New</option>
			    <option value="working">Working</option>
			    
			  </select>
			</div>
	    </div>

				

