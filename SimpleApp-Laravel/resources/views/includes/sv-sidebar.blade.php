<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/supervisor/dashboard" class="brand-link">
      <img src="../../dist/img/pakar4.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-5" style="opacity: 2.0">
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
            <a href="/supervisor/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">MANAGEMENT</li>

          <li class="nav-item">
            <a href="/supervisor/manageAsset" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                 Assets
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/supervisor/logTechnician" class="nav-link">
              <i class="nav-icon fas fa-regular fa-clipboard"></i>   
              <p>
                 Log Technician
              </p>
            </a>
          </li>

          <li class="nav-header">WORK ORDER</li>

          <li class="nav-item">
            <a href="/supervisor/calendar" class="nav-link ">
              <i class="nav-icon fas fa-regular fa-calendar"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/supervisor/scheduledWO" class="nav-link">
              <i class="nav-icon fas fa-regular fa-calendar-check"></i>
              <p>
                Scheduled
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/supervisor/unscheduledWO" class="nav-link">
              <i class="nav-icon fas fa-regular fa-calendar"></i>
              <p>
                Unscheduled
              </p>
            </a>
          </li>

          <li class="nav-header">REPORT</li>

          <li class="nav-item">
            <a href="/supervisor/reportScheduled" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Scheduled
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/supervisor/reportUnscheduled" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Unscheduled
              </p>
            </a>
          </li>

          <li class="nav-header">ASSIGN</li>

          <li class="nav-item">
            <a href="/supervisor/listUser" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user-check"></i>
              <p>
                Assign
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
