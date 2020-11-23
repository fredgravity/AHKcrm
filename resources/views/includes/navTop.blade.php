
<div class="title-bar bar">
    <div class="title-bar-right">
        <button class="menu-icon hide-for-large float-left" type="button" data-toggle="offCanvas" ></button>
        
    </div>
    <div >
    	@if(isAuthenticated())
			<h6>{{ user()->username }}</h4>
    	@endif
    	
    </div>
</div>
