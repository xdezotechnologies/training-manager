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
          Add User Verification Code
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add User Verification Code</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $ver_code=$_POST['ver_code'];
  $user_type=$_POST['user_type'];
  if(isset($_POST['status']))
    {
        $status="active";
    }else{
        $status="deactive";
    }
  $submit=$_POST['submit'];

  if($ver_code!="") {
      $query="INSERT INTO tbl_user_verifications (ver_code,user_type,status) VALUES('$ver_code','$user_type','$status')";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = verifications_code.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addverifications_code.php" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = addverifications_code.php?msg=error" />
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
                    <div class="form-group col-md-1">
                      <label>Generate</label><br>
                      <a href="addverifications_code.php"><button type="button" class="btn btn-primary" name="submit">Click</button></a>
                    </div>
                    <div class="form-group col-md-11">
                      <label>Verification Code</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo uniqid(); ?>" name="ver_code">
                    </div>
                    <div class="form-group">
                      <label>User Type</label>
                      <select class="form-control" name="user_type">
                        <option>Select</option>
                <?php
                $usertype_query="SELECT * FROM tbl_usertype WHERE status='active' AND deleted_at IS NULL AND title!='superadmin' AND title!='admin'";
                $usertype_result=mysqli_query($conn,$usertype_query);
                while ($data=mysqli_fetch_array($usertype_result)) {
                  ?>
                      <option value="<?php echo $data['id']; ?>"><?php if($data['title']=='admin') { echo "admin"; } elseif($data['title']=='trainer') { echo "Trainer"; } else { echo "Trainee"; } ?></option>
                  <?php
                }
        ?>
                      </select>
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
