<?php
session_start();
include '../connection.php';

// if (!isset($_SESSION['id'])) {
//     header('location:index.php');
//     $msg = '';
//     if (isset($_SESSION['msg'])) {
//         $msg = $_SESSION['msg'];
//         unset($_SESSION['msg']);
//     }
//     if ($msg != '') {
//         echo "<script>alert('$msg')</script>";
//     }
// }
$id = $_GET['id'];

$sql = "SELECT * FROM `register` WHERE `id`= $id";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($q);
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
                        Update Registration List</h3>
                    <hr class="style13"><br>
                </div>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mb-3"></div>
                    <div class="col-md-3 mb-3"><label>Admission No:</label></div>
                    <div class="col-md-3 mb-3"><input type="text" name="admissionn" id="up_adm" value="<?= $row['admissionn']; ?>" class=" form-control"></div>
                    <div class="col-md-3 mb-3"></div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3"></div>
                    <div class="col-md-3 mb-3"><label>Class:</label></div>
                    <div class="col-md-3 mb-3"><select id="up_class" name="class" value="<?= $row['class']; ?>" class="form-control">
                            <option value="state">Select</option>
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
                        </select></div>
                        <div class="col-md-3 mb-3"></div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3"></div>
                    <div class="col-md-3 mb-3"><label>Name:</label></div>
                    <div class="col-md-3 mb-3"><input type="text" name="studentname" id="up_name" value="<?= $row['studentname']; ?>" class="form-control"></div>
                    <div class="col-md-3 mb-3"></div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3"></div>
                    <div class="col-md-3 mb-3"><label> Fathers Name:</label></div>
                    <div class="col-md-3 mb-3"><input type="text" name="fathers" id="up_fatheras" value="<?= $row['fathers']; ?>" class=" form-control"></div>
                    <div class="col-md-3 mb-3"></div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3"></div>
                    <div class="col-md-3 mb-3"><label> Date:</label></div>
                    <div class="col-md-3 mb-3"><input type="text" name="date" id="up_date" value="<?= $row['admissiondate']; ?>" class=" form-control"></div>
                    <div class="col-md-3 mb-3"></div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3"></div>
                    <div class="col-md-3 mb-3"><label>Session:</label></div>
                    <div class="col-md-3 mb-3"> <select id="up_session" name="session" value="<?= $row['session']; ?>" class="form-control ">
                            <option value="state">Select</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2018-2019">2018-2019</option>
                            <option value="2017-2018">2017-2018</option>
                        </select></div>
                        <div class="col-md-3 mb-3"></div>
                </div>
                <input type="hidden" class="form-control email" id="id" name="id" value="<?= $row['id']; ?>" aria-describedby="emailHelp" placeholder="Enter email">
<br><br>
                <center><button type="button" class="btn btn-primary" onclick="up_regislist()" name="update_form">Update</button></center>

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
        function up_regislist() {
            debugger;
            var id = $('#id').val();
            var up_adm = $('#up_adm').val();
            var up_class = $('#up_class').val();
            var up_name = $('#up_name').val();
            var up_fatheras = $('#up_fatheras').val();
            var up_date = $('#up_date').val();
            var up_session = $('#up_session').val();

            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    id: id,
                    up_adm: up_adm,
                    up_class: up_class,
                    up_name: up_name,
                    up_fatheras: up_fatheras,
                    up_date: up_date,
                    up_session: up_session,
                    update_reglist: 'update_reglist'
                },
                success: function(result) {
                    alert(result);
                    if (result == 1) {

                        window.location.href = "registrationlist.php";

                    }
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