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


            <!-- about us start -->
            <br><br>
            <center>
                <div class="col-md-4">
                    <h3 class="text-center">
                        Principal Desk Cms</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <section class="deaals">
                <div class="container">

                    <form action="actionn.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="row">
                                    <div class="col-md-4 mb-4"> <label>Heading:</label> </div>
                                    <div class="col-md-8"> <input type="text" class="form-control" name="heading""> </div>
                </div>
              </div>
              <!-- <div class=" col-md-6 mb-4 ">
                    <div class=" row">
                                        <div class="col-md-4 "> <label>Title </label> </div>
                                        <div class="col-md-8"> <input type=" text" class="form-control" name="title"></div>
                                    </div>
                                </div> -->

                                <div class="col-md-6 mb-4">
                                    <div class="row">
                                        <div class="col-md-4"> <label>Image:</label></div>
                                        <div class="col-md-8"><input type="file" class="form-control" name="image" accept="image/*" id="fileToUpload" required=""></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="row">
                                        <div class="col-md-4"> <label>Paragraph</label></div>
                                        <div class="col-md-8"><textarea name="paragraph" id="" cols="5" rows="5" class="form-control"></textarea></div>
                                    </div>
                                </div>

                            </div>
                            <center><button class="btn btn-success btn-sm" type="submit" name="principalcms">Submit</button> </center> <br><br>
                    </form>


                    <div class="row">
                        <table class="table table-striped" border="2 solid black">
                            <thead>
                                <tr align="center">
                                    <th>S.no</th>
                                    <th>Heading</th>
                                    <th>Paragraph</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from principaldesk where status = '1' ";
                                $res = mysqli_query($conn, $sql);
                                $sn = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $sn++;
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo  $sn;  ?> </td>
                                        <td> <?php echo $row['heading'];  ?> </td>

                                        <td> <?php echo $row['paragraph'];  ?> </td>
                                        <td><img src="uploads/<?= $row['image']; ?>" width="100" height="100"></td>
                                        <td> <a href="actionn.php?prid=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i> </a>
                                       <a href="principalupdate.php?id=<?php echo $row['id']; ?>" class="text-white" name="upda"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>


            </section>

            <!---- about us close ----->







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