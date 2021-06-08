<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
$id=$_GET['id'];
$certificate_fetch_query="SELECT * FROM tbl_certificates WHERE id='$id' ";
$certificate_fetch_result=mysqli_query($conn,$certificate_fetch_query);
$certificate_fetch_row=$certificate_fetch_result->fetch_assoc();
$cer_name=$certificate_fetch_row['cer_name'];
 $logo1=$certificate_fetch_row['logo1'];
     $name1_query="SELECT name FROM tbl_media WHERE media='$logo1'";
     $name1_result=mysqli_query($conn,$name1_query);
     $name1_row=$name1_result->fetch_assoc();
     $logo1_name=$name1_row['name'];
 $logo2=$certificate_fetch_row['logo2'];
     $name2_query="SELECT name FROM tbl_media WHERE media='$logo2'";
     $name2_result=mysqli_query($conn,$name2_query);
     $name2_row=$name2_result->fetch_assoc();
     $logo2_name=$name2_row['name'];
 $name=$certificate_fetch_row['name'];
 $t_title=$certificate_fetch_row['t_title'];
 $duration=$certificate_fetch_row['duration'];
 $com1=$certificate_fetch_row['com1'];
 $com2=$certificate_fetch_row['com2'];
 $t_date=$certificate_fetch_row['t_date'];
 $t_location=$certificate_fetch_row['t_location'];
$status=$certificate_fetch_row['status'];
?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Edit Certificate
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Edit Certificate</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
<?php
if(isset($_POST['submit'])) {
  $cer_name=$_POST['cer_name'];
   $logo1=$_POST['logoleft'];
   $logo2=$_POST['logoright'];
   $name=$_POST['name'];
   $t_title=$_POST['t_title'];
   $duration=$_POST['duration'];
   $com1=$_POST['com1'];
   $com2=$_POST['com2'];
   $t_date=$_POST['t_date'];
   $t_location=$_POST['t_location'];
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

  if($cer_name!="" AND $name!="") {
      $query="UPDATE tbl_certificates cer_name='$cer_name', logo1='$logo1', logo2='$logo2', name='$name', t_title='$t_title', duration='$duration', com1='$com1', com2='$com2', t_date='$t_date', t_location='$t_location', status='$status' WHERE id='$id'";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = certificates.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = generatecertificate.php" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = generatecertificate.php?msg=error" />
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
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Certificate Name:<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="cer_name" value="<?php echo $cer_name; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Logo Left</label>
                      <select class="form-control select2" style="width: 100%;" name="logoleft">
                        <option value="<?php echo $logo1; ?>"><?php echo $logo1_name; ?></option>
                        <?php
                        $query_logo="SELECT * FROM tbl_media WHERE status='active' AND deleted_at IS NULL";
                        $result_logo=mysqli_query($conn,$query_logo);
                        while ($data_logo=mysqli_fetch_array($result_logo)) {
                          ?>
                              <option value="<?php echo $data_logo['media']; ?>"><?php echo $data_logo['name']; ?></option>
                          <?php
                        }
                         ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6 ">
                      <label>Logo Right</label>
                      <select class="form-control select2" style="width: 100%;" name="logoright">
                        <option value="<?php echo $logo2; ?>"><?php echo $logo1_name; ?></option>
                        <?php
                        $query_logo="SELECT * FROM tbl_media WHERE status='active' AND deleted_at IS NULL";
                        $result_logo=mysqli_query($conn,$query_logo);
                        while ($data_logo=mysqli_fetch_array($result_logo)) {
                          ?>
                              <option value="<?php echo $data_logo['media']; ?>"><?php echo $data_logo['name']; ?></option>
                          <?php
                        }
                         ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Trainee Name (Person Name):<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Title :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="t_title" value="<?php echo $t_title; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Duration :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="duration" value="<?php echo $duration; ?>">
                      <p class="help-block">For example: two, three, four etc. (Enter in words.)</p>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Company Name 1:<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="com1" value="<?php echo $com1; ?>">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Company Name 2:<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="com2" value="<?php echo $com2; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Location (Venue) :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="t_location" value="<?php echo $t_location; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Date :<span style="color:red;"> *</span></label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="t_date" value="<?php echo $t_date; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="col-md-12">Status : <span style="color:red;"> *</span></label>
                      <input type="checkbox" checked name="status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="0">Save</button>
                    <button type="submit" class="btn btn-secondary bg-black" name="submit" value="1">Save and Continue</button>
                    <a href="certificates.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
