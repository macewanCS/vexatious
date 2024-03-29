<!doctype html>
<html lang="en">
<head>
{{ HTML::style('css/header.css') }}
@yield('headerScript')
</head>

<body>
<div id="Image"><img src="http://www.epl.ca/sites/all/themes/epl/img/EPL_logo2.png" border="0" style="width:400px;"></div>
<div class="navMenu">
<ul>
<li @yield('overviewli')>
    {{ HTML::linkRoute('bookings.index','Overview') }} </li>
<li @yield('bookkitli')> 
    {{ HTML::linkRoute('bookings.create', 'Booking') }} </li>
<li @yield('shippingli')> 
    {{ HTML::linkRoute('shipping', 'Shipping') }} </li>
<li @yield('receivingli')> 
    {{ HTML::linkRoute('receiving', 'Receiving') }} </li>
<li @yield('browsekitsli')> 
    {{ HTML::linkRoute('kits.index', 'Browse Kits') }} </li>
<li @yield('browsehardwareli')> 
    {{ HTML::linkRoute('hardware.index', 'Browse Assets') }} </li>
@if(Auth::user()->role == 1)
<li @yield('editusersli')> 
    {{ HTML::linkRoute('users.index', 'Edit Users') }} </li>
@endif
<li id="logout"> {{ HTML::linkRoute('logout', 'Logout') }} </li>
	
</ul>
</div>
@yield('content')
</body>
</html>
