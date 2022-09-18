<?php
include "inc/top.php";

?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php include 'inc/nav.php'; ?>

        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-9">
           <small class="text-center tex-primary">
              <h3> Some Of Our Successful Students....</h3>
           </small> <hr>
            <table class="table table-bordered">
               <thread class="thead-dark">
                   <tr>
                    <th>Sr No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Batch</th>
                    <th><img src="images/2.jpeg" alt="" class="img-fluid " width="100px"></th>
                   </tr>
               </thread>
                <tbody>
                <tr>
                    <th>001</th>
                    <th>Wisal</th>
                    <th>10th</th>
                    <th>A</th>
                    <th>image</th>
                </tr>
                <tr>
                    <th>002</th>
                    <th>Nijad</th>
                    <th>10th</th>
                    <th>A</th>
                    <th><img src="images/2.jpeg" alt="" class="img-fluid " width="100px"></th>
                </tr>
                </tbody>

            </table>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h4 class="card-title text-center">Parents Review</h4>
                </div>
            </div>
            <img src="images/3.jpeg" alt="" class="img-fluid">
        </div>
    </div>
    <div class="container-fluid mt-2">
        <div class="row bg-dark">
            <?php
            include "inc/footer.php";
            ?>
        </div>
    </div>
</div>

</body>

</html>