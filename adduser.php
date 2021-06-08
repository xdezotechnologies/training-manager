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
          Add User
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add User</a></li>
          </ol>
        </section>
        <!-- When submit button is clicked -->
                <?php
        if(isset($_POST['submit'])) {
          $usertype=$_POST['usertype'];
          $fullname=$_POST['fullname'];
          $email=$_POST['email'];
          $password=md5($_POST['password']);
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
          if(isset($_POST['status']))
            {
                $status="active";
            }else{
                $status="deactive";
            }
          $submit=$_POST['submit'];

          if($fullname!="" AND $password!="" AND $phone!="" AND $email!="" AND $status!="") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              if($file_status==1) {
                  if ($filesize<1000000) {
                  if ($extention=='jpg' || $extention=='png' || $extention=='gif' || $extention=='jpeg' || $extention=='tif' || $extention=='PNG' || $extention=='GIF' || $extension== 'JPEG' || $extension=='TIF' || $extension=='$JPG') {
                  if (move_uploaded_file($_FILES['dataFile']['tmp_name'], "uploads/".$finalfile))
                  {
              $query="INSERT INTO tbl_users (usertype_id,name,email,password,address,phone,image,status) VALUES('$usertype','$fullname','$email','$password','$address','$phone','$finalfile','$status')";
              $result=mysqli_query($conn,$query);

                if($result) {

                            if($usertype=='admin' OR 'superadmin') {
                                $admin_query="INSERT INTO tbl_admin(adminUser,adminPass) VALUES ('$email','$password')";
                                $admin_result=mysqli_query($conn,$admin_query);
                            }
                  if($submit==0) {
                      ?>
                    <meta http-equiv = "refresh" content = "0; url = users.php" />
                      <?php
                  }
                  if($submit==1) {
                    ?>
                    <meta http-equiv = "refresh" content = "0; url = adduser.php" />
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
          $query="INSERT INTO tbl_users (usertype_id,name,email,password,address,phone,image,status) VALUES('$usertype','$name','$email','$password','$address','$phone','http://images.clipartpanda.com/user-clipart-matt-icons_preferences-desktop-personal.png','$status')";
          $result=mysqli_query($conn,$query);
            if($result) {
              if($submit==0) {
                  ?>
                <meta http-equiv = "refresh" content = "0; url = users.php" />
                  <?php
              }
              if($submit==1) {
                ?>
                <meta http-equiv = "refresh" content = "0; url = adduser.php" />
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
                        <option>Select</option>
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
                      <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Email : </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email"  placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Password : </label>
                      <input type="password" class="form-control" id="exampleInputEmail1" name="password"  placeholder="Enter Password">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Address : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="address"  placeholder="Enter Address">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Phone :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group col-md-4 mr-10">
                      <label for="exampleInputFile">Profile Picture</label>
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                        <div class="image-upload-wrap">
                          <input class="file-upload-input" type='file' onchange="readURL(this);" name="dataFile" accept="image/*" />
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
                        <p class="help-block">Maximum File Size : 1MB.</p>
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
                    <a href="trainees.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
