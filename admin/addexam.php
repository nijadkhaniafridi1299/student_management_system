<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");

}
?>
<?php  require_once "inc/top.php"; ?>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-12">
                <?php include "inc/nav.php"?>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-3">
                <?php include 'inc/sibe_bar.php'?>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <img src="images/logo.jpg" class="img-fluid" style="height: 100px"/>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center text-white bg-primary">Create Exam</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">For Classs</label>
                            <div class="col-sm-10">
                                <Select class="form-control" name="class1" id="class" required>
                                   <?php
                                    for ($i=1; $i<=10; $i++)
                                    {
                                        echo "<option value='$i'>Class $i</option>";
                                    }
                                   ?>
                                </Select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">For Batch</label>
                            <div class="col-sm-10">
                                <Select class="form-control" name="batch" id="batch" >

                                </Select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Subject</label>
                            <div class="col-sm-10">
                                <input type="text" name="sub"  required placeholder="enter Your Subject" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Total Marks</label>
                            <div class="col-sm-10">
                                <input type="text" name="tmarks"  required  class="form-control"  placeholder="enter Total Marks">                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Exam Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date"  required  class="form-control">
                            </div>
                        </div>



                        <div class="row form-group mt-1">

                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn  btn-outline-primary btn-block" name="submit" type="submit">Create Exam</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-2 bg-dark">
                <?php include "inc/footer.php"?>
            </div>
        </div>

    </div>
    </body>
    </html>
<?php
include "inc/dbcon.php";
if (isset($_POST['submit']))
{
    $class1 = $_POST['class1'];
    $batch= $_POST['batch'];
    $sub = $_POST['sub'];
    $tmarks= $_POST['tmarks'];
    $date = $_POST['date'];

    $addexam = mysqli_query($conn, "insert into exam (batchname, date, subject, 
    class, total_marks)
    values ('$batch', '$date', '$sub', '$class1', '$tmarks')");
    if ($addexam  == true)
    {
        echo "<script>alert('Welcome, You have Created Exam')</script>";
        echo "<script>window.open('exam.php', '_self')</script>";
    }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#class').change(function () {
           var id = $(this).val();
            $.ajax({
             url: "fetchbatch.php",
              method: "POST",
             data:{
              id: id
              },
            dataType: "text",
            success: function (data) {
                $('#batch').html(data);
           }

          });
      });
    });
</script>
