<h6>{{ $customer->company }}</h6>
<img src="" alt="company logo" style="width: 100%; height: 200px; background-color: gray;" >
<p>{{$customer->phone}}</p>
<p>{{$customer->email}}</p>

<hr>

<div class="details-profile">
	<ul>
		<li><a href="/leads/details?id={{$customer->id}}">Profile</a></li>
		<!-- <li><a href="#" data-open='contact_modal'>Contacts</a></li> -->
		<li><a href="/profile/contact?id={{$customer->id}}">Contacts</a></li>
		<li><a href="/profile/calls?id={{$customer->id}}">Calls</a></li>
		<li><a href="">Appointments</a></li>
		<li><a href="">Notes</a></li>
		<li><a href="">Proposals</a></li>
	</ul>
</div>