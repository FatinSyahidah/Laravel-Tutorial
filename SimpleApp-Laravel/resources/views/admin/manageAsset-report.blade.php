@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PAKAR CMMS </title>

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @if(session()->has('success'))
      <script>
          alert("{{ session()->get('success') }}");
      </script>
  @endif


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="page-title">Asset Management </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a class="page-location" href="/admin/dashboard">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a class="page-location" href="/admin/manageAsset">Assets</a>
              </li>            
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <!-- /.1st tab -->
        <div class="card card-success card-outline">
              <div class="table-top" >
                <h2 class="table-title">Asset report</h2>
                <a href="" data-target="#edit-asset" data-toggle="modal" title="Edit Asset" type="button" class="open-qq btn btn-success shadow-sm p-8 mr-4 rounded asset"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit </a>
              </div>
              <hr>
          <!-- /.card-header -->

          <div class="card-body" >
            <div class="card-body" >
              <div class="row">
                <div class="col-6 text-center">
                <img src="../../dist/img/spanner.png" width="150px" class="img-fluid">      

                </div>
                <div class="col-6 ">

                 @if(is_object($asset))

                    @if($asset->createby == 1)
                      <h6><b>Created By </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : Admin</h6>

                    @elseif($asset->createby == 2)
                      <h6><b>Created By </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : Technician</h6>

                    @elseif($asset->createby == 3)
                      <h6><b>Created By </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : Supervisor</h6>

                    @else
                      <h6><b>Created By </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Unknown {{ $asset->createby }}</h6>
                    @endif

                  <h6><b>Asset Created  </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $asset->createdate }}</h6>
                  
                  <h6><b>Last Maintenance </b> &nbsp; &nbsp; : {{ $asset->updateasset }}</h6>

                    @if($asset->branch_id == 1)
                      <h6><b>Branch </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Hospital Tunku Azizah (HTA)</h6>

                    @elseif($asset->branch_id == 2)
                      <h6><b>Branch </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Hospital Rawang</h6>
                      
                    @else
                      <h6><b>Branch </b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: No data </h6>
                    @endif

                  @else
                  <h6><b> Invalid Asset ID</b></h6>

                  @endif
                </div>
                </div>
              </div>

            <hr>
              
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
            <li class="nav-item" style="display: flex; justify-content: center;">
                <a class="nav-link asset active" style=" width: 195px;" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">
                <i class="fas fa-info-circle " style=" font-size: 1.2em; "></i>
                &nbsp; Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link asset" style=" width: 195px;" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">
                <i class="fas fa-regular fa-calendar-check icon-table float-left" style=" font-size: 1.2em; "></i>
                &nbsp; Scheduled</a>
            </li>
            <li class="nav-item">
                <a class="nav-link asset" style=" width: 195px;" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">
                <i class="fas fa-regular fa-calendar icon-table float-left" style=" font-size: 1.2em; "></i>
                &nbsp; Unscheduled</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link asset" style=" width: 195px;" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">
                <i class="fas fa-wrench icon-table float-left" style="font-size: 1.2em; "></i>
                &nbsp; Sparepart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link asset" style=" width: 195px;" id="custom-tabs-one-vendor-tab" data-toggle="pill" href="#custom-tabs-one-vendor" role="tab" aria-controls="custom-tabs-one-vendor" aria-selected="false">
                <i class="fas fa-store icon-table float-left" style=" font-size: 1.2em; "></i>
                &nbsp; Vendor</a>
            </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                
            <!-- Details tab -->
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              
                <form>
                  <div class="card-body">
                    @if($asset)
                      <div class="row">
                      <div class="col-6 col-sm-6">  
                        <!-- start table -->
                        <table class="table table-bordered">
                          
                            <tr>
                              <th>Asset No</th>
                              <td>{{ $asset->asset_no }}</td>
                            </tr>
                        
                            <tr>
                              <th>Asset Class</th>
                              <td>{{ $asset->asset_class }}</td>
                            </tr>
                            <tr>
                              <th>Type Name</th>
                              <td>{{ $asset->type_name}}</td>
                            </tr>
                        
                            <tr>
                              <th>Frequency</th>
                              <td>{{ $asset->frequency }}</td>
                            </tr>
                          
                            <tr>
                              <th>Item Code</th>
                              <td>{{ $asset->type_code }}</td>
                            </tr>
                          
                            <tr>
                              <th>Category</th>
                              <td>{{ $asset->category }}</td>
                            </tr>

                            <tr>
                              <th>Serial No</th>
                              <td>{{ $asset->serial_no }}</td>
                            </tr>
                          
                            <tr>
                              <th>Department</th>
                              <td>{{ $asset->dept }}</td>
                            </tr>
                          
                            <tr>
                              <th>Area Code</th>
                              <td>{{ $asset->area_code }}</td>
                            </tr>
                          
                            <tr>
                              <th>Location Code</th>
                              <td>{{ $asset->location_code }}</td>
                            </tr>
                          
                            <tr>
                              <th>Remark</th>
                              <td>{{ $asset->remark }}</td>
                            </tr>
                          
                            <tr>
                              <th>Work Group</th>
                              <td>{{ $asset->work_group }}</td>
                            </tr>
                          
                            <tr>
                              <th>Package </th>
                              <td>{{ $asset->package }}</td>
                            </tr>
                          
                        </table>
                      <!-- /.end first col -->
                      </div>

                      <!-- /.start sec col -->
                      <div class="col-6 col-sm-6">
                        <table class="table table-bordered">
                          
                          <tr>
                            <th>Service</th>
                            <td>{{ $asset->service }}</td>
                          </tr>
                      
                          <tr>
                            <th>Type Code</th>
                            <td>{{ $asset->type_code }}</td>
                          </tr>

                          <tr>
                            <th>Task Code</th>
                            <td>{{ $asset->task_code }}</td>
                          </tr>
                      
                          <tr>
                            <th>Description</th>
                            <td>{{ $asset->desc }}</td>
                          </tr>
                        
                          <tr>
                            <th>Item Name</th>
                            <td>{{ $asset->type_name }}</td>
                          </tr>
                        
                          <tr>
                            <th>Model</th>
                            <td>{{ $asset->model }}</td>
                          </tr>

                          <tr>
                            <th>Manufaturer</th>
                            <td>{{ $asset->manufacturer }}</td>
                          </tr>
                        
                          <tr>
                            <th>Department Name</th>
                            <td>{{ $asset->depart_name }}</td>
                          </tr>
                        
                          <tr>
                            <th>Area Name</th>
                            <td>{{ $asset->area_name }}</td>
                          </tr>
                        
                          <tr>
                            <th>Location Name</th>
                            <td>{{ $asset->location_name }}</td>
                          </tr>
                        
                          <tr>
                            <th>Purchase Cost</th>
                            <td>RM {{ $asset->purc_cost }}</td>
                          </tr>
                        
                          <tr>
                            <th>Group</th>
                            <td>{{ $asset->group }}</td>
                          </tr>
                        
                          <tr>
                            <th>Package Description</th>
                            <td>{{ $asset->package_desc }}</td>
                          </tr>
                        
                      </table>                       
                    </div>
                      </div>
                      <!-- /.row -->
                    @else
                      <p> No data available </p>
                    @endif
                    </div>
                    <!-- /.card-body -->

                </form>
            
              </div>
              <!-- end Details tab -->

            <!-- start Schedule tab -->
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              
                <form>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-left">
                                <th>#</th>
                                <th>Main Work</th>
                                <th>Technician</th>
                                <th>Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                            </tbody>    
                        </table>

                        </div>
                        <!-- /.col -->
                        
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
        
                    <!-- /.card-body -->

                  </form>
            
              </div>
              <!-- end Schedule tab -->

            <!-- start Unschedule tab -->
            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
              
            <form>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="example12" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-left">
                                <th>#</th>
                                <th>Main Work</th>
                                <th>Technician</th>
                                <th>Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                            </tbody>    
                        </table>

                        </div>
                        <!-- /.col -->
                        
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
        
                    <!-- /.card-body -->

                  </form>
            
            </div>
            <!-- end Unschedule tab -->

             <!-- start Sparepart tab -->
             <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                <br/>
                <p style="color:black; font-weight:normal">Below is a list of Spare Parts associated with this Asset so your team can easily know what Parts to use on this Asset. Part associations are built automatically as Parts are used on Tasks or you can manually associate them below.</p>
          
            </div>
            <!-- end Schedule tab -->

            <!-- start Vendor tab -->
            <div class="tab-pane fade" id="custom-tabs-one-vendor" role="tabpanel" aria-labelledby="custom-tabs-one-vendor-tab">
                <br/>
                <form>
                  <div class="card-body">
                    <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="example13" class="table table-bordered table-hover">
                          <thead>
                              <tr class="text-left">
                              <th>#</th>
                              <th>Main Work</th>
                              <th>Technician</th>
                              <th>Date</th>
                              <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              </tr>
                          </tbody>    
                      </table>

                      </div>
                      <!-- /.col -->
                      
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
              <!-- /.card-body -->
                </form>
          
            </div>
            <!-- end Vendor tab -->
            
        </div> <!-- end tab -->

        </div>
        <!-- /.card body-->

        </div><!-- end card outline-->

        <!-- /.start add modal-->
        <div class="modal fade" id="edit-asset">
          <div class="modal-dialog modal-lg" style="width: 760px;">
            <div class="modal-content card-success card-outline" >
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body ml-2 mr-2">
                @if ($asset)
                <form action="/manageAsset-report/{{ $asset->asset_no }}" method="POST" class="form-horizontal row-fluid">
                  @csrf

                <div class="row">
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <label>Asset Number</label>
                      <input type="text" class="form-control input" name="asset_no" id="asset_no" value="{{ $asset->asset_no }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Service</label>
                      <input type="text" class="form-control input" name="service" id="service" value="{{ $asset->service }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Asset Class</label>
                      <input type="text" class="form-control input" name="asset_class" id="asset_class" value="{{ $asset->asset_class }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Type Code</label>
                      <input type="text" class="form-control input" name="type_code" id="type_code" value="{{ $asset->type_code }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Type Name</label>
                      <input type="text" class="form-control input" name="type_name" id="type_name" value="{{ $asset->type_name }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Task Code</label>
                      <input type="text" class="form-control input" name="task_code" id="task_code" value="{{ $asset->task_code }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Task Code 3.0</label>
                      <input type="text" class="form-control input" name="taskcode_3" id="taskcode_3" value="{{ $asset->taskcode_3 }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Frequency </label>
                      <input type="text" class="form-control input" name="frequency" id="frequency" value="{{ $asset->frequency }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Description </label>
                      <input type="text" class="form-control input" name="desc" id="desc" value="{{ $asset->desc }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Item Code</label>
                      <input type="text" class="form-control input" name="item_code" id="item_code" value="{{ $asset->item_code }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Item Name</label>
                      <input type="text" class="form-control input" name="item_name" id="item_name" value="{{ $asset->item_name }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" class="form-control input" name="category" id="category" value="{{ $asset->category }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Model</label>
                      <input type="text" class="form-control input" name="model" id="model" value="{{ $asset->model }}">
                    </div>
                    <!-- /.form-group -->

                  </div>
                  <!-- /.col -->

                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Serial Number</label>
                      <input type="text" class="form-control input" name="serial_no" id="serial_no" value="{{ $asset->serial_no }}">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Manufacturer</label>
                      <input type="text" class="form-control input" name="manufacturer" id="manufacturer" value="{{ $asset->manufacturer }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Department</label>
                      <input type="text" class="form-control input" name="dept" id="dept" value="{{ $asset->dept }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control input" name="depart_name" id="depart_name" value="{{ $asset->depart_name }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Area Code</label>
                      <input type="text" class="form-control input" name="area_code" id="area_code" value="{{ $asset->area_code }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Area Name</label>
                      <input type="text" class="form-control input" name="area_name" id="area_name" value="{{ $asset->area_name }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Location Code</label>
                      <input type="text" class="form-control input" name="location_code" id="location_code" value="{{ $asset->location_code }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Location Name</label>
                      <input type="text" class="form-control input" name="location_name" id="location_name" value="{{ $asset->location_name }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Remark</label>
                      <input type="text" class="form-control input" name="remark" id="remark" value="{{ $asset->remark }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Purchase Cost</label>
                      <input type="text" class="form-control input" name="purc_cost" id="purc_cost" value="{{ $asset->purc_cost }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Work Group</label>
                      <input type="text" class="form-control input" name="work_group" id="work_group" value="{{ $asset->work_group }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Group</label>
                      <input type="text" class="form-control input" name="group" id="group" value="{{ $asset->group }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Package</label>
                      <input type="text" class="form-control input" name="package" id="package" value="{{ $asset->package }}">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Package Description</label>
                      <input type="text" class="form-control input" name="package_desc" id="package_desc" value="{{ $asset->package_desc }}">
                    </div>
                    <!-- /.form-group -->

                  </div>
                  <!-- /.col -->
                  </div>
                  <!-- /.row -->
                      
                </div><!-- /.end modal body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button name="submit" class="btn btn-success" >Save</button>
                </div>

                </form>
                @else
                  <div class="alert alert-warning">
                    <td colspan="8"> No data available </td>
                  </div>
                @endif
          </div> <!-- /.end modal content-->
          </div> <!-- /.end modal dialog-->
        </div> <!-- /.end modal-->
        <!-- /.end edit modal-->
    </section>
    <!-- /.content -->
  </div> <!-- end content wrapper -->
  <br/>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- Page specific script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
</html>

@endsection
