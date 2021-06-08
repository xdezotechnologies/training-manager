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
          Question Sets
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Question Sets</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">


                <?php
 if(isset($_GET['data-show'])) {
   $info=$_GET['data-show'];
     if($info=='trashed') {
       ?>
   <div class="box-header">
     <div class="add_new col-md-11 col-sm-8 col-xs-8">
        &nbsp&nbsp<a href="questionsets.php"><button type="button" class="btn btn-success"><span><i class="fa fa-refresh" aria-hidden="true"></i> </span> &nbspActive Lists</button></a>
     </div>
   </div>
   <?php
$query="SELECT * FROM tbl_questionsets WHERE deleted_at IS NOT NULL";
}
} else {
$query="SELECT * FROM tbl_questionsets WHERE deleted_at IS NULL";
?>
     <div class="box-header">
     <div class="add_new col-md-11 col-sm-8 col-xs-8">
       <a href="addquestionset.php"><h3 class="box-title"><button type="button" class="btn btn-block btn-info"><span><i class="fa fa-plus" aria-hidden="true"></i>&nbsp</span> Add Notice</button></h3></a>
          &nbsp&nbsp<a href="questionsets.php"><button type="button" class="btn btn-success"><span><i class="fa fa-refresh" aria-hidden="true"></i> </span> &nbspRefresh</button></a>
     </div>
     <div class="see_trash col-md-1 col-sm-4 col-xs-4">
       <a href="questionsets.php?data-show=trashed"><h3 class="box-title"><button type="button" class="btn btn-block btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i>&nbsp</span> Trash</button></h3></a>
     </div>
   </div>
 <?php }
$result= mysqli_query($conn, $query);
 ?>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Question Set Name</th>
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
                      <td><?php echo $data['name']; ?></td>
                      <td><?php if($data['status']=='active') {  ?><i class="fa fa-toggle-on" aria-hidden="true"></i> Active <?php } else { ?> <i class="fa fa-toggle-off" aria-hidden="true"> Deactive</i><?php } ?></td>
                      <td>
                        <a href="viewquestionset.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button></a>
                          <?php
              if(isset($_GET['data-show'])) {
                $info=$_GET['data-show'];
                  if($info=='trashed') {
                    ?>

                        <a href="process/restorequestionset.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-info"><span><i class="fa fa-recycle" aria-hidden="true"></i></span></button></a>
                        <a href="#" data-toggle="modal" data-target="#modal-danger"><button type="button" class="btn btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i>&nbsp</span></button></a>
                                <!-- /.modal -->
                                          <div class="modal modal-danger fade" id="modal-danger">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title">Delete File</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Are you sure you want to premanently delete this file?</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                  <a href="process/deletequestionset.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-outline">Delete</button></a>
                                                </div>
                                              </div>
                                              <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                          </div>
                                          <!-- /.modal -->
                      <?php }} else {
                        ?>
                        <a href="editquestionset.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-info"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></button></a>
                        <a href="process/softdeletequestionset.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i>&nbsp</span></button></a>
                        <?php
                      } ?>
                      </td>
                    </tr>
                  <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>S.N.</th>
                      <th>Question Set Name</th>
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
