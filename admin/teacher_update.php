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
$id = $_GET['id'];
$sql = "select * from teacher where id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

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

        h3 {
            font-weight: bold;
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

        table td {
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

            <br><br>
            <center>
                <div class="col-md-4">
                    <h3 class="text-center">
                        About_Us</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <section class="deaals">
                <div class="container">

                    <form action="actionn.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="row">
                                    <div class="col-md-4 mb-4"> <label>Name</label> </div>
                                    <div class="col-md-8"> <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>"> </div>
                                </div>
                            </div>
                            <div class=" col-md-6 mb-4 ">
                                <div class=" row">
                                    <div class="col-md-4 "> <label>Qualification: </label> </div>
                                    <div class="col-md-8"> <input type=" text" class="form-control" name="qualification" value="<?php echo $row['qualification'] ?>"></div>
                                </div>
                            </div>
                            <div class=" col-md-6 mb-4 ">
                                <div class=" row">
                                    <div class="col-md-4 "> <label>Designation: </label> </div>
                                    <div class="col-md-8"> <input type=" text" class="form-control" name="designation" value="<?php echo $row['designation'] ?>"></div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="row">
                                    <div class="col-md-4"> <label>Image:</label></div>
                                    <div class="col-md-8"><input type="file" class="form-control" name="image" accept="image/*" id="fileToUpload"><img src="uploads/<?= $row['image']; ?>" style="height:50px; weight:50px;"></div>
                                </div>
                            </div>

                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                        </div>
                        <center><button class="btn btn-success btn-sm" type="submit" name="teacher_update">Submit</button> </center> <br><br>
                    </form>

            </section>

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


    <!-- Main Footer -->
    <?php include "layouts/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php include "layouts/js.php"; ?>
</body>

</html>