
@extends('layout.base.base')


@section('body')
	
	<!-- add my navigation bar for all -->
        <!--nav top-->

    @include('includes.sideBar')

     <div class="off-canvas-content" data-off-canvas-content>   
            @include('includes.navTop')

           <!-- display content here -->
    	       @yield('content')

	</div>

@endsection