<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li class="{{ \Request::route()->getName() == 'dashboard'? 'active' : ''}}" ><a href="{{ route('dashboard') }}"><em class="fas fa-tachometer-alt">&nbsp;</em> Dashboard</a></li>
        <li class="{{ \Request::route()->getName() == 'posts'? 'active' : ''}}" ><a href="{{ route('posts') }}"><em class="fas fa-map-pin">&nbsp;</em> Posts</a></li>
        <li class="{{ \Request::route()->getName() == 'aboutme'? 'active' : ''}}"><a href="{{ route('aboutme') }}"><em class="fas fa-user">&nbsp;</em> About Me</a></li>
        <li class="{{ \Request::route()->getName() == 'category'? 'active' : ''}}"><a href="{{ route('category') }}"><em class="fas fa-project-diagram">&nbsp;</em> Category</a></li>
        <li class="{{ \Request::route()->getName() == 'media'? 'active' : ''}}"><a href="{{ route('media') }}"><em class="fas fa-desktop">&nbsp;</em> Media</a></li>
        <li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->