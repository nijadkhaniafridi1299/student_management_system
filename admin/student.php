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
    $delstudent = mysqli_query($conn, "delete from stuent where id = '$del_id'");
    if ($delstudent == true)
    {
        echo "<script>alert('You have Deleted Successfully')</script>";
        echo "<script>window.open('student.php', '_self')</script>";
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
                    <h4 class="text-center text-white bg-primary">View All Students</h4>
                    <div align="right">
                        <a href="addstudent.php" class="btn btn-outline-primary">Add Student</a>
                        <hr>
                    </div>
                    <table class="table table-bordered " id="table2excel">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Sr No</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Batch</th>
                            <th>Image</th>
                            <th><i class="fa fa-eye"></i></th>
                            <th><i class="fa fa-pencil-square-o"></i></th>
                            <th><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <?php
                        include "inc/dbcon.php";
                        $student= mysqli_query($conn, "select * from student order by id desc");
                        $i = 0;
                        while ($rowstudent = mysqli_fetch_assoc($student))
                        {
                            $id = $rowstudent['id'];
                            $name = $rowstudent['student_name'];
                            $class = $rowstudent['class'];
                            $batch = $rowstudent['batch'];
                            $image = $rowstudent['image'];
                            $course = mysqli_query($conn, "select * from course where course_id = '$batch'");
                            $rowcourse = mysqli_fetch_assoc($course);
                            $course_id = $rowcourse['course_id'];
                            $course_name = $rowcourse['course_name'];

                            ?>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $class;?></td>
                            <td><?php echo  $course_name ;?></td>
                            <td><img src="images/student/<?php echo $image;?>" alt="" width="100px" height="100px"></td>
                            <td><a href="studentdetail.php?id=<?php echo $id;?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                            <td><a href="editstudent.php?id=<?php echo $id;?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="student.php?del=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

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