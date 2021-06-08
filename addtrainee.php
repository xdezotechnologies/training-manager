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
          Add Trainee
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Trainee</a></li>
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
      $query="INSERT INTO tbl_trainees (name,name_clientorg,position,workplace,mobile,email,training_title,no_td,duration,venue,pretest,posttest) VALUES('$name','$name_clientorg','$position','$workplace','$mobile','$email','$training_title','$no_td','$duration','$venue','$pretest','$posttest')";
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
                          <form class="form-horizontal" action="process/importtrainees.php"  method="post" enctype="multipart/form-data" name="upload_excel">
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
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Name of Trainee : <span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Name of Trainee">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Name of Client Organization : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name_clientorg" placeholder="Name of Client Organization">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Position : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="position"  placeholder="Position">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Place of Work / District : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="workplace"  placeholder="Place of Work">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Mobile :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mobile" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Email : </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                    </div>
                    <div class="form-group  col-md-3">
                      <label for="exampleInputEmail1">Training Title : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="training_title" placeholder="Title">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">No. of Training Days :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="no_td" placeholder="No. of Training Days">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Training Duration :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="duration" placeholder="Training Duration">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Venue :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="venue" placeholder="Venue">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Pre Test :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="pretest" placeholder="Pre Test">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Post Test :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="posttest" placeholder="Post Test">
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
