<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");

}
?>
<?php  require_once "inc/top.php"; ?>
<?php
if (isset($_GET['id']))
{
    $id = $_GET['id'];
}
?>
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
                    <h4 class="text-center text-white bg-primary">Student Details Attendance</h4>
                    <hr>
                    <a href="course.php" class="btn btn-info">Back To Home</a>
                </div>
            </div>
            <div class="row">
                <?php
                include "inc/dbcon.php";
                $attendance = mysqli_query($conn, "select * from attandence where studentid = '$id' order by attid");
                 while ($row_attendence = mysqli_fetch_assoc($attendance))
                 {

                     $studentid= $row_attendence['studentid'];
                     $attendance = $row_attendence['attendance'];
                     $date= $row_attendence['date'];
                     $date = date('Y-m-d', strtotime($date));
                     ?>
                     <div class="col-md-2" style="border: 1px solid gray">
                         <?php echo $date;?>
                         <small class="<?php echo ($attendance == 'present')? "text-primary" : "text-danger" ?>">
                             <?php echo $attendance;?>
                         </small>
                     </div>
                <?php
                 }
                ?>

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
