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
          Seen Tasks
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Seen Tasks</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
               <div class="box-header">
                   <div class="add_new col-md-11 col-sm-8 col-xs-8">
                     <a href="tasks.php"><h3 class="box-title"><button type="button" class="btn btn-block btn-info"><span><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp</span> All Tasks</button></h3></a>
                     &nbsp&nbsp<a href="seentask.php"><h3 class="box-title"><button type="button" class="btn btn-block btn-info"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp</span> Seen Tasks</button></h3></a>
                     &nbsp&nbsp<a href="donetask.php"><h3 class="box-title"><button type="button" class="btn btn-block btn-info"><span><i class="fa fa-check" aria-hidden="true"></i>&nbsp</span> Done Tasks</button></h3></a>
                        &nbsp&nbsp<a href="seentask.php"><button type="button" class="btn btn-success"><span><i class="fa fa-refresh" aria-hidden="true"></i> </span> &nbspRefresh</button></a>
                   </div>
                    </div>
<?php
 $query="SELECT * FROM tbl_tasks WHERE t_status='seen' AND deleted_at IS NULL";
$result= mysqli_query($conn, $query);
 ?>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Title</th>
                      <th>Assigned Date</th>
                      <th>Assigned By</th>
                      <th>Assigned To</th>
                      <th>Timeline</th>
                      <th>Task Status</th>
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
                      <td><?php echo $data['title']; ?></td>
                      <td><?php echo $data['a_date']; ?></td>
                      <td><?php echo $data['a_by']; ?></td>
                      <td><?php echo $data['a_to']; ?></td>
                      <td><?php echo $data['timeline']; ?></td>
                      <td><?php echo $data['t_status']; ?></td>
                      <td>
                        <a href="viewtask.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i> View</span></button></a>
                          <?php
              if(isset($_GET['data-show'])) {
                $info=$_GET['data-show'];
                  if($info=='trashed') {
                    ?>

                        <a href="process/restoretask.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-info"><span><i class="fa fa-recycle" aria-hidden="true"></i></span></button></a>
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
                                                  <a href="process/deletetask.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-outline">Delete</button></a>
                                                </div>
                                              </div>
                                              <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                          </div>
                                          <!-- /.modal -->
                      <?php }} else {
                        ?>
                        <a href="process/donetask.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary"><span><i class="fa fa-check-square-o" aria-hidden="true"></i> Done</span></button></a>
                        <?php
                      } ?>
                      </td>
                    </tr>
                  <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>S.N.</th>
                      <th>Title</th>
                      <th>Assigned Date</th>
                      <th>Assigned By</th>
                      <th>Assigned To</th>
                      <th>Timeline</th>
                      <th>Task Status</th>
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
