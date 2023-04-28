<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">FAQ</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">

        <!-- closechat functino so that the chat box will close -->
        <a class="nav-link" onclick="closeChat(); closeChat2()"  data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-warning navbar-badge">3</span>
        </a>

        <!-- Chat -->
        <link rel="stylesheet" href="../../pages/admin/chat/chat.css">
        <script src="../../pages/admin/chat/chat.js"></script>

        
       
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
                    ADMIN
              </span>
            <div class="dropdown-divider"></div>
              <a href="../../pages/admin/profile.php" class="dropdown-item">
                  <i class="fas fa fa-user mr-2"></i> My Profile
              </a>
              <a data-toggle="modal" title="Change Password" href="#edit-password" class="dropdown-item">
                  <i class="fas fa fa-lock mr-2"></i> Change Password
              </a>
            <div class="dropdown-divider"></div>
              <a href="../../pages/auth/login.php" class="dropdown-item">
                  <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </a>
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

  

      


      