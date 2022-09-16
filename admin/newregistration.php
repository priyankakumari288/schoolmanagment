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
                        Registration Form</h3>
                    <hr class="style13"><br>
                </div>
            </center>

            <div class="container">

                <form action="action.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">

                                    <label>Session:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <select id="session" name="session" class="form-control ">
                                        <option value="state">Select</option>

                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2017-2018">2017-2018</option>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Student Name:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select id="prefix" name="prefix" class="form-control">
                                                <option value="state">Select</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Miss">Miss</option>
                                            </select>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="studentname" id="studentname" placeholder="Full Name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label>Last Attend Class:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="text" name="lastattend" id="lastattend" placeholder="Full Name" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Gender:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <label>Male</label><input type="radio" name="gender" id="gender" value="male" class="mr-4">
                                    <label>Female</label><input type="radio" name="gender" id="gender" class="female" value="female">
                                    <label>Other</label> <input type="radio" name="gender" id="gender" class="other" value="other">
                                </div>

                                <div class="col-md-3">
                                    <label>Date of Birth:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="date" name="dob" id="dob" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>E-mail:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Mother Tongue</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="" name="mothertongue" id="mothertongue" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Nationality</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="" name="nationality" id="nationality" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Class Attended</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="" name="classattended" id="classattended" class="form-control">
                                </div>

                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Class</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="class" name="class" class="form-control">
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
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>TC No.:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="tc" id="tc" class="form-control">
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Section</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="class" name="section" class="form-control">
                                                <option value="state">Select</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Roll No.:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="roll" id="roll" class="form-control">
                                        </div>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Caste</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="caste" name="caste" class="form-control">
                                                <option value="SELECT">Select</option>
                                                <option value="General">General</option>
                                                <option value="OBC">OBC</option>
                                                <option value="SC">SC</option>
                                                <option value="ST">ST</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Adhar No.:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" maxlength="12" minlength="12" name="adhar" id="adhar" class="form-control">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <label>BPL:</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <input type="text" name="bpl" id="bpl" class="form-control">
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <label style="width:120px;height:110px;border:1px solid black;"></label>
                            <input type="file" name="image" accept="image/*" id="fileToUpload"="">

                        </div>

                    </div>
                    <br>
                    <h3>Paticulars</h3>
                    <hr>
                    <div class="row">

                        <div class="col-md-3">
                            <label>Father's Name:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <select id="prifixs" name="prifixs" class="form-control">
                                        <option value="state">Select</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="fathers" id="fathers" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label>Mother's Name:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <select id="prifixss" name="prifixss" class="form-control">
                                        <option value="state">Select</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="mothers" id="mothers" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label>Gardian Name:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <select id="prifixsss" name="prifixsss" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="gardian" id="gardian" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Occupation</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="occupation" id="occupation" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Income:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" maxlength="20" minlength="20" name="income" id="income" class="form-control">
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mobile No.:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" maxlength="10" minlength="10" name="mobile" id="mobile" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Gardian Mobile No.:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" maxlength="10" minlength="10" name="gardianmobile" id="gardianmobile" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div><br>
                    <h3>Prasent Address</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Address:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="text" name="address" id="address" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>State:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="text" name="state" id="state" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>City:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="text" name="city" id="city" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>Pin Code:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="number" maxlength="6" minlength="6" name="pincode" id="pincode" class="form-control">
                        </div>


                    </div><br>
                    <h3>Parmanent Address</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Same as Permanent Address:</label> <input type="checkbox" name="sameaspermanent" id="sameaspermanent">
                        </div>
                        <div class="col-md-3">
                            <label>Address:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="text" name="paddress" id="paddress" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>State:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="text" name="pstate" id="pstate" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>City:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="text" name="pcity" id="pcity" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>Pin Code:</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="number" maxlength="6" minlength="6" name="ppincode" id="ppincode" class="form-control">
                        </div>

                    </div><br>
                    <center>
                        <h3>Decleration</h3>
                    </center>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <p><input type="checkbox" name="sameaspermanent" id="sameaspermanent">&nbsp;&nbsp; I have the prospectus and hereby i agree to abide by the rules and
                                regulations of the school and an responsible for the conduct of child. i agree to pay all fee in advance.</p>

                        </div>
                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Admission Date</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="admissiondate" id="admissiondate" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Registration No.:</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" maxlength="20" minlength="20" name="registration" id="registration" class="form-control">
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Admission No.</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="admissionn" id="admissionn" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Admission Granted to class:</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" maxlength="20" minlength="20" name="admissiong" id="admissiong" class="form-control">
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Parents/Gurdian's Signature</label>
                                </div>
                                <div class="col-md-6">
                                    <!-- <input type="" name="parentsignature" id="parentsignature" class="form-control" > -->
                                    <input type="file" name="signatureimage" accept="image/*" id="fileToUpload">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <label> Principal Signature:</label>
                                </div>
                                <div class="col-md-7">
                                    <!-- <input type="" maxlength="20" minlength="20" name="principalsignature" id="income" class="form-control" > -->
                                    <input type="file" name="principalimage" accept="image/*" id="fileToUpload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <center><button class="btn btn-success" name="register" type="submit">Register</button></center><br>
                    <br>

                </form>

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

    <!--  SCRIPTS -->

    <!-- jQuery -->
    <?php include "layouts/js.php"; ?>
</body>

</html>