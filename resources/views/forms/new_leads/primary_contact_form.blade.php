
	<div class="grid-x grid-padding-x">
		<!-- company -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Name*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
			  <input class="input-group-field" id="middle-label" type="text" name="contact_name" value="{{App\classes\Request::oldData('post', 'contact_name')}}">
			</div>
	    </div>

	    <!-- phone -->
		<div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Phone*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
			  <input class="input-group-field" id="middle-label" type="number" name="contact_phone" value="{{App\classes\Request::oldData('post', 'contact_phone')}}">
			</div>
	    </div>


	    <!-- email -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Email*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
			  <input class="input-group-field" id="middle-label" type="email" name="contact_email" value="{{App\classes\Request::oldData('post', 'contact_email')}}">
			</div>
	    </div>

	    <!-- address -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Designation</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <input class="input-group-field" id="middle-label" type="text" name="contact_designation" value="{{App\classes\Request::oldData('post', 'contact_designation')}}">
			</div>
	    </div>


		<div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Business Card</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-image"></i></span>
			  <input type="file" class="input-group-field" id="middle-label" class="show-for-sr" name="leads_card">
			</div>
	    </div>

