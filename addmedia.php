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
          Add Media
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
  if(!($_FILES['dataFile']['error'] )) {
      $file_status=1;
      require('process/fileupload.php');
  }
  else
  {
      $file_status=0;
  }
  if(isset($_POST['status']))
    {
        $status="active";
    }else{
        $status="deactive";
    }
  $submit=$_POST['submit'];

  if($name!="") {
    if($file_status==1) {
        if ($filesize<1000000) {
        if ($extention=='jpg' || $extention=='png' || $extention=='gif' || $extention=='jpeg' || $extention=='tif' || $extention=='PNG' || $extention=='GIF' || $extension== 'JPEG' || $extension=='TIF' || $extension=='$JPG') {
        if (move_uploaded_file($_FILES['dataFile']['tmp_name'], "uploads/".$finalfile))
        {
    $query="INSERT INTO tbl_media (name,media,status) VALUES('$title','$finalfile','$status')";
    $result=mysqli_query($conn,$query);
        if($submit==0) {
            ?>
          <meta http-equiv = "refresh" content = "0; url = media.php" />
            <?php
        }
        if($submit==1) {
          ?>
          <meta http-equiv = "refresh" content = "0; url = addmedia.php" />
          <?php
        }
      }
    }
    else {
      echo "Error in file uploading";
    }
  }
  else {
    echo "File not supported";
  }
}
else {
  echo "File size exceeded.";
}
}
else {
  echo "File is necessary";
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
                      <label for="exampleInputEmail1">Media Name :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter File Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile" name="dataFile">

                      <p class="help-block">Max File Size 2 MB.</p>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-md-12">Status : <span style="color:red;"> *</span></label>
                      <input type="checkbox" checked name="status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
                    </div>
                      <!-- /.input group -->
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
