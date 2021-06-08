<?php require('inc/toppart.php'); ?>
  <!-- Main Header -->
<?php require('inc/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
if(isset($_GET['question_set'])) {
  $questionset_id=$_GET['question_set'];
  $question_order=$_GET['question_order'];
  $answer_query="SELECT answer FROM tbl_questions WHERE questionset_id='$questionset_id'";
  $answer_result=mysqli_query($conn,$answer_query);
  $data_answer=$answer_result->fetch_assoc();
  $answer=$data_answer['answer'];
}
     ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3 class="text-warning">
         Note: Your Test has started. Choose the correct Option only.
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Test Question</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- form start -->

              <!-- Getting data and sending to qutestion 2 -->
              <?php
      if(isset($_POST['submit'])) {
          $optionsRadios=$_POST['optionsRadios'];
          if($optionsRadios==$answer) {
            if($question_order==1) {
              $marks=1;
            }
            else {
              $marks_query="SELECT marks FROM tbl_testtaken WHERE std_id=64 AND questionset_id=$questionset_id";
              $marks_result=mysqli_query($conn,$marks_query);
              $data_marks=$marks_result->fetch_assoc();
              $e_marks=$data_marks['marks'];
              $marks=$e_marks+1;
            }
            $marks_insert_query="INSERT INTO tbl_testtaken (std_id,questionset_id,marks,status) VALUES ('64','$questionset_id','$marks','active')";
            $marks_insert_result=mysqli_query($conn,$marks_insert_query);
            $question_order=$question_order+1;
            ?>
            <meta http-equiv = "refresh" content = "0; url = questions.php?question_set=<?php echo $questionset_id; ?>&question_order=<?php echo $question_order; ?>" />
            <?php
          }

      }


               ?>
               <form class="role" action="#" method="POST">
                 <?php
                 $sn=0;
                 $questions_query="SELECT * FROM tbl_questions WHERE status='active' AND deleted_at IS NULL AND questionset_id='$questionset_id' AND question_order='$question_order'";
                 $questions_result=mysqli_query($conn,$questions_query);
                 $questions=$questions_result->fetch_assoc();
                 $sn=$sn+1;
                   ?>
                 <div class="callout callout-info">
                     <h3>Question <?php echo $sn; ?> : <?php echo $questions['name']; ?> ?</h3>
                 </div>

                 <div class="box-body">
                       <div class="form-group">
                           <div class="radio  col-md-6">
                               <label style="font-size:15px;">
                                 <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                   <?php echo $questions['option1']; ?>
                               </label>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="radio  col-md-6">
                               <label>
                                 <input type="radio" name="optionsRadios" id="optionsRadios1" value="option2">
                                   <?php echo $questions['option2']; ?>
                                 </label>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="radio  col-md-6">
                               <label>
                                 <input type="radio" name="optionsRadios" id="optionsRadios1" value="option3">
                                   <?php echo $questions['option3']; ?>
                                 </label>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="radio  col-md-6">
                               <label>
                                 <input type="radio" name="optionsRadios" id="optionsRadios1" value="option4">
                                   <?php echo $questions['option4']; ?>
                                 </label>
                           </div>
                       </div>
                 </div>
                 <div class="box-footer">
                   <button type="submit" class="btn btn-primary" name="submit">Submit Your Answer</button>
                 </div>
               </form>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <?php require('inc/footer.php'); ?>
