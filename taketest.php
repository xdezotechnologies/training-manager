<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Select Test Type
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Take Test</a></li>
      </ol>
    </section>


<?php
if(isset($_POST['submit'])) {
  $testtype=$_POST['testtype'];
  if($testtype=='pretest') {
    ?>
    <meta http-equiv = "refresh" content = "0; url = taketest1.php?testtype=pretest" />
    <?php
  }
  elseif($testtype=='posttest') {
    ?>
    <meta http-equiv = "refresh" content = "0; url = taketest1.php?testtype=posttest" />
    <?php
  }
  else {
    ?>
    <meta http-equiv = "refresh" content = "0; url = taketest1.php?testtype=practicetest" />
    <?php
  }
}

 ?>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
        <!-- form start -->
        <form class="" role="form" action="#" method="POST" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label>Test Type</label>
              <select class="form-control" name="testtype">
                <option>Select</option>
                <option value="pretest">Pre-Test</option>
                <option value="posttest">Post-Test</option>
                <option value="practicetest">Practice-Test</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="submit">Enter Test</button>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <?php require('inc/footer.php'); ?>
