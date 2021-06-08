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
          Share File
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Share File</a></li>
          </ol>
        </section>
        <?php
if(isset($_POST['submit'])) {
    $filetype=$_POST['filetype'];
    $filename=$_POST['filename'];
    $status=$_POST['status'];
    if($filetype!="" AND $filename!="") {
      if(!($_FILES['dataFile']['error'] )) {
          require('process/fileupload.php');
                  if ($filesize<1000000) {
                  if ($extention=='jpg' || $extention=='png' || $extention=='gif' || $extention=='jpeg'
                  || $extention=='tif' || $extention=='PNG' || $extention=='GIF' || $extention== 'JPEG' ||
                   $extention=='TIF' || $extention=='$JPG' || $extention=='jpg' || $extention=='txt' || $extention=='docx' || $extention=='TXT' || $extention=='DOCX'
                 || $extention=='zip' || $extention=='ZIP' || $extention=='xlsx' || $extention=='XLSX' || $extention=='csv' || $extention=='CSV' || $extention=='pptx'
                || $extention=='pptx' || $extention=='mp3' || $extention=='MP3' || $extention=='MP4' || $extention=='mp4' || $extention=='xls' || $extention=='XLS' || $extention=='pdf'
              || $extention=='PDF') {
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], "filemanager/".$finalfile))
                    {
                $query="INSERT INTO tbl_filemanager (filetype,filename,filelink,status) VALUES('$filetype','$filename','$finalfile','$status')";
                $result=mysqli_query($conn,$query);

                  if($result) {
                      ?>
                      <meta http-equiv = "refresh" content = "0; url = managefile.php" />
                      <?php
                }
                else {
                  ?>
                  <meta http-equiv = "refresh" content = "0; url = sharefile.php?msg='error' "/>
                  <?php
                }
            }
            else {
              echo "Error in uploading.";
            }
          }
              else {
                echo "File Extension Not Supported";
              }
            }
          else {
            echo "File size exceeded.";
          }
        }
        else {
          echo "File is necessary.";
        }
      }
      else {
        echo "File Type and File Name fields are necessary.";
      }
    }
 ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="box box-primary">
              <!-- /.box-header -->
              <!-- form start -->
              <form class="" action="#" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                      <label>File Type <span style="color:red;"> *</span></label>
                      <select class="form-control" name="filetype">
                        <option>Select</option>
                        <option value="image">Image File</option>
                        <option value="text">Text File</option>
                        <option value="word">Word File</option>
                        <option value="powerpoint">Powerpoint File</option>
                        <option value="excel">Excel File</option>
                        <option value="pdf">PDF File</option>
                        <option value="audio">Audio File</option>
                        <option value="video">Video File</option>
                        <option value="zip">Zip File</option>
                        <option value="other">Other File</option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">File Name <span style="color:red;"> *</span></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="File Name" name="filename">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload File <span style="color:red;"> *</span></label>
                    <input type="file" id="exampleInputFile" name="dataFile">
                  </div>
                  <div class="form-group col-md-3">
                    <label class="col-md-12">Status :   </label>
                    <input type="checkbox" checked name="status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>

    </section>
  </section>
  </div>
<?php require('inc/footer.php'); ?>
