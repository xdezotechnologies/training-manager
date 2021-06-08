<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <?php
$id=$_GET['id'];
$event_fetch_query="SELECT * FROM tbl_events WHERE id='$id' ";
$event_fetch_result=mysqli_query($conn,$event_fetch_query);
$event_fetch_row=$event_fetch_result->fetch_assoc();
$title=$event_fetch_row['title'];
$e_time=$event_fetch_row['e_time'];
$status=$event_fetch_row['status'];
?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Add Events
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Events</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $title=$_POST['title'];
  $e_time=$_POST['e_time'];
  if($status=='active') {
    if(isset($_POST['status']))
      {
    $status="active";
      }else{
    $status="deactive";
    }
  }
  else {
    if(isset($_POST['status']))
      {
    $status="deactive";
      }else{
    $status="active";
    }
  }
  $submit=$_POST['submit'];

  if($title!="" AND $e_time!="") {
      $query="UPDATE tbl_events SET title='$title', e_time='$e_time', status='$status' WHERE id='$id'";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = events.php?msg=success" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = editevent.php?msg=success&id=<?php echo $id; ?>" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = editevent.php?msg=error&id=<?php echo $id; ?>" />
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
                      <label for="exampleInputEmail1">Event Title :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php echo $title; ?>" placeholder="Enter Event Title">
                    </div>
                    <div class="form-group col-md-9">
                      <label for="exampleInputEmail1">Previous Event Time :<span style="color:red;"> *</span></label>
                      <?php echo $e_time; ?>
                      <p class="text-info">Please again select the event time. If you don't select then default time will be scheduled.</p>
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group col-md-12">
                      <label>Event Time: <b>(Start-End)</b><span style="color:red;"> *</span></label>

                      <div class="input-group col-md-9">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservationtime" name="e_time">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-md-12">Status : <span style="color:red;"> *</span></label>
                      <?php
                        if($status=='active') {
                          ?>
                        <input type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
                        <?php
                        } else
                        {
                          ?>
                          <input type="checkbox" checked data-toggle="toggle" data-on="Deactive" data-off="Active" data-onstyle="danger" data-offstyle="success">
                          <?php
                        }
                      ?>
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
