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
            box-shadow: 0 10px 10px -10px #06296b  inset;
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
                            Registration List</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <div class="container">
                <div class="row">

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-3">
                                <label>Class:</label>
                            </div>
                            <div class="col-md-8">
                                <select id="class_wise" name="class" onchange="classsearch()" class="form-control">
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
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Admission No.</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" maxlength="20" minlength="20"  onkeyup="addmissionsearch()" name="admissionn" id="admissionn_wise" class="form-control">
                            </div>

                        </div>

                    </div>

                </div>

            </div>
<br><br><br>
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
                                    <th>Adm No.</th>
                                    <th>Class</th>
                                    <th>Name</th>
                                    <th>Fathers Name</th>
                                    <th>Adm. Date</th>
                                    <th>Session</th>
                                    <th>Action</th>
                                    

                                </tr>
                            </thead>
                            <tbody id="reglist">

                            </tbody>
                            <tbody id="regglist">

                            </tbody>
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
        
    //    listajax();
    function classsearch(){
    //   debugger;$
    $('#regglist').empty();
      var class_wise = $('#class_wise').val();
      $.ajax({
        type: "POST",
        url: "action.php",
        data: {class_wise:class_wise,ajaxinsett:'ajaxinsett'},
        success: function(result){
            $('#reglist').html(result);

        }
        }
      );
    }

    function addmissionsearch(){
    //   debugger;
    $('#reglist').empty();
      var admissionn_wise = $('#admissionn_wise').val();
      $.ajax({
        type: "POST",
        url: "action.php",
        data: {admissionn_wise:admissionn_wise,ajaxinsettt:'ajaxinsettt'},
        success: function(result){
            $('#regglist').html(result);
        }
        }
      );
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