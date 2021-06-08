<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
$id=$_GET['id'];
$questionset_fetch_query="SELECT * FROM tbl_questionsets WHERE id='$id' ";
$questionset_fetch_result=mysqli_query($conn,$questionset_fetch_query);
$questionset_fetch_row=$questionset_fetch_result->fetch_assoc();
$name=$questionset_fetch_row['name'];
$status=$questionset_fetch_row['status'];
?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Edit Question Set
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Edit Question Set</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $name=$_POST['name'];
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

  if($name!="") {
      $query="UPDATE tbl_questionsets SET name='$name', status='$status' WHERE id='$id'";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = questionsets.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addquestionset.php" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = addquestionset.php?msg=error" />
          <?php
        }
      }
      else {
      echo "Question Set Name is necessary !!!";
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
                    <div class="form-group col-md-9">
                      <label for="exampleInputEmail1">Question Set Name :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $name; ?>" placeholder="Enter Question Set Name">
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
                    <a href="trainers.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
