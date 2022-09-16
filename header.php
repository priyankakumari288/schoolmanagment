<?php
session_start();
include 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/kvslogo.png" style="height: 70px; width:100px;" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mr-5">
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="indexx.php"><i class="fa-solid fa-house mr-2"></i>Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link active " href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-newspaper mr-2"></i>About</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="about.php">About KVS</a>
                            <a class="dropdown-item" href="principaldesk.php">Principal Desk</a>
                            <a class="dropdown-item" href="https://kvsangathan.nic.in/about-us/commissioners-msg">Commissioner's Message</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link active" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-plus mr-2"></i>Admission</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admissiondetails.php">Admission Details</a>
                            <!-- <a class="dropdown-item" href="">E-Prospectus</a> -->
                            <a class="dropdown-item" href="feestructure.php">Fee Structure</a>
                            <a class="dropdown-item" href="facalities.php">Facalities</a>
                            <a class="dropdown-item" href="infra.php">Infastructure</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link active" dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-plus mr-2"></i>Activities</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"  href="calender.php">Calendar of Activities</a>
                            <a class="dropdown-item"  href="Co-curricular.php">Co-curricular-activities</a>
                            
                        </div>
                    </li>
                    <li class="nav-item  mr-5">
                        <a class="nav-link active" href="teacher.php"><i class="fa-solid fa-plus mr-2"></i>Teachers</a>
                    </li>

                    <li class="nav-item  mr-5">
                        <a class="nav-link active" href="gallary.php"><i class="fa-solid fa-plus mr-2"></i>Gallary</a>
                    </li>
                    <li class="nav-item  mr-5">
                        <a class="nav-link active" href="contact.php"><i class="fa-solid fa-phone mr-2"></i>Contact</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3>
                    <a href="admin/index.php"><b><i class="fa-solid fa-user" style="color: white;"></i></a></b>
                </h3>
            </div>
    </nav>
    </div>