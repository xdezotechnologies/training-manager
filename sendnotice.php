<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <?php
    $id=$_GET['id'];
    $notice_fetch_query="SELECT * FROM tbl_notices WHERE id='$id' ";
    $notice_fetch_result=mysqli_query($conn,$notice_fetch_query);
    $notice_fetch_row=$notice_fetch_result->fetch_assoc();
    $title=$notice_fetch_row['title'];
    $n_date=$notice_fetch_row['n_date'];
    $des=$notice_fetch_row['des'];
    $status=$notice_fetch_row['status'];
    ?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Send Notice
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Send Notice</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $to=$_POST['to'];
  $subject=$_POST['title'];
  $message=$_POST['des'];

  $send_notice=mail($to,$subject,$message);
  if($send_notice==true) {
    echo "Notice Sent Successfully...";
  }
  else {
    echo "Message Could not be sent...";
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
                      <label for="exampleInputEmail1">Email :<span style="color:red;"> *</span></label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="to" placeholder="To:">
                    </div>
                    <div class="form-group col-md-9">
                      <label for="exampleInputEmail1">Subject :<span style="color:red;"> *</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php echo $title; ?>" placeholder="Enter Notice Title">
                    </div>
                    <div class="form-group col-md-9">
                      <label>Description</label>
                      <textarea class="form-control" rows="8" placeholder="Enter ..." name="des"><?php echo $des.nl2br("\nNotice Date is:").$n_date; ?></textarea>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="0"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp&nbspSend</button>
                    <a href="notices.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
