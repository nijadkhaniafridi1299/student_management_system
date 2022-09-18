<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");


}
include "inc/dbcon.php";
if ($_GET['id']) {
    $id = $_GET['id'];


    $upstudent = mysqli_query($conn, "select * from student where id  = '$id'");
    $row = mysqli_fetch_assoc($upstudent);
    $id = $row['id'];
    $student_name = $row['student_name'];
    $address= $row['address'];
    $class= $row['class'];
    $batch = $row['batch'];
    $medium = $row['medium'];
    $gender = $row['gender'];
    $email = $row['email'];
    $school = $row['school'];
    $fees = $row['fees'];
    $mobile = $row['mobile'];
    $password = $row['password'];
    $subject = $row['subject'];
    $exam = $row['exam'];
    $dob= $row['dob'];
    $image1= $row['image'];
    $date= $row['date'];
    $arraySubject = explode(',',$subject);
    $arrayExam  = explode(',',$exam);
//    $cousrse = mysqli_query($conn, "select * from course where course_id = '$batch'");
//    $rowcourse = mysqli_fetch_assoc($course);
//    $course_id = $rowcourse['course_id'];
//    $course_name = $rowcourse['course_name'];
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
                        <h4 class="text-center text-white bg-primary">Edit Student</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Student Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="<?php echo $student_name;?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address"  class="form-control"   value="<?php echo  $address;?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">For Classs</label>
                            <div class="col-sm-10">
                                <Select class="form-control" name="class" >
                                    <option value="1" <?php if($class == '1'){ echo "selected";} ?>>Class 1</option>
                                    <option value="2" <?php if($class == '2'){ echo "selected";} ?>>Class 2</option>
                                    <option value="3" <?php if($class == '3'){ echo "selected";} ?>>Class 3</option>
                                    <option value="4" <?php if($class == '4'){ echo "selected";} ?>>Class 4</option>
                                    <option value="5" <?php if($class == '4'){ echo "selected";} ?>>Class 5</option>
                                    <option value="6"  <?php if($class == '6'){ echo "selected";} ?>>Class 7</option>
                                    <option value="7"  <?php if($class == '7'){ echo "selected";} ?>>Class 7</option>
                                    <option value="8" <?php if($class == '8'){ echo "selected";} ?>>Class 8</option>
                                    <option value="9" <?php if($class == '9'){ echo "selected";} ?>>Class 9</option>
                                    <option value="10" <?php if($class == '10'){ echo "selected";} ?>>Class 10</option>
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
                                        $option_id = $rowcourse['course_id'];
                                        $course_name = $rowcourse['course_name'];
                                        ?>
                                        <option value="<?php echo $option_id;?>" <?php if($batch == $option_id){ echo "selected";} ?>><?php echo $course_name;?></option>
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
                                    <option value="Marathi"<?php if( $medium == 'Marathi'){ echo "selected";} ?>>Marathi</option>
                                    <option value="Semi"<?php if( $medium == 'Semi'){ echo "selected";} ?>>Semi</option>
                                    <option value="CBSE" <?php if( $medium == 'CBSE'){ echo "selected";} ?>>CBSE</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" id="" required class="form-control">
                                    <option value="male" <?php if($gender == 'male'){ echo "selected";} ?>>Male</option>
                                    <option value="female" <?php if($gender == 'female'){ echo "selected";} ?>>FeMale</option>

                                </select>                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" name="number"  value="<?php echo $mobile;?>"class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email"  value="<?php echo $email;?>" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">School</label>
                            <div class="col-sm-10">
                                <input type="text" name="school"   value="<?php echo $school;?>" class="form-control">                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Fee</label>
                            <div class="col-sm-10">
                                <input type="text" name="fee"  value="<?php echo $fees;?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password"  value="<?php echo  $password;?>" class="form-control">
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
                                            <input type="checkbox" name="subject[]" class="form-check-input" <?php if (in_array("$subject_name", $arraySubject)){ echo "checked";} ?> value="<?php echo $subject_name;?>"/>
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
                                            <input type="checkbox" name="com[]" <?php if (in_array("$exam_name",$arrayExam)){ echo "checked";} ?> class="form-check-input" value="<?php echo $exam_name;?>" required/>
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
                                <input type="date" name="dob" class="form-control" value="<?php echo $dob;?>" >
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Images</label>
                            <div class="col-sm-10">
                                <input type="file" name="y_images" class="form-control-file btn btn-danger" value="<?php echo $image1;?>" >
                            </div>
                        </div>

                        <div class="row form-group mt-1">

                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn  btn-outline-primary btn-block" name="update" type="submit">Update Student</button>
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
    $image = $_FILES['y_images']['name'];
    $image_tmp = $_FILES['y_images']['tmp_name'];
    if (empty($image))
    {
        $image = $image1;
    }
    else
    {
        $image = 'studentImage'.date('Y-m-d-H-i-s').'_'.uniqid().'jpg';
    }

    move_uploaded_file($image_tmp, 'images/student/'.$image);
    $addgallery = mysqli_query($conn, "update student set 
     student_name = '$studentname', 
     address = '$studentaddress',
     class = '$studentclass',
     batch = '$studentbatch',
     medium = '$studentmedium',
     gender = '$studentgender',
     mobile = '$studentnumber',
     email = '$studentemail',
     school = '$studentschool',
     fees = '$studentfee',
     password = '$studentpassword',
     subject = '$sub',
     exam = '$com',
     subject = '$sub',
     dob = '$dob ',
     image = '$image',
      where id = '$id'");
    if ($addgallery == true)
    {
        echo "<script>alert('Welcome, You have Updated Student Records')</script>";
        echo "<script>window.open('student.php', '_self')</script>";
    }
}

?>