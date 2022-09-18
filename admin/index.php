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
                 <h4 class="text-center text-white bg-primary">Static overView Of Apex Academy</h4>
             </div>
             <div class="col-md-3">
                 <div class="card text-primary border-primary">
                    <div class="card-header bg-primary text-white">
                    Student
                    </div>
                     <div class="card-body">
                         <table class="table table-bodered table-condensed">
                          <tbody>
                          <?php
                          include "inc/dbcon.php";
                          for ($i=1; $i<=10; $i++) {
                         $student = mysqli_query($conn, "select * from student where class = '$i'");
                         $student_count = mysqli_num_rows($student);
                          ?>
                              <tr>
                                  <th class="bg-dark text-white"><?php echo $i;?></th>
                                  <th><?php echo $student_count;?></th>
                              </tr>
                          <?php
                          }
                          ?>
                          </tbody>
                         </table>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="card text-primary border-warning">
                     <div class="card-header bg-warning text-white">
                       Total Fees Collection
                     </div>
                     <div class="card-body">
                         <table class="table table-bodered table-condensed">
                             <tbody>
                             <?php
                             include "inc/dbcon.php";
                             $studentTotalfee = mysqli_query($conn, "select * from student");
                             $studenttotalfee = 0;
                             $totalfee = 0;
                             while ($rowStudentTotalfee = mysqli_fetch_assoc($studentTotalfee))
                             {
                                 $studenttotalfee = $rowStudentTotalfee['fees'];
                                 $totalfee += $studenttotalfee;
                             }
                             $feea = mysqli_query($conn, "select * from fee");
                             $fees = 0;
                             $feeas = 0;
                             while ($row_fee = mysqli_fetch_assoc($feea))
                             {
                                 $feeas = $row_fee['fees'];
                                 $fees += $feeas;
                             }
                             ?>
                             <tr>
                                 <th class="bg-dark text-white">Total Fees</th>
                                 <th><?php echo $totalfee;?></th>
                             </tr>
                             <tr>
                                 <th class="bg-dark text-white">Collection fees </th>
                                 <th><?php echo $fees;?></th>
                             </tr>
                             <tr>
                                 <th class="bg-danger text-white">Remaing Fees</th>
                                 <th><?php echo $totalfee-$fees;?></th>
                             </tr>

                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="card text-primary border-secondary mt-2">
                     <div class="card-header bg-secondary text-white">
                         Balance Fees
                     </div>
                     <div class="card-body">
                         <table class="table table-bodered table-condensed">
                             <tbody>
                             <?php
                             include "inc/dbcon.php";
                             $expanse = mysqli_query($conn, "select * from expenses");
                             $expAmt = 0;
                             $totalExpense = 0;
                             while ($row_expanse = mysqli_fetch_assoc($expanse))
                             {
                                 $expAmt = $row_expanse['amt'];
                                 $totalExpense += $expAmt;
                             }
                             ?>
                             <tr>
                                 <th class="bg-dark text-white">Collection Fees</th>
                                 <th><?php echo $totalfee;?></th>
                             </tr>
                             <tr>
                                 <th class="bg-dark text-white">Expense </th>
                                 <th><?php echo $totalExpense;?></th>
                             </tr>
                             <tr>
                                 <th class="bg-danger text-white">Remaing Balance</th>
                                 <th><?php echo $totalfee-$totalExpense;?></th>
                             </tr>

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <div class="col-md-5">
                 <div class="card text-primary border-danger">
                     <div class="card-header bg-danger text-white">Expense <small>(Last 10 Expanses)</small></div>
                      <div class="card-body">
                          <table class="table table-bodered table-condensed">
                          <thead class="bg-dark text-white">

                          <tr>
                              <th>Sr No</th>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Particular</th>
                          </tr>
                          </thead>
                              <tbody>
                              <?php
                              include "inc/dbcon.php";
                              $expanses = mysqli_query($conn, "select * from expenses");
                              $i = 0;
                              while($rowexpense = mysqli_fetch_assoc($expanses))
                              {
                                  $date= $rowexpense['date'];
                                  $amount = $rowexpense['amt'];
                                  $bill = $rowexpense['particular'];
                                  $i = $i+1;
                                  ?>
                                  <tr>
                                      <th><?php echo $i;?></th>
                                      <th><?php echo $date;?></th>
                                      <th><?php echo $amount;?></th>
                                      <th><?php echo $bill;?></th>
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
