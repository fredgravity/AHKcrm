@extends('layout.base.app')

@section('title', 'Leads Contact Edit Page')

@section('data-page-id', 'leads_contact_edit')

@section('content')


	<section id="leads_contact_edit">

		<h5 class="text-center">Edit Contact</h5>

	<form action="/profile/contact/edit" method="post" enctype="multipart/form-data">

		<div class="grid-x grid-padding-x">

			<div class="small-12 medium-2 cell"></div>

			<div class="small-12 medium-8 cell">
								
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-toolbox"></i></span>
					  <input class="input-group-field contact_name" id="middle-label" type="text" name="contact_name" value="{{$leads['contact_name']}}" placeholder="Contact Name" data-contact_name>
					</div>
			    </div>


			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-mobile-alt"></i></span>
					  <input class="input-group-field" id="middle-label" type="number" name="contact_phone" value="{{ $leads['contact_phone']}}" placeholder="Contact Phone Number">
					</div>
			
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <span class="input-group-label"><i class="fa fa-envelope"></i></span>
					  <input class="input-group-field" id="middle-label" type="email" name="contact_email" value="{{$leads['contact_email']}}" placeholder="Contact Email" readonly="readonly">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <input class="input-group-field" id="middle-label" type="text" name="contact_designation" value="{{ $leads['contact_designation'] }}" placeholder="Contact Designation">
					</div>
			    </div>

			    
			    <div class="small-9 cell contact-modal-field">
			       <div class="input-group">
					  <textarea class="input-group-field" name="lead_comment"  placeholder="Comment" rows="3">{{ $leads['lead_comment']}}</textarea>
					</div>
			    </div>

			    <div class="small-9 cell">
			       <div class="input-group">
					  <select class="input-group-field" name="lead_status" >
					  	<option>{{ $leads['lead_status'] }}</option>
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
			    <input type="hidden" name="id" value="{{$customers->id}}">
			    <input type="submit" class="button primary float-center" name="edit_contact_modal_btn" value="Edit Contact">

			</div>

			<div class="small-12 medium-2 cell"></div>
			
		</div>
		
		


	</form>

		
	</section>



@endsection