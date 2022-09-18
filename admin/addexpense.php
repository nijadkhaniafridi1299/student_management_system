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
                        <h4 class="text-center text-white bg-primary">Add Expense</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label text-danger">Particular</label>
                            <div class="col-sm-10">
                                <input type="text" name="particular" placeholder="enter particular here" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Amount</label>
                            <div class="col-sm-10">
                                <input type="text" name="amt" class="form-control" placeholder="Enter Amount Here">
                            </div>
                        </div>
                        <div class="row form-group mt-1">
                            <label for="" class="col-sm-2 col-form-label text-danger">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-1">

                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn  btn-outline-primary btn-block" name="submit" type="submit">Add Expense</button>
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
    $particular= $_POST['particular'];
    $amt= $_POST['amt'];
    $date= $_POST['date'];

    $addexpenses= mysqli_query($conn, "insert into expenses (particular, amt, date)
    values ('$particular', '$amt', '$date')");
    if ($addexpenses == true)
    {
        echo "<script>alert('Welcome, You have added Expense')</script>";
        echo "<script>window.open('expanse.php', '_self')</script>";
    }
}

?>