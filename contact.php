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
        <div class="col-md-4">
            <h4 class="text-secondary">Register Your Name</h4>
            <hr>
            <form action="" method="post" >
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label text-dark">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="enter your name" style="border: 1px solid black; margin-left: 5p
">
                </div>

            </div>
                <div class="form-group row mt-1">
                    <label for="" class="col-sm-2 col-form-label text-dark">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="enter your email" style="border: 1px solid black; margin-left: 5p
">
                    </div>

                </div>
                <div class="form-group row mt-1">
                    <label for="" class="col-sm-2 col-form-label text-dark">Mobile</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="mobile" placeholder="enter your mobile number" style="border: 1px solid black; margin-left: 5p
">
                    </div>

                </div>
                <div class="form-group row mt-1">
                    <label for="" class="col-sm-2 col-form-label text-dark">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="adress" placeholder="enter your address" style="border: 1px solid black; margin-left: 5p
">
                    </div>

                </div>
                <div class="form-group row mt-1">
                    <label for="" class="col-sm-2 col-form-label text-dark">Class</label>
                    <div class="col-sm-10">
                        <select name="qulification" id="" class="form-control" style="border: 1px solid black; margin-left: 5p
">
                            <option value="1">Class1</option>
                            <option value="2">Class2</option>
                            <option value="3">Class3</option>
                            <option value="4">Class4</option>
                            <option value="5">Class5</option>
                            <option value="6">Class6</option>
                            <option value="7">Class7</option>
                            <option value="8">Class8</option>
                            <option value="9">Class9</option>
                            <option value="10">Class10</option>

                        </select>
                    </div>

                </div>
                <div class="form-group row mt-2">
                    <div class="offset-sm-2 col-sm-10">
                        <button class="btn btn-danger" name="submit">
                           Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5  table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr class="bg-dark text-white">
                    <th>Sr No</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Course Fees</th>
                    <th>Batch Search</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Class 10</td>
                    <td>Mathematics</td>
                    <td>2000</td>
                    <td>12/5/2022</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 10</td>
                    <td>Mathematics</td>
                    <td>2000</td>
                    <td>12/5/2022</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 10</td>
                    <td>Mathematics</td>
                    <td>2000</td>
                    <td>12/5/2022</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
          <h4>Address</h4>
            <address>
                Apex Academy <br>
                Honda Shoroom <br>
                Dist: Nanded <br>
                Phone: 03078069725 <br>

            </address>
            <img src="images/2.jpeg" alt="" class="img-fluid">
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