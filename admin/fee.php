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
    $delstudent = mysqli_query($conn, "delete from fee where id = '$del_id'");
    if ($delstudent == true)
    {
        echo "<script>alert('You have Deleted Successfully')</script>";
        echo "<script>window.open('fee.php', '_self')</script>";
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
                    <h4 class="text-center text-white bg-primary">View All Fees Paid Details</h4>

                    <table class="table table-bordered " id="table2excel">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Sr No</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Batch</th>
                            <th>Amount</th>
                            <th>Vouchar</th>
                            <th>Date</th>
                            <th><i class="fa fa-trash-o"></i></th>

                        </tr>
                        </thead>
                        <?php
                        include "inc/dbcon.php";
                        $fee= mysqli_query($conn, "select * from fee order by id desc");
                        $i = 0;
                        while ($rowfee= mysqli_fetch_assoc($fee))
                        {
                            $id = $rowfee['id'];
                            $studentid = $rowfee['studentid'];
                            $classid= $rowfee['classid'];
                            $batchid = $rowfee['batchid'];
                            $fees = $rowfee['fees'];
                            $rno = $rowfee['rno'];
                            $date = $rowfee['date'];
                            $list = mysqli_query($conn, "select * from student where id = '$studentid '");
                            $rowList = mysqli_fetch_assoc($list);
                            $name =   $rowList['student_name'];
                            $batch = mysqli_query($conn, "select * from course where course_id = '$batchid'");
                            $rowbatch = mysqli_fetch_assoc($batch);
                            $course_name = $rowbatch['course_name'];
                            ?>
                            <td><?php echo $i++;?></td>
                            <td><?php echo ucfirst($name);?></td>
                            <td><?php echo $classid;?></td>
                            <td><?php echo $course_name;?></td>
                            <td><?php echo $fees;?></td>
                            <td><?php echo $rno;?></td>
                            <td><?php echo $date;?></td>

                            <td><a href="fee.php?del=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

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