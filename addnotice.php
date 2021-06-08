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
  $n_date=$_POST['n_date'];
  $des=$_POST['des'];
  if(isset($_POST['status']))
    {
        $status="active";
    }else{
        $status="deactive";
    }
  $submit=$_POST['submit'];

  if($title!="" AND $n_date!="") {
      $query="INSERT INTO tbl_notices (title,n_date,des,status) VALUES('$title','$n_date','$des','$status')";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = notices.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addnotice.php" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = addnotice.php?msg=error" />
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
                    <div class="form-group col-md-9">
                      <label for="exampleInputEmail1">Notice Title :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Notice Title">
                    </div>
                    <div class="form-group col-md-9">
                      <label for="exampleInputEmail1">Notice Date :<span style="color:red;"> *</span></label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="n_date">
                    </div>
                    <div class="form-group col-md-9">
                      <label>Description</label>
                      <textarea class="form-control" rows="8" placeholder="Enter ..." name="des"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-md-12">Status : <span style="color:red;"> *</span></label>
                      <input type="checkbox" checked name="status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
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
