<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
$id=$_GET['id'];
$user_fetch_query="SELECT * FROM tbl_users WHERE id='$id' ";
$user_fetch_result=mysqli_query($conn,$user_fetch_query);
$user_fetch_row=$user_fetch_result->fetch_assoc();
$usertype_id=$user_fetch_row['usertype_id'];
  $usertype_query="SELECT * FROM tbl_usertype WHERE id=$usertype_id";
  $usertype_result=mysqli_query($conn,$usertype_query);
  $data_usertype=$usertype_result->fetch_assoc();
  $usertype=$data_usertype['title'];
$name=$user_fetch_row['name'];
$email=$user_fetch_row['email'];
$address=$user_fetch_row['address'];
$phone=$user_fetch_row['phone'];
$image=$user_fetch_row['image'];
$status=$user_fetch_row['status'];
?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Edit User
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Edit User</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $t_name=$_POST['name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  if(!($_FILES['dataFile']['error'] )) {
      $file_status=1;
      require('process/fileupload.php');
  }
  else
  {
      $file_status=0;
  }
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

  if($name!="" AND $email!="") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      if($file_status==1) {
          if ($filesize<1000000) {
          if ($extention=='jpg' || $extention=='png' || $extention=='gif' || $extention=='jpeg' || $extention=='tif' || $extention=='PNG' || $extention=='GIF' || $extension== 'JPEG' || $extension=='TIF' || $extension=='$JPG') {
          if (move_uploaded_file($_FILES['dataFile']['tmp_name'], "uploads/".$finalfile))
          {
      $query="UPDATE tbl_users SET usertype_id='$usertype',name='$name',email='$email', address='$address', phone='$phone', image='$finalfile', status='$status' WHERE id='$id' ";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = users.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = edituser.php?id=<?php echo $id; ?>" />
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
  $query="UPDATE tbl_users SET usertype_id='$usertype',name='$name',email='$email', address='$address', phone='$phone', status='$status' WHERE id='$id' ";
  $result=mysqli_query($conn,$query);
    if($result) {
      if($submit==0) {
          ?>
        <meta http-equiv = "refresh" content = "0; url = users.php" />
          <?php
      }
      if($submit==1) {
        ?>
        <meta http-equiv = "refresh" content = "0; url = edituser.php?id=<?php echo $id; ?>" />
        <?php
      }
    }
}
} else {
  echo "Invalid Email Address";
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
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">User Type : <span style="color:red;"> *</span></label>
                      <select class="form-control" name="usertype">
                        <option value="<?php echo $usertype_id; ?>"><?php echo $usertype; ?></option>
                                <?php
                          $usertype_query="SELECT * FROM tbl_usertype WHERE status='active' AND deleted_at IS NULL";
                          $user_result=mysqli_query($conn,$usertype_query);
                          while ($data=mysqli_fetch_array($user_result)) {
                            ?>
                                  <option value="<?php echo $data['id']; ?>"><?php echo $data['title']; ?></option>
                            <?php
                          }
                             ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Full Name : <span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $name; ?>" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Email : </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $email; ?>"  placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Address : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="<?php echo $address; ?>"  placeholder="Enter Address">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Phone :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="<?php echo $phone; ?>" placeholder="Enter Date of Birth">
                    </div>
                    <div class="col-md-8">
     <!-- Custom Tabs -->
                 <div class="nav-tabs-custom">
                   <ul class="nav nav-tabs">
                     <li class="active"><a href="#tab_1" data-toggle="tab">Add Image</a></li>
                     <li><a href="#tab_2" data-toggle="tab">Preview Image</a></li>
                   </ul>
                   <div class="tab-content">
                     <div class="tab-pane active" id="tab_1">
                       <div class="form-group col-md-12 mr-10">
                           <label for="exampleInputFile">Slider Picture</label>
                             <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                             <div class="image-upload-wrap">
                               <input class="file-upload-input" type='file' onchange="readURL(this);" name="dataFile" accept="image/*"/>
                               <div class="drag-text">
                                 <h3>Drag and drop a file or select add Image</h3>
                               </div>
                             </div>
                             <div class="file-upload-content">
                               <img class="file-upload-image" src="#" alt="your image" />
                               <div class="image-title-wrap">
                                 <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                               </div>
                             </div>
                             <p class="help-block">Maximum File Size : 2MB.</p>
                         </div>
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="tab_2">
                       <img src="<?php echo "http://localhost/training_manager/uploads/".$image; ?>" style="width:400px;height:200px;" alt="<?php echo $image; ?>">
                     </div>
                     <!-- /.tab-pane -->
                   </div>
                   <!-- /.tab-content -->
                 </div>
                 <!-- nav-tabs-custom -->
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
                    <a href="users.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
