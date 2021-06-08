<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
$id=$_GET['id'];
$trainer_fetch_query="SELECT * FROM tbl_trainers WHERE id='$id' ";
$trainer_fetch_result=mysqli_query($conn,$trainer_fetch_query);
$trainer_fetch_row=$trainer_fetch_result->fetch_assoc();
$name_trainer=$trainer_fetch_row['name_trainer'];
$mobile_trainer=$trainer_fetch_row['mobile_trainer'];
$email_trainer=$trainer_fetch_row['email_trainer'];
$name_cotrainer=$trainer_fetch_row['name_cotrainer'];
$mobile_cotrainer=$trainer_fetch_row['mobile_cotrainer'];
$email_cotrainer=$trainer_fetch_row['email_cotrainer'];
?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Edit Trainer
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Edit Trainer</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $name_trainer=$_POST['name_trainer'];
  $mobile_trainer=$_POST['mobile_trainer'];
  $email_trainer=$_POST['email_trainer'];
  $name_cotrainer=$_POST['name_cotrainer'];
  $mobile_cotrainer=$_POST['mobile_cotrainer'];
  $email_cotrainer=$_POST['email_cotrainer'];
  $submit=$_POST['submit'];


    if (filter_var($email_trainer, FILTER_VALIDATE_EMAIL) AND filter_var($email_cotrainer, FILTER_VALIDATE_EMAIL)) {
      $query="UPDATE tbl_trainers SET name_trainer='$name_trainer',mobile_trainer='$mobile_trainer', email_trainer='$email_trainer', name_cotrainer='$name_cotrainer', mobile_cotrainer='$mobile_cotrainer', email_cotrainer='$email_cotrainer' WHERE id='$id' ";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = trainers.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = edittrainer.php?id=<?php echo $id; ?>" />
            <?php
          }
        }
} else {
  echo "Invalid Email Address";
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
                      <label for="exampleInputEmail1">Name of Trainer :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name_trainer" value="<?php echo $name_trainer; ?>" placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Mobile No. of Trainer : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_trainer" value="<?php echo $mobile_trainer; ?>" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Email of Trainer : </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email_trainer" value="<?php echo $email_trainer; ?>"  placeholder="Email">
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Name of Co-Trainer : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name_cotrainer" value="<?php echo $name_cotrainer; ?>"  placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Mobile No. of Co-Trainer :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_cotrainer" value="<?php echo $mobile_cotrainer; ?>" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Email of Co-Trainer :</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email_cotrainer" value="<?php echo $email_cotrainer; ?>" placeholder="Email">
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
