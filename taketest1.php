<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
if(isset($_GET['testtype'])) {
  $testtype=$_GET['testtype'];
}

     ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Select Question Set
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Select Question Set</a></li>
      </ol>
    </section>


<?php
if(isset($_GET['submit'])) {
  $questionset_id=$_GET['questionset_id'];
  $question_order=1;
  ?>
    <meta http-equiv = "refresh" content = "0; url = questions.php?question_set=<?php echo $questionset_id; ?>&question_order=<?php echo $question_order; ?>" />
  <?php
}

 ?>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label>Question Set</label>
              <select class="form-control" name="questionset_id">
               <option>Select</option>
                <?php
$questionset_query="SELECT * FROM tbl_questionsets WHERE status='active' AND deleted_at IS NULL AND testtype='$testtype'";
$questionset_result=mysqli_query($conn,$questionset_query);
while ($data=mysqli_fetch_array($questionset_result)) {
  ?>
 <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
  <?php
}
                 ?>
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
