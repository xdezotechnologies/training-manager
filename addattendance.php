<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Add Attendance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Attendance</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $course=$_POST['course'];
  $a_date=$_POST['a_date'];
  $sign_mark=$_POST['sign_mark'];
  if(isset($_POST['status']))
    {
        $status="active";
    }else{
        $status="deactive";
    }
  $submit=$_POST['submit'];

  if($name!="" AND $mobile!="") {
      $query="INSERT INTO tbl_attendance (name,mobile,course,a_date,sign_mark,status) VALUES('$name','$mobile','$course','$a_date','$sign_mark','$status')";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = attendance.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addattendance.php" />
            <?php
          }
        }
        else {
          echo "Error in Adding";
        }

      }
  }


         ?>

        <!-- Main content -->
        <section class="content">
          <div class="box-header">
            <div class="add_new col-md-11 col-sm-8 col-xs-8">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp  Import
              </button>
            </div>
          </div>
<!-- modal when Import is clicked -->
              <div class="modal modal-info fade" id="modal-info">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Import CSV file (Excel File)</h4>
                    </div>
                    <div class="modal-body">
                      <p>Only CSV file with the proper data format will be imported otherwise discarded.&hellip;</p>
                    </div>
                    <div class="modal-footer">
                          <form class="form-horizontal" action="process/importattendance.php"  method="post" enctype="multipart/form-data" name="upload_excel">
                            <fieldset>
                              <div class="control-group col-md-12">
                                <div class="controls">
                                  <input type="file" name="file" id="file" class="input-large">
                                </div>
                              </div>
                              <div class="control-group col-md-12">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Save</button>
                                </div>
                              </div>
                            </fieldset>
                        </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="" action="#" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Name of Trainee :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Student ID">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Mobile No: <span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Course : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="course"  placeholder="Enter Address">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Date : </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="a_date"  placeholder="Enter Address">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Signature/Mark : <span style="color:red;"> *</span></label>
                      <select class="form-control" name="sign_mark">
                        <option>Select</option>
                        <option>present</option>
                        <option>absent</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="col-md-12">Status : <span style="color:red;"> *</span></label>
                      <input type="checkbox" checked name="status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="0">Save</button>
                    <button type="submit" class="btn btn-secondary bg-black" name="submit" value="1">Save and Continue</button>
                    <a href="attendance.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
