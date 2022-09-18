<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");


}
include "inc/dbcon.php";
error_reporting(0);
if ($_GET['id']) {
    $id = $_GET['id'];


    $upcourse = mysqli_query($conn, "select * from course where course_id = '$id'");
    $row = mysqli_fetch_assoc($upcourse);
    $course_id  = $row['course_id '];
    $course_name= $row['course_name'];
    $course_duration= $row['course_duration'];
    $course_fees= $row['course_fees'];
    $course_start= $row['course_start'];
    $class= $row['class'];

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
                        <h4 class="text-center text-white bg-primary">Edit Course</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Course Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="<?php echo $course_name;?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">For Classs</label>
                            <div class="col-sm-10">
                                <Select class="form-control" name="class" required>
                                    <option value="1"<?php if ($class == '1'){ echo "selected";} ?>>Class 1</option>
                                    <option value="2" <?php if ($class == '2'){ echo "selected";} ?>>Class 2</option>
                                    <option value="3"<?php if ($class == '3'){ echo "selected";} ?>>Class 3</option>
                                    <option value="4"<?php if ($class == '4'){ echo "selected";} ?>>Class 4</option>
                                    <option value="5"<?php if ($class == '5'){ echo "selected";} ?>>Class 5</option>
                                    <option value="6"<?php if ($class == '6'){ echo "selected";} ?>>Class 6</option>
                                    <option value="7"<?php if ($class == '7'){ echo "selected";} ?>>Class 7</option>
                                    <option value="8"<?php if ($class == '8'){ echo "selected";} ?>>Class 8</option>
                                    <option value="9"<?php if ($class == '9'){ echo "selected";} ?>>Class 9</option>
                                    <option value="10"<?php if ($class == '10'){ echo "selected";} ?>>Class 10</option>
                                </Select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Batch Duration</label>
                            <div class="col-sm-10">
                                <input type="text" name="duration"  required value="<?php echo $course_duration;?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Fee</label>
                            <div class="col-sm-10">
                                <input type="text" name="fee"  required value="<?php echo $course_fees;?>" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Batch Start From</label>
                            <div class="col-sm-10">
                                <input type="date" name="date"  required  class="form-control" value="<?php echo $course_start;?>">                            </div>
                        </div>



                        <div class="row form-group mt-1">

                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn  btn-outline-primary btn-block" name="update" type="submit">Edit Batches</button>
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
if (isset($_POST['update']))
{
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
   $coursename = $_POST['name'];

    $class = $_POST['class'];
    $duration = $_POST['duration'];
    $coursefee = $_POST['fee'];
    $date = $_POST['date'];

    $update_course= mysqli_query($conn, "update course set 
     course_name = '$coursename', 
     course_duration = '$duration',
     course_fees = '$coursefee',
     course_start = '$date',
     class = '$class' 
     where course_id  = '$id'");
    if ($update_course == true)
    {
        echo "<script>alert('Welcome, You have Updated course Records')</script>";
        echo "<script>window.open('course.php', '_self')</script>";
    }
}

?>