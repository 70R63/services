
<div class="dropdown main-profile-menu">
	<a class="d-flex" href="">
		<span class="main-img-user" ><img alt="avatar" src="{{  url('public/img/users/1.jpg')}}"></span>
	</a>
	<div class="dropdown-menu">
		<div class="header-navheading">
			<h6 class="main-notification-title">Sonia Taylor</h6>
			<p class="main-notification-text">Web Designer</p>
		</div>
		<a class="dropdown-item border-top" href="profile.html">
			<i class="fe fe-user"></i> My Profile
		</a>
		<a class="dropdown-item" href="profile.html">
			<i class="fe fe-edit"></i> Edit Profile
		</a>
		<a class="dropdown-item" href="profile.html">
			<i class="fe fe-settings"></i> Account Settings
		</a>
		<a class="dropdown-item" href="profile.html">
			<i class="fe fe-settings"></i> Support
		</a>
		<a class="dropdown-item" href="profile.html">
			<i class="fe fe-compass"></i> Activity
		</a>
		<a class="dropdown-item" href="{{ route('dev.logout') }}" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
			<i class="fe fe-power"></i> Cerrar sesión
		</a>
		<form id="submit-form" action="{{ route('dev.logout') }}" method="POST" class="hidden">
    		@csrf
    		@method('POST')
	</div>
</div>




