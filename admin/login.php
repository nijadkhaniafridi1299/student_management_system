<?php
ob_start();
session_start();
require_once "inc/dbcon.php";
if (isset($_POST['submit']))
{
   $username = mysqli_real_escape_string($conn, $_POST['name']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

  $query = mysqli_query($conn, "select * from users where user_name = '$username'
  and user_password = '$password'");
  $count = mysqli_num_rows($query);
  if ($count>0)
  {
   while ($row= mysqli_fetch_assoc($query))
   {
       $_SESSION['username'] = $row['user_password'];
       echo "<script>window.open('index.php', '_self')</script>";
   }
  }
  else
      {
          echo "<script>alert('Rong Email or Password')</script>";
      }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="images/mylogo.png"rel="icon"type="image/png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css">

    <title>Document</title>
</head>
<body>
<div class="container-fluid">
<div class="row mt-5">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <form action="" method="post">
            <h4 class="text-danger">
                Please Sign In (Admin Area)
            </h4>
            <hr>
            <label for="" class="text-danger">User Name</label>
            <input type="text" name="name" class="form-control" placeholder="USERNAME" required>
            <label for="" class="text-danger">Passwprd</label>
            <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            <button type="submit" name="submit" class="btn btn-danger btn-blocked btn-lg mt-1">Submit</button>
        </form>
    </div>
    <div class="col-md-4">

    </div>
</div>
</div>
</body>
</html>