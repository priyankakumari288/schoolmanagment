<?php
session_start();
include '../connection.php';
$id = $_SESSION['last_id'];
$sql = "SELECT payment.*,register.studentname,register.class,register.roll FROM `payment` LEFT JOIN `register` ON payment.admissionnumb=register.admissionn WHERE payment.id=$id;";

$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>

<html>
<head>

</head>
<body onload="window.print()">
    <form name="pay">
        <table width="800" frame="box" align="center">
            <tbody>
                <tr>
                </tr>
                <tr>
                    <td> <label style="float: left;"><img src="dist/img/kvs.png" class="img-fluid" height="60" width="60"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <label style="font-size:28px; color:black;  font:bold; font-weight: 900">
                            <center>KENDRIYA VIDYALAYA LATEHAR</center>
                        </label>
                        <label style="font-size:17px; color:#1A5276;  font:bold; font-weight: 900">
                            <center>(A Co-Educational English Medium School)</center>
                        </label>
                        <label style="font-size:17px; color:black;  font:bold; font-weight: 900">
                            <center>PGQF+267, Kinamanr,Latehar(Jharkhand) 829206</center>
                        </label>
                        <label style="font-size:17px; color:black;  font:bold; font-weight: 900">
                            <center>Contact : +91-7070446356</center>
                        </label>
                    </td>
                </tr>
                </tr>
            </tbody>
        </table>
        <table width="800" frame="box" align="center">
            <tbody>
                <tr>
                    <td style="margin-left:80%;"><b>Receipt No:</b>&nbsp;&nbsp;<span><?php echo $row['recipt']; ?></span></td>
                    <td style="margin-left:80%;"><b>Name Of Student:</b>&nbsp;&nbsp;<span><?php echo $row['studentname']; ?></td>
                    <td style="margin-left:80%;"><b>Admission No.</b>&nbsp;&nbsp;<span><?php echo $row['admissionnumb']; ?></td>
                    <td style="margin-left:80%;"><b>Date:</b><span>&nbsp;&nbsp;<?php echo $row['date']; ?></td>
                </tr>
                <tr>
                    <td><b>Months: </b>&nbsp;&nbsp;<?php echo $row['month']; ?> </td>
                    <td><b>Roll_no:</b>&nbsp;&nbsp;<?php echo $row['roll']; ?></td>
                    <td><b>Pay Mode:</b>&nbsp;&nbsp;<?php echo $row['paymentmode']; ?></td>
                    <td><b>Class: </b>&nbsp;&nbsp;<?php echo $row['class']; ?></td>
            </tbody>
        </table>
        
        <table width="800" frame="box" align="center">
            <tbody>
                <tr>
                    <td width="80"><b>Serial no</b></td>
                    <td><b>Particulars</b></td>
                    <td><b>Amount Rs</b></td>

                </tr>
                <tr>
                    <td width="70">1</td>
                    <td>Admission </td>
                    <td><span><?php echo $row['admissionfee']; ?></span></td>
                </tr>

                <tr>
                    <td width="80">2</td>
                    <td>Tution Fee </td>
                    <td><?php echo $row['tutionfee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">3</td>
                    <td>Late Fine</td>
                    <td><?php echo $row['latefee']; ?></span></td>
                </tr>

                <tr>
                    <td width="80">4</td>
                    <td>Examination Fee</td>
                    <td><?php echo $row['examinationfee']; ?></span></td>
                </tr>

                <tr>
                    <td width="80">5</td>
                    <td>Game/Sports Fee</td>
                    <td><?php echo $row['gamefee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">6</td>
                    <td>Books and Stationary</td>
                    <td><?php echo $row['bookfee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">7</td>
                    <td>Library Charge</td>
                    <td><?php echo $row['libraryfee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">8</td>
                    <td>Computer Fee</td>
                    <td><?php echo $row['computerfee']; ?></span></td>
                </tr>


                <tr>
                    <td></td>
                    <td><b>Total :</b></td>
                    <td>
                        <p style="margin:0px; font-weight:bold;"></p>
                        <?php echo $row['total']; ?></span>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td><b>Paid :</b></td>
                    <td>
                        <p style="margin:0px; font-weight:bold;"></p>
                        <?php echo $row['paid']; ?></span>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td><b>Due :</b></td>
                    <td>
                        <p style="margin:0px; font-weight:bold;"></p>
                        <?php echo $row['due']; ?></span>
                    </td>
                </tr>

            </tbody>
        </table>
        <table width="800" frame="box" align="center">
            <tbody>
                <tr style="margin-top: 25px;">
                    <td style="float: right;margin-top: 20px; margin-right: 10px;">Student Sign</td>
                </tr>
                
            </tbody>
        </table>

        <div style="border-bottom:1px dotted #000000; height:30px;"></div><br><br>

    </form>

    <form name="pay">
        <table width="800" frame="box" align="center">
            <tbody>
                <tr>
                </tr>
                <tr>
                    <td> <label style="float: left;"><img src="dist/img/kvs.png" class="img-fluid" height="60" width="60"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <label style="font-size:28px; color:black;  font:bold; font-weight: 900">
                            <center>KENDRIYA VIDYALAYA LATEHAR</center>
                        </label>
                        <label style="font-size:17px; color:#1A5276;  font:bold; font-weight: 900">
                            <center>(A Co-Educational English Medium School)</center>
                        </label>
                        <label style="font-size:17px; color:black;  font:bold; font-weight: 900">
                            <center>PGQF+267, Kinamanr,Latehar(Jharkhand) 829206</center>
                        </label>
                        <label style="font-size:17px; color:black;  font:bold; font-weight: 900">
                            <center>Contact : +91-7070446356</center>
                        </label>
                    </td>
                </tr>
                </tr>
            </tbody>
        </table>
        <table width="800" frame="box" align="center">
            <tbody>
                <tr>
                    <td style="margin-left:80%;"><b>Receipt No:</b>&nbsp;&nbsp;<span><?php echo $row['recipt']; ?></span></td>
                    <td style="margin-left:80%;"><b>Name Of Student:</b>&nbsp;&nbsp;<span><?php echo $row['studentname']; ?></td>
                    <td style="margin-left:80%;"><b>Admission No.</b>&nbsp;&nbsp;<span><?php echo $row['admissionnumb']; ?></td>
                    <td style="margin-left:80%;"><b>Date:</b><span>&nbsp;&nbsp;<?php echo $row['date']; ?></td>
                </tr>
                <tr>
                    <td><b>Months: </b>&nbsp;&nbsp;<?php echo $row['month']; ?> </td>

                    <td><b>Roll_no:</b>&nbsp;&nbsp;<?php echo $row['roll']; ?></td>
                    <td><b>Pay Mode:</b>&nbsp;&nbsp;<?php echo $row['paymentmode']; ?></td>
                    <td><b>Class: </b>&nbsp;&nbsp;<?php echo $row['class']; ?></td>
            </tbody>

        </table>

        <table width="800" frame="box" align="center">
            <tbody>
                <tr>
                    <td width="80"><b>Serial no</b></td>
                    <td><b>Particulars</b></td>
                    <td><b>Amount Rs</b></td>
                </tr>
                <tr>
                    <td width="70">1</td>
                    <td>Admission </td>
                    <td><span><?php echo $row['admissionfee']; ?></span></td>
                </tr>

                <tr>
                    <td width="80">2</td>
                    <td>Tution Fee </td>
                    <td><?php echo $row['tutionfee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">3</td>
                    <td>Late Fine</td>
                    <td><?php echo $row['latefee']; ?></span></td>
                </tr>

                <tr>
                    <td width="80">4</td>
                    <td>Examination Fee</td>
                    <td><?php echo $row['examinationfee']; ?></span></td>
                </tr>

                <tr>
                    <td width="80">5</td>
                    <td>Game/Sports Fee</td>
                    <td><?php echo $row['gamefee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">6</td>
                    <td>Books and Stationary</td>
                    <td><?php echo $row['bookfee']; ?></span></td>
                </tr>
                <tr>
                    <td width="80">8</td>
                    <td>Library Charge</td>
                    <td><?php echo $row['libraryfee']; ?></span></td>
                </tr>




                <tr>
                    <td width="80">10</td>
                    <td>Computer Fee</td>
                    <td><?php echo $row['computerfee']; ?></span></td>
                </tr>


                <tr>
                    <td></td>
                    <td><b>Total :</b></td>
                    <td>
                        <p style="margin:0px; font-weight:bold;"></p>
                        <?php echo $row['total']; ?></span>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td><b>Paid :</b></td>
                    <td>
                        <p style="margin:0px; font-weight:bold;"></p>
                        <?php echo $row['paid']; ?></span>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td><b>Due :</b></td>
                    <td>
                        <p style="margin:0px; font-weight:bold;"></p>
                        <?php echo $row['due']; ?></span>
                    </td>
                </tr>

            </tbody>
        </table>
        <table width="800" frame="box" align="center">
            <tbody>
                <tr style="margin-top: 25px;">
                    <td style="float: right;margin-top: 20px; margin-right: 10px;">Student Sign</td>
                </tr>
                
               
            </tbody>
        </table>

        <!-- <div style="border-bottom:1px dotted #000000; height:30px;"></div><br><br> -->

    </form>







</body>

</html>