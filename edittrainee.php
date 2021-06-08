
<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
$id=$_GET['id'];
$student_fetch_query="SELECT * FROM tbl_trainees WHERE id='$id' ";
$student_fetch_result=mysqli_query($conn,$student_fetch_query);
$student_fetch_row=$student_fetch_result->fetch_assoc();
$name=$student_fetch_row['name'];
$name_clientorg=$student_fetch_row['name_clientorg'];
$position=$student_fetch_row['position'];
$workplace=$student_fetch_row['workplace'];
$mobile=$student_fetch_row['mobile'];
$email=$student_fetch_row['email'];
$training_title=$student_fetch_row['training_title'];
$no_td=$student_fetch_row['no_td'];
$duration=$student_fetch_row['duration'];
$venue=$student_fetch_row['venue'];
$pretest=$student_fetch_row['pretest'];
$posttest=$student_fetch_row['posttest'];
?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Edit Trainee
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Edit Trainee</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $name=$_POST['name'];
  $name_clientorg=$_POST['name_clientorg'];
  $position=$_POST['position'];
  $workplace=$_POST['workplace'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $training_title=$_POST['training_title'];
  $no_td=$_POST['no_td'];
  $duration=$_POST['duration'];
  $venue=$_POST['venue'];
  $pretest=$_POST['pretest'];
  $posttest=$_POST['posttest'];

  $submit=$_POST['submit'];

  if($name!="") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $query="UPDATE tbl_trainees SET name='$name', name_clientorg='$name_clientorg', position='$position', workplace='$workplace', mobile='$mobile', email='$email', training_title='$training_title', no_td='$no_td', duration='$duration', venue='$venue', pretest='$pretest', posttest='$posttest' WHERE id='$id'";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = trainees.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addtrainee.php" />
            <?php
          }
        }
        else {
          echo "Error in Adding";
        }

      }
    } else {
      echo("$email is not a valid email address");
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
                      <label for="exampleInputEmail1">Name of Trainee : <span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $name; ?>" placeholder="Name of Trainee">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Name of Client Organization : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name_clientorg" value="<?php echo $name_clientorg; ?>" placeholder="Name of Client Organization">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Position : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="position" value="<?php echo $position; ?>"  placeholder="Position">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Place of Work / District : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="workplace" value="<?php echo $workplace; ?>" placeholder="Place of Work">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Mobile :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Email : </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $email; ?>" placeholder="Email">
                    </div>
                    <div class="form-group  col-md-3">
                      <label for="exampleInputEmail1">Training Title : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="training_title" value="<?php echo $training_title; ?>" placeholder="Title">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">No. of Training Days :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="no_td" value="<?php echo $no_td; ?>" placeholder="No. of Training Days">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Training Duration :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="duration" value="<?php echo $duration; ?>" placeholder="Training Duration">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Venue :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="venue" value="<?php echo $venue; ?>" placeholder="Venue">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Pre Test :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="pretest" value="<?php echo $pretest; ?>" placeholder="Pre Test">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Post Test :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="posttest" value="<?php echo $posttest; ?>" placeholder="Post Test">
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
