<?php
include "inc/dbcon.php";
ob_start();
session_start();
if (!isset($_SESSION['username']))
{
    header("location:login.php");

}
if (isset($_GET['del']))
{
    $del_id = $_GET['del'];
    $delgallery = mysqli_query($conn, "delete from expenses where id = '$del_id'");
    if ($delgallery == true)
    {
        echo "<script>alert('You have Deleted Successfully')</script>";
        echo "<script>window.open('expanse.php', '_self')</script>";
    }
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
                    <h4 class="text-center text-white bg-primary">View All Expenses Details</h4>
                    <div align="right">
                        <a href="addexpense.php" class="btn btn-outline-primary">Add Expense</a>
                        <hr>
                    </div>
                    <table class="table table-bordered " id="table2excel">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Sr No</th>
                            <th>Particular</th>
                            <th>Date</th>
                            <th>Amount</th>

                            <th><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <?php
                        include "inc/dbcon.php";
                        $expenses = mysqli_query($conn, "select * from expenses order by id desc");
                        $i = 0;
                        while ($rowexpenses = mysqli_fetch_assoc($expenses))
                        {
                            $id = $rowexpenses['id'];
                            $particular= $rowexpenses['particular'];
                            $amt = $rowexpenses['amt'];
                            $date = $rowexpenses['date'];
                            ?>
                           <tr>
                               <td><?php echo $i++;?></td>
                               <td><?php echo $particular;?></td>
                               <td><?php echo $date;?></td>
                               <td><?php echo $amt;?></td>


                               <td><a href="expanse.php?del=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>

                           </tr>
                            <?php
                        }
                        ?>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <button type="submit" id="btn" class="btn btn-danger offset-md-4">Export To Excell</button>



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
        $('#table2excel').DataTable();
    });
</script>
<script>
    $('#btn').click(function () {
        $('#table2excel').Iabletoexcel({
            name:"Worksheet name",
            filename:"galllery.xls"
        });
    });
</script>