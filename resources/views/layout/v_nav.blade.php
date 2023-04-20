<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
<li class="header">MAIN NAVIGATION</li>


@if (auth()->user()->level==1)
<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<li class="{{ request()->is('room') ? 'active' : '' }}"><a href="/room"><i class="fa fa-bars"></i> <span>List Room</span></a></li>  
<li class="{{ request()->is('user') ? 'active' : '' }}"><a href="/user"><i class="fa fa-users"></i> <span>User</span></a></li>
<li class="{{ request()->is('bookinglist') ? 'active' : '' }}"><a href="/bookinglist"><i class="fa fa-calendar"></i> <span>Booking List</span></a></li>             
        
<li class="{{ request()->is('changepassword') ? 'active' : '' }}"><a href="/changepassword"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>


@elseif (auth()->user()->level==2)
<li class="{{ request()->is('/dashboarduser') ? 'active' : '' }}"><a href="/dashboarduser"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<li class="{{ request()->is('userroom') ? 'active' : '' }}"><a href="/userroom"><i class="fa fa-bars"></i> <span>List Room</span></a></li>
<li class="{{ request()->is('bookingroom') ? 'active' : '' }}"><a href="/bookingroom"><i class="fa fa-calendar"></i> <span>Booking Room</span></a></li>              
<li class="{{ request()->is('changepassworduser') ? 'active' : '' }}"><a href="/changepassworduser"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>              
@endif

</ul>