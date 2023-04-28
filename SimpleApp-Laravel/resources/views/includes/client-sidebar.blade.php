<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/client/dashboard" class="brand-link">
      <img src="../../dist/img/pakar4.png" alt="profile pic" class="brand-image" >

      <span class="brand-text font-weight-bold">PAKAR CMMS </span>
    </a>
   

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
         

          <li class="nav-item">
            <a href="../../pages/client/manageAsset.php" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Assets
              </p>
            </a>
          </li>
        
          <li class="nav-header">WORK ORDER</li>
         
          <li class="nav-item">
            <a href="../../pages/client/scheduledWO-all.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>Scheduled</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../../pages/client/unscheduledWO.php" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Uncheduled</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../../pages/client/logActivity.php" class="nav-link">
              <i class="nav-icon fas fa-regular fa-list-ol"></i>
              <p>
                Activity Log
              </p>
            </a>
          </li>

          <li class="nav-header"> </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p> Log Out </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
