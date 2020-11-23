@extends('layout.base.app')

@section('title', ' Staff page')
@section('data-page-id', 'staff')


@section('content')

	<section id="staff">
		@include('includes.messages')

		<h5 class="text-center">Manage all Staff</h5>
		<div><a href="#" class="button primary" data-open='staff_modal'><i class="fa fa-plus"></i> Add Stuff</a></div>

		
		<div class="grid-x grid-padding-x" style="overflow-y: auto; max-height: 600px;">
			
			@foreach($staffs as $counter => $staff)
			
				<table>
					<tr>
						<td>#{{$counter+1}}</td>
						<td>{{$staff->username}}</td>
						<td>{{$staff->fullname}}</td>
						<td>0{{$staff->phone}}</td>
						<td>{{$staff->address}}</td>
						<td>{{$staff->city}}</td>
						<td>{{$staff->member_id}}</td>
						<td>{{$staff->role}}</td>
						<td>{{$staff->designation}}</td>
						<td style="width: 120px;">
							<a href="/staff/edit?id={{$staff->id}}" class="button tiny warning">Edit</a>

							<button class="button tiny alert delete" id="{{$staff->id}}">Delete</button>

							<input type="hidden" name="token" value="{{App\classes\CSRFToken::generate()}}" class="delete-staff">
						</td>
					</tr>
				</table>

		@endforeach
		

		</div>
		
	</section>

@include('forms.staff_modal')

@endsection