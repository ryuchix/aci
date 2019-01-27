<div class="sidebar-wrapper">
	<ul class="nav">
  		<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
    		<a class="nav-link" href="{{ url('dashboard') }}">
	      		<i class="material-icons">dashboard</i>
	      		<p>Dashboard</p>
    		</a>
  		</li>
  		<li class="nav-item {{ request()->is('dashboard/departments*') ? 'active' : '' }}">
    		<a class="nav-link" href="{{ url('dashboard/departments') }}">
	      		<i class="material-icons">domain</i>
	      		<p>Department</p>
    		</a>
  		</li>
      <li class="nav-item {{ request()->is('dashboard/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard/users') }}">
            <i class="material-icons">person</i>
            <p>Users</p>
        </a>
      </li>
      <li class="nav-item {{ request()->is('dashboard/reports*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard/reports') }}">
            <i class="material-icons">note</i>
            <p>Reports</p>
        </a>
      </li>
	</ul>
</div>