

	<div class="grid-x grid-padding-x">
		<!-- company -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Source</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <select class="input-group-field" name="lead_source" >
			  	
			    <option value="fb">Facebook</option>
			    <option value="twit">Twitter</option>
			    <option value="ig">Instagram</option>
			    <option value="li">LinkedIn</option>
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
			  	<option disabled=true>{{$customer['lead']['lead_assigned']}}</option>
			    <option value="one">Staff One</option>
			    <option value="two">Staff Two</option>
			    <option value="three">Staff Three</option>
			  </select>
			</div>
	    </div>


	    <!-- email -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Comment*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <textarea class="input-group-field" name="lead_comment"  placeholder="Comment">{{$customer['lead']['lead_comment']}}</textarea>
			</div>
	    </div>

	    <!-- address -->
	   <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Status</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <select class="input-group-field" name="lead_status" >
			  	<option>{{$customer['lead']['lead_status']}}</option>
			    <option value="new">New</option>
			    <option value="working">Working</option>
			    
			  </select>
			</div>
	    </div>

				

