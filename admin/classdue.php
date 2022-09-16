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
            height: auto;
            /* opacity: 1; */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        hr.style13 {
            height: 10px;
            border: 0;
            box-shadow: 0 10px 10px -10px #06296b inset;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }

        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
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

            <!-- /.content-header -->

            <!-- Main content -->
            <br>
            <center>
                <div class="col-md-4">
                    <h3 class="text-center">
                        Class Wise Payment</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <div class="container">
                <div class="row">

                    <div class="col-md-4 ">
                        <label for="fname">Admission no</label><br>
                        <input type="text" name="admissionnumb" onchange="classdue()" id="classdue_wize" placeholder="" class="form-control">
                    </div>

                    <div class="col-md-4 ">
                        <label>Section</label><br>
                        <select id="sessiondue_wize" name="section" onchange="sessiondue()" class="form-control">
                            <option value="">Select</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>

                        </select>
                    </div>

                    <div class="col-md-4 ">
                        <label for="fname">Month</label><br>
                        <select name="month" id="monthdue_wize" onchange="monthdue()" class="form-control">
                            <option>Select</option>
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
                <br><br>

                <center><button class="btn btn-success" name="Submit" type="submit">Submit</button></center>


            </div>

            <br><br><br>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 m-auto table-responsive">
                        <table class="table table-striped" border="2 solid black">
                            <thead>
                                <tr>
                                    <th colspan="22" style="font-size:18px;background-color:#06296b; color:#E4D6D6;"> Student Details</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr align="center">

                                    <th>Admission No.</th>
                                    <th>Date</th>
                                    <th>Months</th>
                                    <th>Admission Fee</th>
                                    <th>Tution fee</th>
                                    <th>Late Fee</th>
                                    <th>Exam Fee</th>
                                    <th>Game</th>
                                    <th>Book</th>
                                    <th>Library Fee</th>
                                    <th>Computer Fee</th>
                                    <th>Total</th>
                                    <th>Pay</th>
                                    <th>Due</th>
                                    <th>Receipt No.</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <thead id="classduelist">

                            </thead>
                            <thead id="sessionduelist1">

                            </thead>
                            <thead id="monthduelist">

                            </thead>
                        </table>
                    </div>
                </div>
            </div>






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
        function classdue() {
            // debugger;
            $('#sessionduelist1').empty();
            var classdue_wize = $('#classdue_wize').val();
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    classdue_wize: classdue_wize,
                    classdueajaxinset: 'classdueajaxinset'
                },
                success: function(result) {
                    // alert(result);
                    // console.log(result);
                    $('#classduelist').html(result);
                    //   listajax();
                    // console.log(result);
                    // alert(result);
                }
            });
        }

        function sessiondue() {
            //   debugger;
            $('#classduelist').empty();
            var sessiondue_wize = $('#sessiondue_wize').val();
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    sessiondue_wize: sessiondue_wize,
                    sessiondueajaxinset: 'sessiondueajaxinset'
                },
                success: function(result) {
                    // alert(result);
                    // console.log(result);
                    $('#sessionduelist1').html(result);
                    //   listajax();
                    // console.log(result);
                    // alert(result);
                }
            });
        }

        function monthdue() {
            debugger;
            //   $('#monthdue_wize').empty();
            var monthdue_wize = $('#monthdue_wize').val();
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    monthdue_wize: monthdue_wize,
                    monthdueajaxinset: 'monthdueajaxinset'
                },
                success: function(result) {
                    // alert(result);
                    // console.log(result);
                    $('#monthduelist').html(result);
                    // listajax();
                    // console.log(result);
                    // alert(result);
                }
            });
        }
    </script>


    <!-- Main Footer -->
    <?php include "layouts/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php include "layouts/js.php"; ?>
</body>

</html>