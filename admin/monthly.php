<?php
session_start();
include '../connection.php';

if (!isset($_SESSION['id'])) {
    header('location:index.php');
    $msg = '';
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != '') {
        echo "<script>alert('$msg')</script>";
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin | form</title>


    <!-- Font Awesome Icons -->
    <?php include("layouts/css.php") ?>

    <style>
        .content-wrapper {
            background-image: url('dist/img/back1.jpg');
            /* background-color: #DA816D; */
            /* width: 100%; */
            height: auto;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        /* h3{
        text-shadow: #06296b;
        } */

        hr.style13 {
            height: 10px;
            border: 0;
            box-shadow: 0 10px 10px -10px #06296b inset;
        }


        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ec9015;
        }

        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }

        input {
            border: 2px solid #06296b;
            border-radius: 2px;
        }

        input:focus {
            outline: none;
            border-color: #06296b;
            box-shadow: 0 0 30px #06296b;
        }

        select {
            border: 2px solid #dadada;
            border-radius: 2px;
        }

        select:focus {
            outline: none;
            border-color: #06296b;
            box-shadow: 0 0 30px #06296b;
        }

        table tr {
            height: 40px;
            /* border: px solid #06296b; */

        }

        tr:nth-child(even) {
            background-color: #bae3e3;
        }
        table td{
            text-align: center;
        }
    </style>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "layouts/header.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <?php include "layouts/sidebar.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Form</a></li>
                                <li class="breadcrumb-item active">Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row" id="remove_msg" style="height: 15px; display: none;"></div>
                        </div>
                        <legend style="color:#ec9015;">Student Payments</legend>
                        <hr>
                        <form action="action.php" method="POST">
                            <div class="row">
                                <div class="col-md-7"><br>
                                    <div class="row">
                                        <div class="col-md-3"><label>Admission No.:</label></div>
                                        <div class="col-md-4"><input type="text" name="admissionnumb" id="admonnthly_wise" onkeyup="addmissiomonthly()" class="form-control" required=""></div>
                                        <div class="col-lg-3 "><b>Receipt No:</b></div>
                                        <div class="col-lg-2 "><input type="text" value="<?php echo (rand(10, 100000));  ?>" name="recipt" id="recipt" readonly class="form-control"></div>

                                        <br>
                                    </div>
                                </div>
                            </div><br>
                            <!-- payment -->
                            <legend style="color:rebeccapurple;">Payments</legend>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-3"><label>Date:</label></div>
                                        <div class="col-md-5 "> <input type="date" name="date" id="dob" class="form-control" required=""></div>

                                        <div class="col-md-4 "> <input type="time" name="time" id="time" class="form-control" required=""></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-6 "><label> No of Months:</label></div>
                                        <div class="col-lg-6 "><input type="text" name="nomonth" id="recipt" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-4 "><label for="fname">Month</label></div>
                                        <div class="col-lg-8 ">
                                            <select name="month" id="month" class="form-control">
                                                <option value="">Select</option>

                                                <option value="Jan">Jan</option>
                                                <option value="Feb">Feb</option>
                                                <option value="Mar">Mar</option>
                                                <option value="Apr">Apr</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="Aug">Aug</option>
                                                <option value="Sep">Sep</option>
                                                <option value="Oct">Oct</option>
                                                <option value="Nov">Nov</option>
                                                <option value="Dec">Dec</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <br>
                            <div class="row" style="margin-top:10px">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3"><b> Payment Mode:</b></div>
                                        <div class="col-md-3">
                                            <select id="prefix" name="paymentmode" class="form-control">
                                                <option value="state">Select</option>
                                                <option value="Bank A/c">Bank A/c</option>
                                                <option value="Case">Case</option>
                                                <option value="Online Payment">Online Payment</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <br>
                            <!-- payment -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="pays">
                                        <table class="table-hover table-striped table-bordered table-condensed" style="width:100%;" id="myTable">
                                            <!--beginning of table-->
                                            <tbody>
                                                <tr>
                                                    <td width="100"><b>Serial no.</b></td>
                                                    <td><b>Payment</b></td>
                                                    <td><b>Payment Rs.</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">01</td>
                                                    <td>Admission</td>
                                                    <td><input type="number" name="admissionfee" id="admfee" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">02</td>
                                                    <td>Tution Fee</td>
                                                    <td><input type="number" name="tutionfee" id="tutionfee" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">03</td>
                                                    <td> Late Fine</td>
                                                    <td><input type="number" name="latefee" id="latefine" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">04</td>
                                                    <td>Examination Fee </td>
                                                    <td><input type="number" name="examinationfee" id="examfee" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">05</td>
                                                    <td> Game/Sports Fee</td>
                                                    <td><input type="number" name="gamefee" id="gamefee" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">06</td>
                                                    <td>Books and Stationary </td>
                                                    <td><input type="number" name="bookfee" id="bookfee" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">07</td>
                                                    <td>Library Fee </td>
                                                    <td><input type="number" name="libraryfee" id="libraryfee" onkeyup="find_total()"></td>
                                                </tr>
                                                <tr>
                                                    <td width="95">08</td>
                                                    <td>Computer Fee </td>
                                                    <td><input type="number" name="computerfee" id="computerfee" onkeyup="find_total()"></td>
                                                </tr>

                                                <tr>
                                                    <td width="400" colspan="2" style="text-align:right"><b>Total : &nbsp;&nbsp;</b></td>
                                                    <td><input type="text" name="total" class="tot" width="80" id="total" readonly="" required=""></td>

                                                </tr>
                                                <tr>
                                                    <td width="400" colspan="2" style="text-align:right"><b>Paid : &nbsp;&nbsp;</b></td>
                                                    <td><input type="number" name="paid" class="paid" onkeyup="paiddetais()" width="90" id="paid" required=""></td>

                                                </tr>
                                                <tr>
                                                    <td width="400" colspan="2" style="text-align:right"><b>Due : &nbsp;&nbsp;</b></td>
                                                    <td><input type="number" name="due" class="due" width="80" id="due" readonly="" required=""></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end of table-->

                                    </div>
                                </div>
                                <!-- payment close -->
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 mb-4"><label>Name:</label> </div>
                                        <div class="col-md-8"><input type="text" name="studentname" id="monthlyname" readonly placeholder="Full Name" class="form-control"> </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4"><label>Fathers Name:</label> </div>
                                        <div class="col-md-8"><input type="text" name="fathers" id="monthlyfathers" readonly placeholder="Full Name" class="form-control"> </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-4"><label>Address:</label> </div>
                                        <div class="col-md-8"><input type="text" name="address" id="monthlyaddress" readonly placeholder="Full Name" class="form-control"> </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-4"><label>Class:</label> </div>
                                        <div class="col-md-8">
                                            <select id="monthlyclass" name="class" readonly class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4"><label>Rollno.:</label> </div>
                                        <div class="col-md-8"><input type="number" name="roll" id="monthlyrollno" readonly placeholder="Full Name" class="form-control"> </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-4"><label>Session:</label> </div>
                                        <div class="col-md-8">
                                            <select id="monthlysession" name="session" readonly class="form-control">
                                                <option value="">Select</option>

                                                <option value="2021-2022">2021-2022</option>
                                                <option value="2020-2021">2020-2021</option>
                                                <option value="2019-2020">2019-2020</option>
                                                <option value="2018-2019">2018-2019</option>
                                                <option value="2017-2018">2017-2018</option>

                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div><br><br>

                            <center><button class="btn btn-success" name="monthlypayment" type="submit">Make Payment</button></center>

                        </form>
                    </div>

                </div>

            </div>





            <!-- main content close -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <script>
        //    listajax();
        function addmissiomonthly() {
            debugger;
            var admonnthly_wise = $('#admonnthly_wise').val();
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {admonnthly_wise: admonnthly_wise, monthlyajaxinset: 'monthlyajaxinset'},
                dataType: 'JSON',
                success: function(result) {
                    
                    // alert(result);
                    // console.log(result);

                    $('#monthlyname').val(result.studentname)
                    $('#monthlyfathers').val(result.fathers)
                    $('#monthlyaddress').val(result.address)
                    $('#monthlyclass').val(result.class)
                    $('#monthlyrollno').val(result.roll)
                    $('#monthlysession').val(result.session)
                }
            });
        }

        function find_total() {
            // debugger;
            var admfee = $('#admfee').val();
            var tutionfee = $('#tutionfee').val();
            var latefine = $('#latefine').val();
            var examfee = $('#examfee').val();
            var gamefee = $('#gamefee').val();
            var bookfee = $('#bookfee').val();
            var libraryfee = $('#libraryfee').val();
            var computerfee = $('#computerfee').val();

            if (admfee == "")
                var admfee = 0;

            if (tutionfee == "")
                var tutionfee = 0;

            if (latefine == "")
                var latefine = 0;

            if (examfee == "")
                var examfee = 0;
            if (gamefee == "")
                var gamefee = 0;

            if (bookfee == "")
                var bookfee = 0;
            if (libraryfee == "")
                var libraryfee = 0;
            if (computerfee == "")
                var computerfee = 0;

            var tt = (parseFloat(admfee) + parseFloat(tutionfee) + parseFloat(latefine) + parseFloat(examfee) +
                parseFloat(gamefee) + parseFloat(bookfee) + parseFloat(libraryfee) + parseFloat(computerfee));

            var final = parseFloat(tt);
            $('#total').val(final);
        }

        function paiddetais() {
            // debugger;
            var total = $('#total').val();
            var paid = $('#paid').val();
            var due = parseInt(total) - parseInt(paid);
            $('#due').val(due);
        }
    </script>
    <!-- <script>
        $(document).ready(function() {
           
        });
      </script> -->
    <!-- Main Footer -->
    <?php include "layouts/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php include "layouts/js.php"; ?>
</body>

</html>