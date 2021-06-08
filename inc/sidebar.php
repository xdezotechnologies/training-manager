<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php
$session_email=$_SESSION['email'];
$profileimg_query="SELECT * FROM tbl_users WHERE email='$session_email'";
$profileimg_result=mysqli_query($conn,$profileimg_query);
$profileimg_data=$profileimg_result->fetch_assoc();
$profileimg=$profileimg_data['image'];
         ?>
        <img src="<?php echo $profileimg; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['name']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Dashboard</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Trainees</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="trainees.php"><i class="fa fa-globe" aria-hidden="true"></i>All Trainees</a></li>
          <li><a href="addtrainee.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Trainee</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Trainers</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="trainers.php"><i class="fa fa-globe" aria-hidden="true"></i>All Trainers</a></li>
          <li><a href="addtrainer.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Trainer</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Events</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="events.php"><i class="fa fa-globe" aria-hidden="true"></i>All Events</a></li>
          <li><a href="addevent.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Events</a></li>
          <li><a href="event_calendar"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Event Calenders</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> <span>Notices</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="notices.php"><i class="fa fa-globe" aria-hidden="true"></i>All Notices</a></li>
          <li><a href="addnotice.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Notice</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> <span>Tasks</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="tasks.php"><i class="fa fa-globe" aria-hidden="true"></i>All Tasks</a></li>
          <li><a href="seentask.php"><i class="fa fa-eye" aria-hidden="true"></i>Seen Tasks</a></li>
          <li><a href="donetask.php"><i class="fa fa-check-circle" aria-hidden="true"></i>Done Tasks</a></li>
          <li><a href="addtask.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Task</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span>Attendance</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="attendance.php"><i class="fa fa-globe" aria-hidden="true"></i>All Attendance</a></li>
          <li><a href="addattendance.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Attendance</a></li>
        </ul>
      </li>
      <!-- <li class="treeview">
        <a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i> <span>Tests</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="taketest.php"><i class="fa fa-get-pocket" aria-hidden="true"></i>Take Test</a></li>
          <li><a href="testhistory.php"><i class="fa fa-history" aria-hidden="true"></i>Test History</a></li>
        </ul>
      </li> -->
      <li><a href="test"><i class="fa fa-rocket" aria-hidden="true"></i> <span>Test System</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Generate Certificate</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="certificates.php"><i class="fa fa-globe" aria-hidden="true"></i>All Certificate</a></li>
          <li><a href="generatecertificate.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Generate Certificate</a></li>
          <li><a href="recovery_certificate.php" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i>Preview Certificate</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span>Media (Files)</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="media.php"><i class="fa fa-globe" aria-hidden="true"></i>All Media</a></li>
          <li><a href="addmedia.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Media</a></li>
        </ul>
      </li>
      <li class="treeview active">
        <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span>File Manager</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="filemanager.php"><i class="fa fa-globe" aria-hidden="true"></i>All Files</a></li>
          <li><a href="sharefile.php"><i class="fa fa-share-alt-square" aria-hidden="true"></i>Share File</a></li>
          <li><a href="managefile.php"><i class="fa fa-share-alt-square" aria-hidden="true"></i>Manage File</a></li>
        </ul>
      </li>
      <!-- <li class="treeview">
        <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> <span>Test Questions</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="testquestions.php"><i class="fa fa-globe" aria-hidden="true"></i>All Test Questions</a></li>
          <li><a href="addtestquestion.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Test Question</a></li>
        </ul>
      </li> -->
      <!-- <li class="treeview">
        <a href="#"><i class="fa fa-sliders" aria-hidden="true"></i> <span>Question Set</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="questionsets.php"><i class="fa fa-globe" aria-hidden="true"></i>All Question Set</a></li>
          <li><a href="addquestionset.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Question Set</a></li>
        </ul>
      </li> -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
