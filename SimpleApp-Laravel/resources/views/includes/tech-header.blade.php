<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

@guest

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">{{ config('app.name', 'Laravel') }}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
        @if (Route::has('login'))
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </li>
        @endif

    </ul>

@else
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">FAQ</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-warning navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                </h3>
                <p class="text-sm">Call me whenever you can

                </p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
              <div class="user-panel mt-0 pb-1 mb-1 ">
                  <img src="../../dist/img/user4.jpg"
                    alt="User Image"
                    style ="height: 40px; 
                    width: auto;
                    margin-top: -4.5px;">
              </div>
          </a>
          <div class="dropdown-menu ">
              <span 
                class="dropdown-item" 
                style ="text-align: center;  opacity: 0.6;">
                    {{ Auth::user()->name }}
              </span>
            <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                  <i class="fas fa fa-user mr-2"></i> My Profile
              </a>
              <a data-toggle="modal" title="Change Password" href="#edit-password" class="dropdown-item">
                  <i class="fas fa fa-lock mr-2"></i> Change Password
              </a>
            <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
              </form>
          </div>
      </li>  
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- /.start change password modal-->
  <div class="modal fade" id="edit-password">
          <div class="modal-dialog " >
            <div class="modal-content card-primary card-outline" >
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body ml-2 mr-2">
                <form class="form-horizontal row-fluid" name="asd" method="post" >
                <div class="row">
                  <div class="col-md">
                      <div class="form-group">
                      <label style="font-weight: normal;">Current Password</label>
                      <input type="text" class="form-control input" id="inputLocationName" value=" ">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                      <label style="font-weight: normal;">New Password</label>
                      <input type="text" class="form-control input" id="inputLocationName" value=" ">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                      <label style="font-weight: normal;">Confirm New Password</label>
                      <input type="text" class="form-control input" id="inputLocationName" value=" ">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Show password</label>
                      </div>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
            </div><!-- /.end modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button  name="submit" class="btn btn-primary" >Change Password</button>
            </div>
            </form>
        </div> <!-- /.end modal content-->
      </div> <!-- /.end modal dialog-->
    </div> <!-- /.end modal-->
    <!-- /.end edit modal-->  

@endguest