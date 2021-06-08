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
          Generate Certificate
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Notice</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
<?php
if(isset($_POST['submit'])) {
$cer_name=$_POST['cer_name'];
$cer_id="cer".rand(000,999).rand(000,999);
 $logo1=$_POST['logoleft'];
 $logo2=$_POST['logoright'];
 $name=$_POST['name'];
 $t_title=$_POST['t_title'];
 $duration=$_POST['duration'];
 $com1=$_POST['com1'];
 $com2=$_POST['com2'];
 $t_date=$_POST['t_date'];
 $t_location=$_POST['t_location'];
 if(isset($_POST['status']))
   {
       $status="active";
   }else{
       $status="deactive";
   }
 $submit=$_POST['submit'];
 //Check where cer_id exist already or not
 $query="SELECT * FROM tbl_certificates WHERE cer_id='$cer_id'";
 $result=mysqli_query($conn,$query)
 or die(mysqli_error($conn));
 $count=mysqli_num_rows($result);
 if($count==1){
   ?>
   <meta http-equiv = "refresh" content = "0; url = generatecertificate.php?msg=err_cer_id" />
   <?php
}
else
{
    if($cer_name!="" AND $logo1!="" AND $logo2 !="" AND $name!="" AND $t_title!="" AND $duration!="" AND $com1!="" AND $com2!="" AND $t_date!="" AND $t_location!="") {
      $query="INSERT INTO tbl_certificates (cer_name,cer_id, logo1, logo2, name, t_title, duration, com1, com2, t_date, t_location, status) VALUES('$cer_name','$cer_id','$logo1','$logo2','$name','$t_title','$duration','$com1','$com2','$t_date','$t_location','$status')";
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
      if($submit==2) {
        ?>
        <meta http-equiv = "refresh" content = "0; url = certificate.php?cer_id=<?php echo "$cer_id"; ?>" />
        <?php
      }
    }
    else {
      echo "Error in generating Certificate";
    }

}
else {
  echo "All fields are required !!!";
}
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
                      <input type="text" class="form-control" id="exampleInputEmail1" name="cer_name">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Logo Left</label>
                      <select class="form-control select2" style="width: 100%;" name="logoleft">
                        <option>Select</option>
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
                        <option>Select</option>
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
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Title :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="t_title">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Duration :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="duration">
                      <p class="help-block">For example: two, three, four etc. (Enter in words.)</p>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Company Name 1:<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="com1">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Company Name 2:<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="com2">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Location (Venue) :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="t_location">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Training Date :<span style="color:red;"> *</span></label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="t_date">
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
                    <button type="submit" class="btn btn-info" name="submit" value="2">Save and Generate</button>
                    <a href="certificates.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
