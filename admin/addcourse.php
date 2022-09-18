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
                        <h4 class="text-center text-white bg-primary">Add Batches</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Course Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="enter Course Name" class="form-control"  required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">For Classs</label>
                            <div class="col-sm-10">
                                <Select class="form-control" name="class" required>
                                    <option value="1">Class 1</option>
                                    <option value="2">Class 2</option>
                                    <option value="3">Class 3</option>
                                    <option value="4">Class 4</option>
                                    <option value="5">Class 5</option>
                                    <option value="6">Class 6</option>
                                    <option value="7">Class 7</option>
                                    <option value="8">Class 8</option>
                                    <option value="9">Class 9</option>
                                    <option value="10">Class 10</option>
                                </Select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Batch Duration</label>
                            <div class="col-sm-10">
                                <input type="text" name="duration"  required placeholder="enter Batch Duration" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Fee</label>
                            <div class="col-sm-10">
                                <input type="text" name="fee"  required placeholder="enter Fee Amount" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Batch Start From</label>
                            <div class="col-sm-10">
                                <input type="date" name="date"  required  class="form-control">                            </div>
                        </div>



                        <div class="row form-group mt-1">

                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn  btn-outline-primary btn-block" name="submit" type="submit">Add Batches</button>
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
    $coursename = $_POST['name'];
    $class = $_POST['class'];
    $duration = $_POST['duration'];
    $coursefee = $_POST['fee'];
    $date = $_POST['date'];

    $addcourse = mysqli_query($conn, "insert into course (course_name, course_duration, course_fees, 
    course_start, class)
    values ('$coursename', '$duration', '$coursefee', '$date', '$class')");
    if ($addcourse  == true)
    {
        echo "<script>alert('Welcome, You have added course')</script>";
        echo "<script>window.open('course.php', '_self')</script>";
    }
}

?>