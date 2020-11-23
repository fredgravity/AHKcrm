

	<div class="grid-x grid-padding-x cell">
		<!-- company -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Company*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
			  <input class="input-group-field" id="middle-label" type="text" name="company"
			   value="{{$customer['company']}}" readonly="readonly">
			</div>
	    </div>

	    <!-- phone -->
		<div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Phone*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
			  <input class="input-group-field" id="middle-label" type="number" name="phone" value="{{$customer['phone']}}">
			</div>
	    </div>


	    <!-- email -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Email*</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
			  <input class="input-group-field" id="middle-label" type="email" name="email" value="{{$customer['email']}}" readonly="readonly">
			</div>
	    </div>

	    <!-- address -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Address</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-map-signs"></i></span>
			  <textarea class="input-group-field" name="address"  placeholder="None">{{ $customer['address_detail'][0]['address'] }}</textarea>
			</div>
	    </div>


	    <!-- city -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">City</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-city"></i></span>
			  <input class="input-group-field" id="middle-label" type="text" name="city" value="{{ $customer['address_detail'][0]['city'] }}">
			</div>
	    </div>


	    <!-- state -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">State</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-map-marked-alt"></i></span>
			  <input class="input-group-field" id="middle-label" type="text" name="state" value="{{ $customer['address_detail'][0]['state'] }}">
			</div>
	    </div>

	    <!-- website -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Website</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fab fa-internet-explorer"></i></span>
			  <input class="input-group-field" id="middle-label" type="text" name="website" value="{{ $customer['address_detail'][0]['website'] }}">
			</div>
	    </div>

	    <!-- country -->
	    <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Country</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-globe-africa"></i></span>
			  <select class="input-group-field" name="country" >
			  	<option>{{ $customer['address_detail'][0]['country'] }}</option>
			    <option value="gh">Ghana</option>
			    <option value="ng">Nigeria</option>
			    <option value="ka">Kenya</option>
			    <option value="sa">South Africa</option>
			  </select>
			</div>
	    </div>


	    <!-- logo -->
	   <!--  <div class="small-3 cell">
	      <label for="middle-label" class="text-left middle">Logo</label>
	    </div>

	    <div class="small-9 cell">
	       <div class="input-group">
			  <span class="input-group-label"><i class="fa fa-image"></i></span>
			  <input type="file" class="input-group-field" id="middle-label" class="show-for-sr" name="company_logo">
			</div>
	    </div> -->


	 </div>

				

