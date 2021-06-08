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
          Verifications Code
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Verifications Code</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">


                <?php
$query="SELECT * FROM tbl_user_verifications WHERE deleted_at IS NULL";
?>
     <div class="box-header">
     <div class="add_new col-md-11 col-sm-8 col-xs-8">
       <a href="addverifications_code.php"><h3 class="box-title"><button type="button" class="btn btn-block btn-info"><span><i class="fa fa-plus" aria-hidden="true"></i>&nbsp</span> Add Verification Code</button></h3></a>
          &nbsp&nbsp<a href="verifications_code.php"><button type="button" class="btn btn-success"><span><i class="fa fa-refresh" aria-hidden="true"></i> </span> &nbspRefresh</button></a>
     </div>
   </div>
 <?php
$result= mysqli_query($conn, $query);
 ?>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Verification Code</th>
                      <th>User Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
$sn=0;
while ($data=mysqli_fetch_array($result)) {
  $sn=$sn+1;
 ?>
                    <tr>
                      <td><?php echo $sn; ?></td>
                      <td><?php echo $data['ver_code']; ?></td>
                      <td><?php echo $data['user_type']; ?></td>
                      <td><?php echo $data['status']; ?></td>
                      <td>
                        <a href="process/deleteverifications_code.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></button></a>
                      </td>
                    </tr>
                  <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>S.N.</th>
                      <th>Verification Code</th>
                      <th>User Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>

    </section>
  </div>
<?php require('inc/footer.php'); ?>
