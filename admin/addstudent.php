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
                        <h4 class="text-center text-white bg-primary">Add Student</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Student Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="enter Student Name" class="form-control"  required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" placeholder="enter address" class="form-control"  required>
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
                            <label for="" class="col-sm-2 col-form-label text-danger">Batch</label>
                            <div class="col-sm-10">
                                <select name="batch" class="form-control" required>
                                    <?php
                                    include "inc/dbcon.php";
                                    $course = mysqli_query($conn, "select * from course");
                                    while ($rowcourse = mysqli_fetch_assoc($course))
                                    {
                                        $course_id = $rowcourse['course_id'];
                                        $course_name = $rowcourse['course_name'];
                                        ?>
                                <option value="<?php echo $course_id;?>"><?php echo $course_name;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Medium </label>
                            <div class="col-sm-10">
                                <select name="medium" id="" required class="form-control"  required>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Semi">Semi</option>
                                    <option value="CBSE">CBSE</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" id="" required class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">FeMale</option>

                                </select>                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" name="number"  required placeholder="enter Mobile Number" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email"  required placeholder="enter email address" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">School</label>
                            <div class="col-sm-10">
                                <input type="text" name="school"  required placeholder="enter school name" class="form-control">                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Fee</label>
                            <div class="col-sm-10">
                                <input type="text" name="fee"  required placeholder="enter total amount" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" placeholder="enter your password" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Subject</label>
                            <div class="col-sm-10">
                                <?php
                                $subject = mysqli_query($conn, "select * from subject");
                                while ($rowsubject = mysqli_fetch_assoc($subject))
                                {
                                    $id = $rowsubject['subject_id'];
                                    $subject_name = ['subject_name'];
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <label for="" class="form-check-label">
                                            <input type="checkbox" name="subject[]" class="form-check-input" value="<?php echo $subject_name;?>"/>
                                            <?php echo $subject_name;?>
                                        </label>
                                    </div>
                                    <?php
                                }

                                ?>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Compititive Exam</label>
                            <div class="col-sm-10">
                                <?php
                                $compitive = mysqli_query($conn, "select * from compitive");
                                while ($rowcompitive = mysqli_fetch_assoc($compitive))
                                {
                                    $id = $rowcompitive['id'];
                                    $exam_name =  $rowcompitive['exam_name'];
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <label for="" class="form-check-label">
                                            <input type="checkbox" name="com[]" class="form-check-input" value="<?php echo $exam_name;?>" required/>
                                            <?php echo $exam_name;?>
                                        </label>
                                    </div>
                                    <?php
                                }

                                ?>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Date Of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Images</label>
                            <div class="col-sm-10">
                                <input type="file" name="images" class="form-control-file btn btn-danger" required>
                            </div>
                        </div>

                        <div class="row form-group mt-1">

                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn  btn-outline-primary btn-block" name="submit" type="submit">Add Student</button>
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
    $studentname = $_POST['name'];
    $studentaddress = $_POST['address'];
    $studentclass = $_POST['class'];
    $studentbatch = $_POST['batch'];
    $studentmedium = $_POST['medium'];
    $studentgender= $_POST['gender'];
    $studentnumber = $_POST['number'];
    $studentemail = $_POST['email'];
    $studentschool = $_POST['school'];
    $studentfee = $_POST['fee'];
    $studentpassword = $_POST['password'];
    $dob = $_POST['dob'];
    $sub = implode(",",$_POST['subject']);
    $com = implode(",",$_POST['com']);
    $imagestmp = $_FILES['images']['tmp_name'];
    $u_image = 'Student_'.date('Y-m-s-;H-i-s').'_'.uniqid().'.jpg';
    move_uploaded_file($imagestmp,'images/student/'.$u_image);
    $addstudent = mysqli_query($conn, "insert into student (student_name, address, class, 
    batch, medium, gender, mobile, 	email, school, fees, password, subject, exam, dob, image, date)
    values ('$studentname', '$studentaddress', '$studentclass', '$studentbatch', '$studentmedium', '$studentgender',
     '$studentnumber', '$studentemail', '$studentschool', '$studentfee', '$studentpassword', '$sub', '$com', '$dob', '$u_image', Now())");
    if ($addstudent == true)
    {
        echo "<script>alert('Welcome, You have added student')</script>";
        echo "<script>window.open('student.php', '_self')</script>";
    }
}

?>