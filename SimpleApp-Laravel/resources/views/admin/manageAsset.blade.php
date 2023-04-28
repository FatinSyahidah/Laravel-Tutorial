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
            <h1 class="page-title">Asset Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a class="page-location" href="/admin/dashboard">Home</a>
              </li>
              <li class="breadcrumb-item active">Assets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="table-top" >

                <h2 class="table-title">List of Asset</h2>

                <a href="/addAsset" data-target="#add-asset" data-toggle="modal" title="Add Asset" 
                  class="open-qq btn btn-primary shadow-sm p-8 mr-4 rounded ">
                  <i class="fas fa-plus"></i>&nbsp; Add 
                </a>

              </div>
              <hr>
              
              <!-- /.card-header -->
              <div class="card-body one">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="th">#</th>
                    <th class="th">Asset Number</th>
                    <th class="th">Asset Name</th>
                    <th class="th">Asset type (code / class)</th>
                    <th class="th">Model</th>
                    <th class="th">Serial Number</th>
                    <th class="th">Action</th>
                  </tr>
                  </thead>
                  <tbody style="text-align:center;">
                        @foreach($assets as $asset)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $asset->asset_no }}</td>
                            <td>{{ $asset->type_name }}</td>
                            <td>{{ $asset->type_code}} / {{ $asset->asset_class }}</td>
                            <td>{{ $asset->model }}</td>
                            <td>{{ $asset->serial_no }}</td>
                            <td>
                              <div class="icons-table">
                                <a href="/admin/manageAsset-report/{{ $asset->asset_no }}" title="View Asset" 
                                  class="open-qq btn btn btn-sm icon-table">
                                  <i class="fa fa-eye icon-table"></i>
                                </a>
                                <a href="/deleteAsset/{{ $asset->asset_id }}" data-target="#delete-asset" data-toggle="modal" title="Delete Asset" 
                                  class="open-qq btn btn-sm icon-table ">
                                  <i class="fas fa-trash icon-table"></i>
                                </a>
                              </div>
                            </td>
                          </tr> 
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <!-- /.start add asset modal-->
      <div class="modal fade" id="add-asset">
        <div class="modal-dialog modal-lg">
          <div class="modal-content card-primary card-outline">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Asset</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div><!-- /.end modal-header content-->
            
                <div class="card-body" >
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link new active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link upload" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Upload</a>
                    </li>
                    </ul>

                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            <form action="/addAsset" method="POST">
                              @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"><!-- /.start 1st col-->

                                      <div class="form-group">
                                        <label>Asset Number</label>
                                        <input type="text" class="form-control input" name="asset_no" id="asset_no" placeholder="WV109000094AW" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Service</label>
                                        <input type="text" class="form-control input" name="service" id="service" placeholder="FEMS" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Asset Classification</label>
                                        <input type="text" class="form-control input" name="asset_class" id="asset_class" placeholder="ELEC" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Type Code</label>
                                        <input type="text" class="form-control input" name="type_code" id="type_code" placeholder="260409" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Type Name</label>
                                        <input type="text" style="width: 100%;" 
                                          class="form-control" name="type_name" id="type_name" placeholder="Electrical Appliances, Medical Support, X-Ray Viewer" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Task Code</label>
                                        <input type="text" class="form-control input" name="task_code" id="task_code" placeholder="ER2015" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Task Code 3.0</label>
                                        <input type="text" class="form-control input" name="taskcode_3" id="taskcode_3" placeholder="ER2015" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Frequency </label>
                                        <input type="text" class="form-control input" name="frequency" id="frequency" placeholder="Semi-Anually" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Description </label>
                                        <input type="text" class="form-control input" name="desc" id="desc" placeholder="Audio-Visual, PA System,Monitor Panel" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Item Code</label>
                                        <input type="text" class="form-control input" name="item_code" id="item_code" placeholder="200800" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Item Name</label>
                                        <input type="text" class="form-control input" name="item_name" id="item_name" placeholder="Audio-Visual, PA System" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" class="form-control input" name="category" id="category" placeholder="SYSTEM" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Model</label>
                                        <input type="text" class="form-control input" name="model" id="model" placeholder="MD-0025" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Serial Number</label>
                                        <input type="text" class="form-control input" name="serial_no" id="serial_no" placeholder="15E87 04098B" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Manufacturer</label>
                                        <input type="text" class="form-control input" name="manufacturer" id="manufacturer" placeholder="TOA Corporation" required>
                                      </div>
                                      <!-- /.form-group -->

                                      </div><!-- /.end 1st col -->

                                    <div class="col-md-6"><!-- /.start 2nd col -->
                                  
                                      <div class="form-group">
                                        <label>Department</label>
                                        <input type="text" class="form-control input" name="dept" id="dept" placeholder="SS" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Department Name</label>
                                        <input type="text" class="form-control input" name="depart_name" id="depart_name" placeholder="Security Services" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Area Code</label>
                                        <input type="text" class="form-control input" name="area_code" id="area_code" placeholder="L1SS" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                          <label>Area Name</label>
                                          <input type="text" style="width: 100%;" 
                                          class="form-control" name="area_name" id="area_name" placeholder="Fire Control" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Location Code</label>
                                        <input type="text" class="form-control input" name="location_code" id="location_code" placeholder="L1-SS-004" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Location Name</label>
                                        <input type="text" class="form-control input" name="location_name" id="location_name" placeholder="Fire Control" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Remark</label>
                                        <input type="text" class="form-control input" name="remark" id="remark" placeholder="4 unit" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Purchase Cost</label>
                                        <input type="text" class="form-control input" name="purc_cost" id="purc_cost" placeholder="8,000.00" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Work Group</label>
                                        <input type="text" class="form-control input" name="work_group" id="work_group" placeholder="ELEC" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Group</label>
                                        <input type="text" class="form-control input" name="group" id="group" placeholder="M&E" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Package</label>
                                        <input type="text" class="form-control input" name="package" id="package" placeholder="PA SYSTEM" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Package Description</label>
                                        <input type="text" class="form-control input" name="package_desc" id="package_desc" placeholder="PUBLIC ANNOUNCEMENT SYSTEM" required>
                                      </div>
                                      <!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Vendor</label>
                                        <div class="col-sm-13">
                                        <select name="vendor_id" id="vendor_id"  class="form-control input" required>
                                          <option selected="selected">Choose</option>
                                          <option value="1">PAKARATWORK SDN BHD</option>
                                        </select>
                                      </div>
                                      </div><!-- /.form-group -->

                                      <div class="form-group">
                                        <label>Branch</label>
                                        <div class="col-sm-13">
                                        <select name="branch_id" id="branch_id"  class="form-control input" required>
                                          <option selected="selected">Choose</option>
                                          <option value="1">Hospital Tunku Azizah (HTA)</option>
                                          <option value="2">Hospital Rawang</option>
                                        </select>
                                      </div>
                                      </div><!-- /.form-group -->

                                      <div class="form-group">
                                        <input type="text" class="form-control input" name="createby" id="createby" value="1" hidden>
                                      </div>
                                      <!-- /.form-group -->

                                      <!-- /.form-group -->
                                  </div>
                                      <!-- /.end 2nd col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer" style="margin-bottom: -15px;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button  name="submit" class="btn btn-primary" >Submit</button>
                            </div><!-- /.end modal-footer content-->
                            </form><!-- /.end form new content-->
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                            <form>
                                <div class="card-body">
                                    <div class="tab drop-zone" style="text-align: center; justify-content: center;">
                                        <span class="drop-zone__prompt">Drop csv file here or click to upload</span>
                                        <input type="file" name="myFile" class="drop-zone__input">
                                    </div> 
                                </div>
                                <!-- /.card-body -->
                                <div class="modal-footer" style="margin-bottom: -15px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button  name="submit" class="btn btn-primary" >Submit</button>
                                </div><!-- /.end modal-footer content-->
                            </form><!-- /.end form upload content-->
                        </div><!-- /.end tab-pane content-->
                    </div><!-- /.end modal-body content-->
            
                </div> <!-- /.end card-body content-->
            </div> <!-- /.end modal-dialog-->
        </div> <!-- /.end modal-dialog-->
      </div> <!-- /.end modal-->
      <!-- /.end add asset modal-->

      <!-- /.start delete asset modal-->
      <div class="modal fade" id="delete-asset">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Asset</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                  Are you want to delete this asset?
                </div>
              <div class="modal-footer justify-content-end">
               
                @if(isset($asset))
                  <form action="/deleteAsset/{{ $asset->asset_id }}" method="POST">
                  {{csrf_field()}} 

                    <button  name="submit" class="btn btn-danger float-right">Delete</button>
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal" style="margin-right: 5px;">Cancel</button>
                    
                  </form>
              @endif
            </div>
          
          </div><!-- /.end modal content-->
        </div> <!-- /.end modal dialog-->
      </div> <!-- /.end modal-->
      <!-- /.end add asset  modal-->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->>
</div>


</body>
</html>

@endsection