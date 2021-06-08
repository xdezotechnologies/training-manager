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
          Add Question
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add Question</a></li>
          </ol>
        </section>
<!-- When submit button is clicked -->
        <?php
if(isset($_POST['submit'])) {
  $name=$_POST['name'];
  $option1=$_POST['option1'];
  $option2=$_POST['option2'];
  $option3=$_POST['option3'];
  $option4=$_POST['option4'];
  $answer=$_POST['answer'];
  $questionset_id=$_POST['questionset_id'];
  if(isset($_POST['status']))
    {
        $status="active";
    }else{
        $status="deactive";
    }
  $submit=$_POST['submit'];

  if($name!="") {
      $query="INSERT INTO tbl_questions (name,option1,option2,option3,option4,answer,questionset_id,status) VALUES('$name','$option1','$option2','$option3','$option4','$answer','$questionset_id','$status')";
      $result=mysqli_query($conn,$query);

        if($result) {
          if($submit==0) {
              ?>
            <meta http-equiv = "refresh" content = "0; url = testquestions.php" />
              <?php
          }
          if($submit==1) {
            ?>
            <meta http-equiv = "refresh" content = "0; url = addtestquestion.php" />
            <?php
          }
        }
        else {
          ?>
          <meta http-equiv = "refresh" content = "0; url = addtestquestion.php?msg=error" />
          <?php
        }
      }
      else {
      echo "Event Title and Event Time is necessary";
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
                    <div class="form-group">
                      <label>Question Set</label>
                      <select class="form-control" name="questionset_id">
                        <option>Select</option>
                        <!-- Get all the active question sets -->
                        <?php
$questionset_query="SELECT * FROM tbl_questionsets WHERE status='active' AND deleted_at IS NULL";
$questionset_result=mysqli_query($conn,$questionset_query);
while ($data=mysqli_fetch_array($questionset_result)) {
  ?>
    <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
  <?php
}
                         ?>

                      </select>
                    </div>
                    <div class="form-group">
                      <label>Question Order</label>
                      <select class="form-control" name="question_order">
                        <option>Select</option>
                <?php
for ($i=1; $i <= 50; $i++) {
  ?>
    <option value="option1"><?php echo $i; ?></option>
    <?php
  }
        ?>
                        <option value="option2">option 2</option>
                        <option value="option3">option 3</option>
                        <option value="option4">option 4</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Question</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Your Question Here..." name="name"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Option 1</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="option1" placeholder="Enter Option 1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Option 2</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="option2" placeholder="Enter Option 2">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Option 3</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="option3" placeholder="Enter Option 3">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Option 4</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="option4" placeholder="Enter Option 4">
                    </div>
                    <div class="form-group">
                      <label>Correct Answer</label>
                      <select class="form-control" name="answer">
                        <option value="option1">option 1</option>
                        <option value="option2">option 2</option>
                        <option value="option3">option 3</option>
                        <option value="option4">option 4</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-md-12">Status : <span style="color:red;"> *</span></label>
                      <input type="checkbox" checked name="status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="0">Save</button>
                    <button type="submit" class="btn btn-secondary bg-black" name="submit" value="1">Save and Continue</button>
                    <a href="trainers.php"><button type="button" class="btn btn-danger" name="submit">Cancel</button></a>
                  </div>
                </form>
              </div>

        </section>
  </div>
<?php require('inc/footer.php'); ?>
