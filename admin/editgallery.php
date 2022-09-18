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


    $upgallery = mysqli_query($conn, "select * from gallery where galleryid = '$id'");
    $row = mysqli_fetch_assoc($upgallery);
    $id = $row['galleryid'];
    $title = $row['gallery_title'];

    $image1 = $row['gallery_img'];
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
                                <input type="text" name="title" placeholder="enter images title" class="form-control" value="<?php echo $title;?>">
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
                                <button class="btn  btn-outline-primary btn-block" name="update" type="submit">Updates Images</button>
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
    $title = $_POST['title'];
    $image = $_FILES['y_images']['name'];
    $image_tmp = $_FILES['y_images']['tmp_name'];
    if (empty($image))
    {
        $image = $image1;
    }
    else
        {
            $image = 'GallerImage'.date('Y-m-d-H-i-s').'_'.uniqid().'jpg';
        }

    move_uploaded_file($image_tmp, 'images/gallery/'.$image);
    $addgallery = mysqli_query($conn, "update gallery set gallery_title = '$title', gallery_img = '$image' where galleryid = '$id'");
    if ($addgallery == true)
    {
        echo "<script>alert('Welcome, You have Updated Images')</script>";
        echo "<script>window.open('galllery.php', '_self')</script>";
    }
}

?>