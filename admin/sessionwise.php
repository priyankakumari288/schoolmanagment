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
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    
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
                        Session Wise</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label>Session:</label>
                            </div>
                            <div class="col-md-6">
                                <select id="session_wise" name="session" onchange="sessionsearch()" class="form-control">
                                    <option value="">Select</option>
                                    <option value="2021-2022">2021-2022</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2019-2020">2019-2020</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2017-2018">2017-2018</option>

                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label>Search By Name:</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="studentname" id="studentname_wise" onkeyup="studentnamesearch()"class="form-control">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 mb-3"></div>
                </div>
            </div>

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

                                    <th>Adm No.</th>
                                    <th>Class</th>
                                    <th>Name</th>
                                    <th>Fathers Name</th>
                                    <th>Adm. Date</th>
                                    <th>Session</th>
                                    
                                    <th>DOB</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <thead id="sessionlist"></thead>
                            <thead id="studentlist"></thead>
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
        function sessionsearch() {
            // debugger;
            $('#studentlist').empty();
            var session_wise = $('#session_wise').val();
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {session_wise: session_wise, searchajaxins: 'searchajaxins'},
                success: function(result) {
                    // alert(result);
                    // console.log(result);
                    $('#sessionlist').html(result);
                    //   listajax();
                    // console.log(result);
                    // alert(result);
                }
            });
        }
        function studentnamesearch(){
    //   debugger;
    $('#sessionlist').empty();
      var studentname_wise = $('#studentname_wise').val();
      $.ajax({
        type: "POST",
        url: "action.php",
        data: {studentname_wise: studentname_wise , studentajax:'studentajax'},
        success: function(result){
            // if(result!=''){
                // alert(result);
                //     console.log(result);  
            // }
            $('#studentlist').html(result);
            
            // console.log(result);
           
        //   listajax();
          // console.log(result);
          // alert(result);
        }
        }
      );
    }

   
    </script>



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