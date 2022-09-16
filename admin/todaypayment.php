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

$todaydate_wize = date('Y-m-d');

// $sql = "SELECT * FROM `payment` WHERE `date`='$todaydate_wize'";

$sql = "SELECT payment.*,register.studentname,register.fathers FROM `payment` RIGHT JOIN `register` ON payment.admissionnumb=register.admissionn WHERE payment.date='$todaydate_wize'";

// print_r($sql);die;
$res3 = mysqli_query($conn, $sql);
$num_row = mysqli_num_rows($res3);
if ($num_row > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($res3)) {
        //    echo '<pre>';
        //     print_r($row);

        $record[] = $row;
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
            border-color: black;
        } 
        table thead th{
            vertical-align: bottom;
            border-bottom: 2px solid #1b1d20;
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
                        Today's Payment Details</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-3"> <label>Date</label></div>
                            <div class="col-md-9"> <input type="date" name="date" id="todaydate_wize" value="<?php echo date('Y-m-d'); ?>" readonly onload="todaypayment()" class="form-control"></div>


                        </div>

                    </div>
                    <div class="col-md-7">
                    </div>

                </div>

            </div>
            <br><br>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 m-auto table-responsive">
                        <table class="table table-striped" border="2 solid black">
                            <thead>
                                <tr>
                                    <th colspan="11" style="font-size:18px;background-color:#06296b; color:#E4D6D6;"> Student Details</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr align="center">
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Father's </th>
                                    <th>Months</th>
                                    <!-- <th>Fine</th> -->
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Dues</th>



                                </tr>
                            </thead>
                            <thead>
                                <?php
                                if (!empty($record)) {
                                    $i = 0;
                                    foreach ($record as $value) {
                                        $i++;
                                        // print_r($value);
                                ?>

                                        <tr align="center">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['studentname']; ?></td>
                                            <td><?php echo $value['fathers']; ?></td>
                                            <td><?php echo $value['month']; ?></td>

                                            <td><?php echo $value['total']; ?></td>
                                            <td><?php echo $value['paid']; ?></td>
                                            <td><?php echo $value['due']; ?></td>

                                        </tr>


                                <?php


                                    }
                                }
                                ?>
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
        $(document).ready(function() {
            debugger;
            var todaydate_wize = $('#todaydate_wize').val();
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    todaydate_wize: todaydate_wize,
                    todayajaxinset: 'todayajaxinset'
                },
                success: function(result) {
                    alert(result);
                    console.log(result);
                    $('#todaylist').html(result);

                }
            });
        });
        //  function todaypayment(){
        //   debugger;
        //   var todaydate_wize = $('#todaydate_wize').val();
        //   $.ajax({
        //     type: "POST",
        //     url: "action.php",
        //     data: {todaydate_wize:todaydate_wize,todayajaxinset:'todayajaxinset'},
        //     success: function(result){
        //         alert(result);
        //         console.log(result);
        //         $('#todaylist').html(result);

        //     }
        //     }
        //   );
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