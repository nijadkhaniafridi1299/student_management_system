<?php
include "inc/dbcon.php";
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");

}
if (isset($_GET['id']))
{
    $id = $_GET['id'];

}
if (isset($_POST['checkboxes']))
{
    foreach ($_POST['checkboxes'] as $user_id)
    {
        $bulk_option = $_POST['bulk_option'];
        if ($bulk_option == 'present')
        {
            $attendence = mysqli_query($conn, "insert into attandence(studentid, attendance, date)
             values ('$user_id', 'present', Now())");
        }
        if ($bulk_option == 'absent')
        {
            $attendence = mysqli_query($conn, "insert into attandence(studentid, attendance, date)
             values ('$user_id', 'absent', Now())");
        }
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
                    <h4 class="text-center text-white bg-primary">BatchVise Student List</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="bulk_option" id="" class="form-control">
                                    <option value="">Please Select</option>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <input type="submit" value="apply" class="btn btn-warning" onclick="javascript:return confirm('please confirm')">
                        </div>
                    </div>
                    <table class="table table-bordered " id="table2excel">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th><input type="checkbox" id="selectedboxes"></th>
                            <th>Sr No</th>
                            <th>Student Name</th>
                            <th>School</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Batch</th>
                            <th>Image</th>

                        </tr>
                        </thead>
                        <?php
                        include "inc/dbcon.php";
                        $student= mysqli_query($conn, "select * from student where batch = '$id'");
                        $i = 0;
                        while ($rowstudent = mysqli_fetch_assoc($student))
                        {
                            $id = $rowstudent['id'];
                            $name = $rowstudent['name'];
                            $class = $rowstudent['class'];
                            $batch = $rowstudent['batch'];
                            $image = $rowstudent['image'];
                            $school = $rowstudent['school'];
                            $gender = $rowstudent['gender'];
                            $course = mysqli_query($conn, "select * from course where course_id = '$batch'");
                            $rowcourse = mysqli_fetch_assoc($course);
                            $course_id = $rowcourse['course_id'];
                            $course_name = $rowcourse['course_name'];

                            ?>
                            <td><input type="checkbox" class="checkboxe" name="checkboxes[]" value="<?php echo $id;?>"></td>
                            <td><?php echo $i++;?></td>
                            <td><a href="presently.php?id =<?php echo $id;?>"><?php echo $name;?></a></td>
                            <td><?php echo $school;?></td>
                            <td><?php echo $gender;?></td>
                            <td><?php echo $class;?></td>
                            <td><?php echo  $batch;?></td>
                            <td><img src="images/gallery/<?php echo $image;?>" alt="" width="100px" height="100px"></td>


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
<script>
    $(document).ready(function () {
$('#selectedboxes').click(function (event) {
     if(this.checked){
       $('.checkboxe').each(function () {
          this.checked = true;
       });
       else
           {
               $('.checkboxe').each(function () {
                   this.checked = false;
               });
           }
    }
});
    });
</script>