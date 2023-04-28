@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PAKAR CMMS </title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <h1 class="page-title">Vehicle Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a class="page-location" href="/admin/dashboard">Home</a>
              </li>
              <li class="breadcrumb-item active">Vehicles</li>
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
                <h2 class="table-title">List of Vehicle</h2>
                <a href="/addVehicle" data-toggle="modal" title="Add Vehicle" 
                  class="open-qq btn btn-primary shadow-sm p-8 mr-4 rounded " data-target="#add-vehicle">
                  <i class="fas fa-plus"></i>&nbsp; Add 
                </a>
              </div>
              <hr>
              
              <!-- /.card-header -->
              <div class="card-body one">
                <table id="example1" class="table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th class="th">#</th>
                    <th class="th">Model Number</th>
                    <th class="th">License Plate Number</th>
                    <th class="th">Engine Number</th>
                    <th class="th center">Action</th>
                  </tr>
                  </thead>
                  <tbody style="text-align:center">
                    @if( $vehicles->isEmpty() )
                      <tr>
                        <td colspan="8"> No data available in the table </td>
                      </tr>
                    @else
                      @foreach($vehicles as $vehicle)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $vehicle->model }}</td>
                          <td>{{ $vehicle->plate_no }}</td>
                          <td>{{ $vehicle->engine }}</td>
                          <td>
                            <div class="icons-table">
                              <a href="/updateVehicle/{{ $vehicle->id }}" data-toggle="modal" title="View Vehicle" 
                                class="open-qq btn btn btn-sm icon-table detail-btn" data-target="#edit-vehicle" data-id="{{ $vehicle->id }}">
                                <i class="fa fa-pencil-alt icon-table"></i>
                              </a>
                              <a href="" data-toggle="modal" title="Delete Vehicle" 
                                class="open-qq btn btn-sm icon-table " data-target="#delete-vehicle">
                                <i class="fas fa-trash icon-table"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    @endif
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

      <!-- /.start add vehicle modal-->
      <div class="modal fade" id="add-vehicle">
        <div class="modal-dialog">
          <div class="modal-content card-primary card-outline">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body ml-1 mr-1">
              <form action="/addVehicle" class="form-horizontal row-fluid" method="POST" >
                @csrf

              <div class="row">
                <div class="col-md">
                    <div class="form-group">
                      <label style="font-weight: normal;">Model</label>
                      <input type="text" name="model" id="model" class="form-control input" placeholder="e.g. Proton" required>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label style="font-weight: normal;">License Plate Number</label>
                      <input type="text" name="plate_no" id="plate_no" class="form-control input" placeholder="Enter plate number" required>
                    </div>
                    <!-- /.form-group -->
                    
                    <div class="form-group">
                      <label style="font-weight: normal;" >Engine Number</label>
                      <input type="text" name="engine" id="engine" class="form-control input" placeholder="e.g. 4S3BMHB68B3286050" required>
                    </div>
                    <!-- /.form-group -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
                
          </div><!-- /.end modal body-->

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button  name="submit" class="btn btn-primary">Submit</button> 
          </div>
          </form>
        </div> <!-- /.end modal content-->
        </div> <!-- /.end modal dialog-->
      </div> <!-- /.end modal-->
      <!-- /.end add vehicle modal-->

      <!-- /.start edit vehicle modal-->
      <div class="modal fade" id="edit-vehicle" tabindex="-1" role="dialog" aria-labelledby="vehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content card-success card-outline" >
            <div class="modal-header">
              <h5 class="modal-title" id="vehicleModalLabel">Edit Vehicle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body ml-1 mr-1">
              @if (isset( $vehicle ))
                <form action="" method="POST" id="editForm">
                  {{csrf_field()}}
        
                <div class="row" style="text-align: left;">
                  <div class="col-md">
                      <div class="form-group">
                        <label style="font-weight: normal;">Model</label>
                        <input type="text" name="model" id="vehicle-model" class="form-control input" required>
                      </div>
                      <!-- /.form-group -->

                      <div class="form-group">
                        <label style="font-weight: normal;">License Plate Number</label>
                        <input type="text" name="plate_no" id="vehicle-plate_no" class="form-control input" required>
                      </div>
                      <!-- /.form-group -->
                      
                      <div class="form-group">
                        <label style="font-weight: normal;" >Engine Number</label>
                        <input type="text" name="engine" id="vehicle-engine" class="form-control input" required>
                      </div>
                      <!-- /.form-group -->

                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
                  
            </div><!-- /.end modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button  name="submit" class="btn btn-success" >Save</button>
            </div>
            </form>
          @else
            <p> No data </p>
          @endif
        </div> <!-- /.end modal content-->
        </div> <!-- /.end modal dialog-->
      </div> <!-- /.end modal-->
      <!-- /.end edit vendor modal-->

      <!-- /.start delete asset modal-->
      <div class="modal fade" id="delete-vehicle">
        <div class="modal-dialog">
        
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Vehicle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                  Are you want to delete this vehicle?
                </div>
              <div class="modal-footer justify-content-end">
                @if (isset( $vehicle ))
                  <form id="delete-form" action="/deleteVehicle/{{ $vehicle->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                      <button  name="submit" class="btn btn-danger float-right" >Delete</button>
                      <button type="button" class="btn btn-default float-right" data-dismiss="modal" style="margin-right: 5px;">Cancel</button>
                      
                  </form>
                @else
                  <p> No data </p>
                @endif
              </div>
          
          </div><!-- /.end modal content-->
        </div> <!-- /.end modal dialog-->
      </div> <!-- /.end modal-->
      <!-- /.end modal delete vendor -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- Page specific script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

  $(document).ready(function() {
    $('.detail-btn').click(function() {
      const id = $(this).attr('data-id');
      
      $.ajax({
        url: '/showVehicle/'+id,
        type: 'GET',
        data: {
          "id": id
        },
        success:function(data) {
          $('#vehicle-model').val(data.model);
          $('#vehicle-plate_no').val(data.plate_no);
          $('#vehicle-engine').val(data.engine);

          $('#editForm').attr('action', '/updateVehicle/' + id); 
        }
      })
    });

    $('.delete-btn').click(function() {
      const id = $(this).attr('data-id');
      
      $('#delete-form').attr('action', '/deleteVehicle/'+id);
    });
  });

</script>
</body>
</html>

@endsection