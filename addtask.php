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
          Add Notice
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Notice</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $title=$_POST['title'];
  $des=$_POST['des'];
  $a_date=$_POST['a_date'];
  $a_by=$_POST['a_by'];
  $a_to=$_POST['a_to'];
  $timeline=$_POST['timeline'];
  if(isset($_POST['status']))
    {
        $status="active";
    }else{
        $status="deactive";
    }
  $submit=$_POST['submit'];

  if($title!="" AND $a_date!="" AND $a_by!="" AND $a_to!="") {
      $query="INSERT INTO tbl_tasks (title,des,a_by,a_to,a_date,timeline) VALUES('$title','$des','$a_by','$a_to','$a_date','$timeline')";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = tasks.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addtask.php" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = addtask.php?msg=error" />
          <?php
        }
      }
      else {
      echo "Event Title and Event Time is necessary";
    }
    }
         ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="" action="#" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Task Title :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Notice Title">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Task Description</label>
                      <textarea class="form-control" rows="5" placeholder="Enter ..." name="des"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Assigned Date :<span style="color:red;"> *</span></label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="a_date">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Assigned By</label>
                      <select class="form-control" name="a_by">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <div class="form-group col-md-9">
                      <label>Assigned To</label>
                      <select class="form-control" name="a_to">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <!-- Date range -->
                    <div class="form-group">
                      <label>Timeline (Start-End):</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation" name="timeline">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="0">Save</button>
                    <button type="submit" class="btn btn-secondary bg-black" name="submit" value="1">Save and Continue</button>
                    <a href="trainers.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
