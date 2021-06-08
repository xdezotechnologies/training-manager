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
          Add Trainer
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Trainer</a></li>
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

  if($name_trainer!="") {
    if (filter_var($email_trainer, FILTER_VALIDATE_EMAIL) AND filter_var($email_cotrainer, FILTER_VALIDATE_EMAIL)) {
      $query="INSERT INTO tbl_trainers (name_trainer,mobile_trainer,email_trainer,name_cotrainer,mobile_cotrainer,email_cotrainer) VALUES('$name_trainer','$mobile_trainer','$email_trainer','$name_cotrainer','$mobile_cotrainer','$email_cotrainer')";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = trainers.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addtrainer.php" />
            <?php
          }
        }
      }
} else {
  echo "Invalid Email Address";
}
}
         ?>

        <!-- Main content -->
        <section class="content">
          <div class="box-header">
            <div class="add_new col-md-11 col-sm-8 col-xs-8">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp  Import
              </button>
            </div>
          </div>
<!-- modal when Import is clicked -->
              <div class="modal modal-info fade" id="modal-info">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Import CSV file (Excel File)</h4>
                    </div>
                    <div class="modal-body">
                      <p>Only CSV file with the proper data format will be imported otherwise discarded.&hellip;</p>
                    </div>
                    <div class="modal-footer">
                          <form class="form-horizontal" action="process/importtrainers.php"  method="post" enctype="multipart/form-data" name="upload_excel">
                            <fieldset>
                              <div class="control-group col-md-12">
                                <div class="controls">
                                  <input type="file" name="file" id="file" class="input-large">
                                </div>
                              </div>
                              <div class="control-group col-md-12">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Save</button>
                                </div>
                              </div>
                            </fieldset>
                        </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
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
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name_trainer" placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Mobile No. of Trainer : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_trainer" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Email of Trainer : </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email_trainer"  placeholder="Email">
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Name of Co-Trainer : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name_cotrainer"  placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Mobile No. of Co-Trainer :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_cotrainer" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Email of Co-Trainer :</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email_cotrainer" placeholder="Email">
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
