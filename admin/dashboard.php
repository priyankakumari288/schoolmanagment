<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:index.php');
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <?php include ("layouts/css.php")?>
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
  </style>
  
 </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "layouts/header.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include ("layouts/sidebar.php")?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
       
        </div>
      </div>
    </div>
    <!-- /.content-header -->
<!-- <section>
  <div class="container-fluid">
    <center><h1><b> Kendriya Vidyalaya Latehar</b></h1>
    <p>(A Co-Educational English Medium School)</p></center>
    <center><h4>Kendriya Vidyalaya Latehar <br>
      Post : Latehar, Dist : Latehar, <br> State : Jharkhand, PIN : 829206</h4> </center>

  </div>
</section> -->
<section>

    <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
   
          </div>
          <div class="col-sm" >
            <h3 style="color:rgb(34, 34, 129) ;"><b>Kendriya Vidyalaya Latehar</b></h3>
            <div>
            <h7 style="color: blue; padding-left: 30px; text-align: right;" >(A Co-Educational English Medium School)</h7>
        </div>
        <div>
            <h5 style="margin-top: 30px;"> PGQF+267, Kinamanr, latehar Jharkhand 829206</h5>
            <p style="text-align: center; color: rgb(8, 8, 142); font-weight: bolder;">CONTACT: +91-7070446356</p>
            <div>
            <p style="text-align: center; font-size:140%; color: rgb(212, 6, 6); margin-top: 100px; font-weight: bolder;">Powered By @BrightCode Software Pvt. Ltd</p>
            </div>
        </div>
          </div>
          <div class="col-sm">

          </div>
        </div>
      </div>
</section>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
 <?php include "layouts/footer.php";?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include "layouts/js.php";?>
</body>
</html>
