  @php
    $notifications = \App\Notification::orderBy('created_at', 'desc')->get();
  @endphp
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{ config('app.url', 'http://amalgatedcapital.com/newaci') }}">@yield('pagename')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              @if(auth()->user()->role == "Admin")
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  @if(count($notifications) != 0)
                    <span class="notification notif-count">{{ count($notifications) == 0 ? "" : count($notifications) }}</span>
                  @endif

                  <p class="d-lg-none d-md-block">
                    Notifications
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <div class="notif">
                    @if(count($notifications) != 0)
                    @foreach ($notifications as $notification)
                      <a class="dropdown-item show-report" data-id="{{ $notification->id }}" href="{{ url('dashboard/reports/').'/'.$notification->report_id }}" style="{{ $notification->read == true ? "color: #ccc" : "" }}">
                        <small style="margin-right: 10px;">{{ \Carbon\Carbon::parse($notification->created_at)->format('M d') }} </small> {{ $notification->message }}</a>
                    @endforeach
                    @else
                    <p style="text-align: center; margin: 10px" data-empty="1">No notification</p>
                    @endif
                  </div>
                  <hr>
                  <div style="text-align: center; margin-top: -10px;"><button class="btn btn-primary clear-notification" style="background-color: #ef8706 !important">Clear</button></div>
                </div>
              </li>
              @endif
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                      Logout
                  </a>    
                  <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>