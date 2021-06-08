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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Trainers</span>
              <?php
                  $totaltrainers_query="SELECT COUNT(*) as totaltrainers FROM tbl_trainers WHERE deleted_at IS NULL";
                  $totaltrainers_result=mysqli_query($conn,$totaltrainers_query);
                  $data_totaltrainers=mysqli_fetch_assoc($totaltrainers_result);
               ?>
              <span class="info-box-number"><?php echo $data_totaltrainers['totaltrainers']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Trainees</span>
              <?php
                  $totaltrainees_query="SELECT COUNT(*) as totaltrainees FROM tbl_trainees WHERE deleted_at IS NULL";
                  $totaltrainees_result=mysqli_query($conn,$totaltrainees_query);
                  $data_totaltrainees=mysqli_fetch_assoc($totaltrainees_result);
               ?>
              <span class="info-box-number"><?php echo $data_totaltrainees['totaltrainees']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-question-circle" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Questions</span>
              <?php
                  $totalquestions_query="SELECT COUNT(*) as totalques FROM tbl_ques";
                  $totalquestions_result=mysqli_query($conn,$totalquestions_query);
                  $data_totalquestions=mysqli_fetch_assoc($totalquestions_result);
               ?>
              <span class="info-box-number">Not Available</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-question-circle" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Question Sets</span>
              <span class="info-box-number">Not Available</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-tasks" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Tasks</span>
              <?php
                  $totaltasks_query="SELECT COUNT(*) as totaltasks FROM tbl_tasks WHERE deleted_at IS NULL";
                  $totaltasks_result=mysqli_query($conn,$totaltasks_query);
                  $data_totaltasks=mysqli_fetch_assoc($totaltasks_result);
               ?>
              <span class="info-box-number"><?php echo $data_totaltasks['totaltasks']; ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-eye" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Seen Tasks</span>
              <?php
                  $totalseentask_query="SELECT COUNT(*) as totalseentasks FROM tbl_tasks WHERE t_status='seen' AND deleted_at IS NULL";
                  $totalseentask_result=mysqli_query($conn,$totalseentask_query);
                  $data_totalseentask=mysqli_fetch_assoc($totalseentask_result);
               ?>
              <span class="info-box-number"><?php echo $data_totalseentask['totalseentasks']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check-circle" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Done Tasks</span>
              <?php
                  $totaldonetask_query="SELECT COUNT(*) as totaldonetasks FROM tbl_tasks WHERE t_status='done' AND deleted_at IS NULL";
                  $totaldonetask_result=mysqli_query($conn,$totaldonetask_query);
                  $data_totaldonetask=mysqli_fetch_assoc($totaldonetask_result);
               ?>
              <span class="info-box-number"><?php echo $data_totaldonetask['totaldonetasks']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Events</span>
              <?php
                  $totalevents_query="SELECT COUNT(*) as totalevents FROM tbl_events WHERE status='active' AND deleted_at IS NULL";
                  $totalevents_result=mysqli_query($conn,$totalevents_query);
                  $data_totalevents=mysqli_fetch_assoc($totalevents_result);
               ?>
              <span class="info-box-number"><?php echo $data_totalevents['totalevents']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row col-md-12">
        <!-- TO DO List -->
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">Top Notices</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list">
<?php
$notice_query="SELECT * FROM tbl_notices WHERE deleted_at IS NULL AND status='active' ORDER BY id DESC LIMIT 5";
$notice_result=mysqli_query($conn,$notice_query);
while ($data_notice=mysqli_fetch_array($notice_result)) {
?>
<li>
  <!-- drag handle -->
  <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
  <!-- checkbox -->
  <!-- todo text -->
  <span class="text"><?php echo $data_notice['title']; ?></span>
  <!-- Emphasis label -->
  <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $data_notice['n_date']; ?></small>
  <!-- General tools such as edit or delete-->
  <div class="tools">
    <a href="editnotice.php?id=<?php echo $data_notice['id']; ?>"><i class="fa fa-edit"></i></a>
    <a href="process/softdeletenotice.php?id=<?php echo $data_notice['id']; ?>"><i class="fa fa-trash-o"></i></a>
  </div>
</li>
<?php
}
 ?>
<!--
              <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                <input type="checkbox" value="">
                <span class="text">Make the theme responsive</span>
                <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                <div class="tools">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-trash-o"></i>
                </div>
              </li>
              <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                <input type="checkbox" value="">
                <span class="text">Let theme shine like a star</span>
                <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                <div class="tools">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-trash-o"></i>
                </div>
              </li>
              <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                <input type="checkbox" value="">
                <span class="text">Let theme shine like a star</span>
                <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                <div class="tools">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-trash-o"></i>
                </div>
              </li>
              <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                <input type="checkbox" value="">
                <span class="text">Check your messages and notifications</span>
                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                <div class="tools">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-trash-o"></i>
                </div>
              </li>
              <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                <input type="checkbox" value="">
                <span class="text">Let theme shine like a star</span>
                <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                <div class="tools">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-trash-o"></i>
                </div>
              </li> -->
            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix no-border">
            <a href="#see_latest_events"> <button type="button" class="btn btn-primary pull-left"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> &nbsp See Latest Events</button></a>
            <a href="addnotice.php"> <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Notice</button></a>
          </div>
        </div>
        <!-- /.box -->

      </div>

      <div class="row col-md-12" id="see_latest_events">
         <iframe src="http://localhost/training_manager/event_calendar/" height="700px;" width="100%;"></iframe>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <?php require('inc/footer.php'); ?>
