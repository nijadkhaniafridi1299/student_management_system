<?php
include "inc/dbcon.php";
$query = mysqli_query($conn, "select * from gallery ");
$gallery = mysqli_num_rows($query);

$query1 = mysqli_query($conn, "select * from student");
$student = mysqli_num_rows($query1);

$query2 = mysqli_query($conn, "select * from review");
$review = mysqli_num_rows($query2);

$query3 = mysqli_query($conn, "select * from course");
$course = mysqli_num_rows($query3);

$query4 = mysqli_query($conn, "select * from register");
$register = mysqli_num_rows($query4);

$query5 = mysqli_query($conn, "select * from fee");
$fee= mysqli_num_rows($query5);

$query6 = mysqli_query($conn, "select * from category");
$category= mysqli_num_rows($query6);

$query7 = mysqli_query($conn, "select * from expenses");
$expense= mysqli_num_rows($query7);

$query8 = mysqli_query($conn, "select * from exam");
$exam= mysqli_num_rows($query8);

$query9= mysqli_query($conn, "select * from msg");
$message= mysqli_num_rows($query9);

$query10= mysqli_query($conn, "select * from messagetoclasses");
$messagetoclasses= mysqli_num_rows($query10);
?>

<div class="list-group">
    <a href="index.php" class="list-group-item list-gorup-item-action active">
    <i class="fa fa-tachometer"></i>Dashboard
    </a>
    <a href="galllery.php" class="list-group-item list-group-item-action ">
    <i class="fa fa-camera"></i>Gallery
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $gallery;?></span>
        </button>
    </a>
    <a href="student.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-user"></i>Student
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $student;?></span>
        </button>
    </a>
    <a href="review.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-star"></i>Review
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $review;?></span>
        </button>
    </a>
    <a href="course.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-life-ring"></i>Batches
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $course;?></span>
        </button>
    </a>
    <a href="register.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-lightbulb-o"></i>Registration
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $register;?></span>
        </button>
    </a>
    <a href="fee.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-money"></i>Fees
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $fee;?></span>
        </button>
    </a>
    <a href="cate.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-sort"></i>Category
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $category;?></span>
        </button>
    </a>
    <a href="expanse.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-money"></i>Expense
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $expense;?></span>
        </button>
    </a>
    <a href="exam.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-question"></i>Exam
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $exam;?></span>
        </button>
    </a>
    <a href="message.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-envelope"></i>Message
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $message;?></span>
        </button>
    </a>
    <a href="msgtoclasses.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-window-close-o"></i>Complaints
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge bg-light text-danger"><?php echo $messagetoclasses;?></span>
        </button>
    </a>
</div>
