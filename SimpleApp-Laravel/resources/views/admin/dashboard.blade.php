@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PAKAR CMMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- added PAKAR css -->
  <link rel="stylesheet" href="../../dist/css/PAKAR.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style=" margin-left: 7px;">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a style=" color: gray" href="/admin/dashboard">Home</a>
              </li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #ffffff;">
              <div class="inner" style="margin-left: 10px;">
                <h5>Technician</h5>
                <h2 style="font-size: 55px;">3 </h2> 
                    <h2 style="font-size: 17px; color: #A9A9A9;">
                      Total technicians
                    </h2>
              </div>
              <div class="icon" >
                <i class="ion ion-person mt-4" 
                  style="color: #4169E1; opacity: 0.5; margin-right: 12px;">
                </i>
              </div>
              <a href="/admin/manageUser" class="small-box-footer" 
                style="background-color: #4169E1;">
                More info 
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #ffffff;">
              <div class="inner" style="margin-left: 10px;">
                <h5>Asset</h5>
                <h2 style="font-size: 55px;">1007 </h2> 
                    <h2 style="font-size: 17px; color: #A9A9A9;">
                      Total assets
                    </h2>
              </div>
              <div class="icon" >
                <i class="ion ion-navicon-round mt-4" 
                  style="color: #FF8C00; opacity: 0.5; margin-right: 12px;">
                </i>
              </div>
              <a href="/admin/manageAsset" class="small-box-footer" 
                style="background-color: #FF8C00;">
                More info 
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #ffffff;">
              <div class="inner" style="margin-left: 10px;">
                <h5>Scheduled Work Order</h5>
                <h2 style="font-size: 55px;">44 </h2> 
                    <h2 style="font-size: 17px; color: #F08080;">
                      test1
                    </h2>
              </div>
              <div class="icon" >
                <i class="ion ion-clipboard mt-4" 
                  style="color: #228B22; opacity: 0.5; margin-right: 12px;">
                </i>
              </div>
              <a href="/admin/scheduledWO-all" class="small-box-footer" 
                style="background-color: #228B22;">
                More info 
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #ffffff;">
              <div class="inner" style="margin-left: 10px;">
                <h5>Unscheduled Work Order</h5>
                <h2 style="font-size: 55px;">2 </h2> 
                    <h2 style="font-size: 17px; color: #F08080;">
                      Pending tasks
                    </h2>
              </div>
              <div class="icon" >
                <i class="ion ion-document-text mt-4" 
                  style="color: #008B8B; opacity: 0.5; margin-right: 12px;">
                </i>
              </div>
              <a href="/admin/unscheduledWO" class="small-box-footer" 
                style="background-color: #008B8B;">
                More info 
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-lg-6">


          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Work Order Progress</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Overdue</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 5%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">5%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Delayed</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 10%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">10%</span></td>
                    </tr>
                    
                    <tr>
                      <td>3.</td>
                      <td>On Time</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">85%</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->

            <div class="card card-gray card-outline">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Activity Log</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Technician</th>
                      <th>Asset No</th>
                      <th>Description</th>
                      <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    <tr>
                      <td>Amin Aiman bin Ali</a></td>
                      <td>WF216003145A</td>
                      <td>test1</td>
                      <td>SCHULED WO </td>
                    </tr>
                    <tr>
                      <td>Amin Aiman bin Ali</a></td>
                      <td>WF216003145A</td>
                      <td>test1</td>
                      <td>SCHULED WO </td>
                    </tr>
                    <tr>
                      <td>Amin Aiman bin Ali</a></td>
                      <td>WF216003145A</td>
                      <td>test1</td>
                      <td>SCHULED WO </td>
                    </tr>
                    <tr>
                      <td>Amin Aiman bin Ali</a></td>
                      <td>WF216003145A</td>
                      <td>test1</td>
                      <td>SCHULED WO </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Activities</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
           
            <!-- /.card -->
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Scheduled Work Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i> Pending</li>
                      <li><i class="far fa-circle text-success"></i> Success</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Unscheduled Work Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i> Pending</li>
                      <li><i class="far fa-circle text-success"></i> Success</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

</body>
</html>

@endsection