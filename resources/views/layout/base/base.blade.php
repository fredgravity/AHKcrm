<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<title>{{APP_NAME}} @yield('title')</title>
		
		<!-- <link rel="stylesheet" href="/resources/assets/css/foundation.css" /> -->
		<!-- <link rel="stylesheet"  href="/public/fontawesome/css/all.min.css"/> -->
		<!-- <link rel="stylesheet"  href="/resources/assets/css/pages/global.css"/> -->
		<!-- <link rel="stylesheet"  href="/resources/assets/css/pages/nav.css"/> -->

		<link rel="stylesheet" type="text/css" href="/resources/assets/css/allcss.css">
	</head>

	<body data-page-id="@yield('data-page-id')">


			<div class="grid-container wrapper">
				@yield('body')
		
			</div>

		<script src="/resources/assets/js/mainhub.js" defer></script>
		<script src="/resources/assets/js/jquery.min.js"></script>
		<script src="/resources/assets/js/foundation.js" ></script>
		
		<!-- <script src="/resources/assets/js/propper.min.js"></script>
		<script src="/resources/assets/js/axios.min.js"></script>
 -->

<script type="text/javascript" defer>
	$(document).foundation();
</script>
	</body>

</html>