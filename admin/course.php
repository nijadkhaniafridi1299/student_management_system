<?php
include "inc/dbcon.php";
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");

}
if (isset($_GET['del']))
{
    $del_id = $_GET['del'];
    $delcourse = mysqli_query($conn, "delete from course where course_id  = '$del_id'");
    if ($delcourse == true)
    {
        echo "<script>alert('You have Deleted Successfully')</script>";
        echo "<script>window.open('course.php', '_self')</script>";
    }
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
                    <h4 class="text-center text-white bg-primary">View All Batches</h4>
                    <div align="right">
                        <a href="addcourse.php" class="btn btn-outline-primary">Add Batches</a>
                        <hr>
                    </div>
                    <table class="table table-bordered " id="table2excel">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Sr No</th>
                            <th>Course Name</th>
                            <th>For Class</th>
                            <th>Duration</th>
                            <th>Course Fee</th>
                            <th>No Of Student</th>
                            <th>Batch Start</th>
                            <th><i class="fa fa-eye"></i></th>
                            <th><i class="fa fa-pencil-square-o"></i></th>
                            <th><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <?php
                        include "inc/dbcon.php";
                        $Course= mysqli_query($conn, "select * from course order by course_id");
                        $i = 0;
                        while ($rowCourse = mysqli_fetch_assoc($Course))
                        {
                            $id = $rowCourse['course_id'];
                            $course_name = $rowCourse['course_name'];
                            $course_duration = $rowCourse['course_duration'];
                            $course_fees = $rowCourse['course_fees'];
                            $course_start = $rowCourse['course_start'];
                            $class = $rowCourse['class'];
                            $list = mysqli_query($conn, "select * from student where batch = '$id'");
                            $rowlist = mysqli_num_rows($list);


                            ?>
                          <tr>
                              <td><?php echo $i++;?></td>
                              <td><?php echo $course_name;?></td>
                              <td><?php echo $class;?></td>
                              <td><?php echo $course_duration;?></td>
                              <td><?php echo $course_fees  ;?></td>
                              <td><?php echo $rowlist ;?></td>
                              <td><?php echo $course_start ;?></td>
                              <td><a href="viewcourse.php?id=<?php echo $id;?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                              <td><a href="editcourse.php?id=<?php echo $id;?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a></td>
                              <td><a href="course.php?del=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

                          </tr>
                            <?php
                        }
                        ?>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <button type="submit" id="btn" class="btn btn-danger offset-md-4">Export To Excell</button>



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
<script>
    $(document).ready(function () {
        $('#table2excel').DataTable();
    });
</script>
<script>
    $('#btn').click(function () {
        $('#table2excel').Iabletoexcel({
            name:"Worksheet name",
            filename:"galllery.xls"
        });
    });
</script>