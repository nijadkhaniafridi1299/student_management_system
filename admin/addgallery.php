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
                    <h4 class="text-center text-white bg-primary">Add Images To Gallery</h4>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label for="" class="col-sm-2 col-form-label text-danger">Add Images Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" placeholder="enter images title" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group mt-1">
                        <label for="" class="col-sm-2 col-form-label text-danger">Add Images</label>
                        <div class="col-sm-10">
                            <input type="file" name="y_images" class="form-control-file btn btn-danger">
                        </div>
                    </div>
                    <div class="row form-group mt-1">

                        <div class="offset-sm-2 col-sm-10">
                            <button class="btn  btn-outline-primary btn-block" name="submit" type="submit">Add Images</button>
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
    $imgTitle = $_POST['title'];
    $image = $_FILES['y_images']['name'];
    $image_tmp = $_FILES['y_images']['tmp_name'];
    $y_images1 = 'GallerImage'.date('Y-m-d-H-i-s').'_'.uniqid().'jpg';
    move_uploaded_file($image_tmp, 'images/gallery/'.$y_images1);
    $addgallery = mysqli_query($conn, "insert into gallery (gallery_title, gallery_img)
    values ('$imgTitle', '$y_images1')");
    if ($addgallery == true)
    {
        echo "<script>alert('Welcome, You have added new Images')</script>";
        echo "<script>window.open('galllery.php', '_self')</script>";
    }
}

?>