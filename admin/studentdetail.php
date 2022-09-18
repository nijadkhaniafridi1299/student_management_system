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
                    <h4 class="text-center text-white bg-primary">Student Deatails</h4>
                </div>
              <div class="col-md-4">
                  <?php
                  include "inc/dbcon.php";
                  $user_id = $_GET['id'];
                  $student = mysqli_query($conn, "select * from student where id = '$user_id'");
                  $rowStudent = mysqli_fetch_assoc($student);
                  $id = $rowStudent['id'];
                  $student_name = $rowStudent['student_name'];
                  $address = $rowStudent['address'];
                  $class = $rowStudent['class'];
                  $batch = $rowStudent['batch'];
                  $medium = $rowStudent['medium'];
                  $gender = $rowStudent['gender'];
                  $mobile = $rowStudent['mobile'];
                  $email= $rowStudent['email'];
                  $school = $rowStudent['school'];
                  $fees = $rowStudent['fees'];
                  $password = $rowStudent['password'];
                  $subject = $rowStudent['subject'];
                  $exam= $rowStudent['exam'];
                  $dob= $rowStudent['dob'];
                  $image= $rowStudent['image'];
                  $date= $rowStudent['date'];
                  $course = mysqli_query($conn, "select * from course where course_id = '$batch'");
                  $rowcourse = mysqli_fetch_assoc($course);
                  $course_id = $rowcourse['course_id'];
                  $course_name = $rowcourse['course_name'];
                  ?>
                  <table class="table table-responsive table-bordered table-condensed">
                  <tbody>
                  <tr>
                     <th class="bg-dark text-white">Name</th>
                     <th><?php echo $student_name; ?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Address</th>
                      <th><?php echo $address;?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Class</th>
                      <th><?php echo $class;?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Batch</th>
                      <th><?php echo $course_name;?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Medium</th>
                      <th><?php echo $medium;?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Gender</th>
                      <th><?php echo $gender;?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Mobile</th>
                      <th><?php echo $mobile;?></th>
                  </tr><tr>
                      <th class="bg-dark text-white">Email</th>
                      <th><?php echo $email;?></th>
                  </tr>
                  </tbody>
                  </table>
              </div>
              <div class="col-md-4">
                  <table class="table table-bordered table-condensed table-responsive ">
                      <tbody>
                      <tr>
                          <th class="bg-dark text-white">School</th>
                          <th><?php echo $school;?></th>
                      </tr><tr>
                          <th class="bg-dark text-white">Fee</th>
                          <th><?php echo $fees;?></th>
                      </tr><tr>
                          <th class="bg-dark text-white">Password</th>
                          <th><?php echo $password;?></th>
                      </tr><tr>
                          <th class="bg-dark text-white">Subject</th>
                          <th><?php echo $subject;?></th>
                      </tr><tr>
                          <th class="bg-dark text-white">Compitive Exam</th>
                          <th><?php echo $exam;?></th>
                      </tr><tr>
                          <th class="bg-dark text-white">Date Of Birth</th>
                          <th><?php echo $dob;?></th>
                      </tr><tr>
                          <th class="bg-dark text-white">Registration</th>
                          <th><?php echo $date;?></th>
                      </tr>
                      </tbody>
                  </table>
              </div>
              <div class="col-md-4">
                  <div class="card mb-3" style="max-width: 540px;">
                   <div class="row no-gutters">
                   <div class="col-md-4">
                       <img src="images/student/1.jpg" width="100%" class="img-fluid" alt="">
                   </div>
                       <div class="col-md-8">
                           <div class="card-body">
                               <h3 class="card-title  text-danger">Nijad</h3>
                           </div>
                       </div>
                   </div>
                  </div>
              </div>
            </div><hr>
            <div class="row">

                    <div class="col-md-12">
                        <h4 class="text-center text-white bg-primary">Fee Deatails</h4>
                    </div>

                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-6 text-dark col-form-label">Add Fee Amt</label>
                            <div class="col-sm-6">
                                <input type="text" name="feepiad" class="form-control" placeholder="Enter Fee Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 text-dark col-form-label">Add Fee Amt</label>
                            <div class="col-sm-6">
                                <input type="text" name="feepiad" class="form-control" placeholder="Enter Fee Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 text-dark col-form-label">Receipt No</label>
                            <div class="col-sm-6">
                                <input type="text" name="rno" class="form-control" placeholder="Enter Receipt number">
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="offet-sm-6 col-sm-6">
                                <button type="submit" name="addfee" class="btn btn-danger">Add Fee</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered table-condensed">
                        <?php
                        $feePaidBystudent = mysqli_query($conn, "select * from fees where studentid = '$id'");
                        $totalfee = 0;
                        $totalpaid = 0;
                        while ($rowfeePaid = mysqli_fetch_assoc($feePaidBystudent))
                        {
                            $totalpaid = $rowfeePaid['fees'];
                            $paiddate = $rowfeePaid['date'];
                            $rno= $rowfeePaid['rno'];
                            $totalfee +=$totalpaid;
                        ?>

                        <tbody>
                        <tr>
                            <th class="bg-dark text-white"><?php echo $paiddate;?></th>
                            <th>Rs:<?php echo $totalpaid;?></th>
                            <th>Youcher No <?php echo $rno;?></th>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered table-condensed">
                        <tbody>
                        <tr>
                            <th class="bg-dark text-white">Total Fee</th>
                            <th>Rs:<?php echo $totalfee;?></th>

                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Paid Fee</th>
                            <th>Rs:<?php echo $totalpaid;?></th>

                        </tr>
                        <tr>
                            <th class="bg-danger text-white">Balance</th>
                            <th>Rs:<?php echo $totalpaid-$totalpaid;?> </th>

                        </tr>
                        </tbody>
                    </table>
                 </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <h2 class="text-center text-white bg-primary">Marks Detials</h2>
                    <hr>
                    <table class="table table-bordered" id="excel">
                        <thead class="bg-dark">
                      <tr>
                          <th>Date</th>
                          <th>Subject</th>
                          <th>Total Marks</th>
                          <th>Obatain Marks</th>
                      </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = mysqli_query($conn, "select * from result where studentid = '$user_id'");
                        while ($rowResult = mysqli_fetch_assoc($result))
                        {
                            $date = $rowResult['date'];
                            $subject= $rowResult['subject'];
                            $totalMarks = $rowResult['totalMarks'];
                            $obtainMark	 = $rowResult['obtainMark'];
                            ?>
                            <tr>
                                <td><?php echo $date;?></td>
                                <td><?php echo $subject;?></td>
                                <td><?php echo $totalMarks;?></td>
                                <td><?php echo $obtainMark;?></td>
                            </tr>
                        <?php
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                   <h2 class="text-center text-white bg-primary">Attendence Details</h2>
                </div>
                <?php
                $present = mysqli_query($conn, "select * from attandence where studentid = '$user_id' and attendance = 'present'");
                $runPresent = mysqli_num_rows($present);
                $absent = mysqli_query($conn, "select * from attandence where studentid = '$user_id' and attendance = 'absent'");
                $runAbsent = mysqli_num_rows($absent);

                ?>
                <div class="row">
                    <div class="col-md-12">
                    <button class="btn btn-info btn-block">Present Days
                        <span class="badge badge-light"><?php echo $runPresent; ?></span>
                    </button><hr>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-info btn-block">Absents Days
                            <span class="badge badge-light"><?php echo $runAbsent;?></span>
                        </button><hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-primary">Message to Yamini</h2>
                    <table class="table table-bodered" id="excel1">
                        <thead class="bg-dark">
                           <tr>
                               <th>Sr No</th>
                               <th>Date</th>
                               <th>Message</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                        $msg = mysqli_query($conn, "select * from msg where studentid = '$user_id'");
                        $sno = 0;
                        while ($rowmsg = mysqli_fetch_assoc($msg))
                        {
                        $message = $rowmsg['message'];
                        $date = $rowmsg['date'];
                        $sno = $sno+1;
                        ?>
                            <tr>
                                <td><?php echo $sno;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $message;?></td>
                            </tr>
                        <?php
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
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
        $('#excel').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#excel1').DataTable();
    });
</script>
<?php
if (isset($_POST['addfee']))
{
    $feepiad = $_POST['feepiad'];
    $rno= $_POST['rno'];
    $fees = mysqli_query($conn, "insert into fee (studentid, classid, batchid, fees, rno, date) 
    values ('$user_id', '$class', '$batch', '$feepiad', '$rno', Now())");
    if ($fees == true)
    {
        echo "<script>alert('Welcome, You have added Fees!')</script>";
        echo "<script>open.window('fee.php', '_self')</script>";
    }
}

?>