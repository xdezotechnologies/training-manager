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
          File Manager
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">File Manager</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <?php
$files_query="SELECT * FROM tbl_filemanager";
$files_result=mysqli_query($conn,$files_query);
while ($data_file=mysqli_fetch_array($files_result)) {
?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $data_file['filetype']; ?></h3>

      <p><?php echo $data_file['filename']; ?></p>
    </div>
    <div class="icon">
      <?php
      $filetype_now=$data_file['filetype'];
      if($filetype_now=='image') {
        ?>
        <i class="fa fa-picture-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='audio') {
      ?>
        <i class="fa fa-file-audio-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='video') {
      ?>
      <i class="fa fa-file-video-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='word') {
      ?>
      <i class="fa fa-file-word-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='powerpoint') {
      ?>
      <i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='pdf') {
      ?>
      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='text') {
      ?>
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='zip') {
      ?>
      <i class="fa fa-file-archive-o" aria-hidden="true"></i>
        <?php
      } elseif($filetype_now=='excel') {
      ?>
      <i class="fa fa-file-excel-o" aria-hidden="true"></i>
        <?php
      } else {
      ?>
      <i class="fa fa-file" aria-hidden="true"></i>
        <?php
      }
      ?>

    </div>
    <a href="<?php echo "http://localhost/training_manager/filemanager/".$data_file['filelink']; ?>" class="small-box-footer" target="_blank">Download File &nbsp&nbsp<i class="fa fa-download" aria-hidden="true"></i></a>
  </div>
</div>
<?php
}
?>
            <!-- ./col -->
          </div>

    </section>
  </section>
  </div>
<?php require('inc/footer.php'); ?>
