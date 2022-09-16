<?php
session_start();
include '../connection.php';

if (isset($_POST['ajaxinset'])) {
    // print_r($_POST);die;
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "SELECT  * FROM `login` WHERE `username`='$username' AND `password`='$password'";

    $sql = "SELECT `id`, `username`, `password` FROM `login`";
    // print_r($sql);die;
    $res3 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res3);
    // print_r($row);die;
    $_SESSION['id'] = $row['id'];
    // print_r($_SESSION);
    // die;
    // echo json_encode($row);
    print_r($row);
}

//  image upload

function Imageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
    $error = "";
    if (file_exists($_FILES["$inputname"]["tmp_name"])) {
        //do this contain any file check
        $file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));

        if (in_array($file_extension, $allext)) {
            //file extension check
            list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
            $image_weight = $_FILES["$inputname"]["size"];
            if ($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size") {
                //dimension check
                $tmp = $_FILES["$inputname"]["tmp_name"];
                $extension[1] = "jpg";
                //$extension = explode(".", $_FILES["$inputname"]["name"]);
                $name = $newname . "." . $extension[1];
                //$extension[1] ="jpg";
                if (move_uploaded_file($tmp, "$dir" . $newname . "." . $extension[1])) {
                    return true;
                    //echo "$dir $newname.$extension[1]";
                }
            } else {
                $error .= "Please upload photo size of $pass_width X $pass_height";
                //echo $error;
            }
        } else {
            $error .= "Please Upload an Image";
            //echo $error;
        }
    } else {
        //print_r($_FILES);
        $error .= "Please Select an Image";
        // $error;
    }
    return $error;
}

// registration page

if (isset($_POST['register'])) {
    $session = $_POST['session'];
    $prefix = $_POST['prefix'];
    $studentname = $_POST['studentname'];
    $lastattend = $_POST['lastattend'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mothertongue = $_POST['mothertongue'];
    $nationality = $_POST['nationality'];
    $classattended = $_POST['classattended'];
    $class = $_POST['class'];
    $tc = $_POST['tc'];
    $section = $_POST['section'];
    $roll = $_POST['roll'];
    $caste = $_POST['caste'];
    $adhar = $_POST['adhar'];
    $bpl = $_POST['bpl'];
    // photo
    $image =  $_FILES['image']['name'];

    $photo = explode('.', $image);
    $image =  $photo[0];

    $dir = "imagere/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
    $check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $image);
    $image .= ".jpg";
    // print_r($image);die;

    $signatureimage =  $_FILES['signatureimage']['name'];

    $photo1 = explode('.', $signatureimage);
    $image1 =  $photo1[0];

    $dir = "imagere/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
    $check = Imageupload($dir, 'signatureimage', $allext, "1920", "700", '10000000', $image1);
    $image1 .= ".jpg";


    $principalimage =  $_FILES['principalimage']['name'];

    $photo2 = explode('.', $principalimage);
    $image2 =  $photo2[0];

    $dir = "imagere/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
    $check = Imageupload($dir, 'principalimage', $allext, "1920", "700", '10000000', $image2);
    $image2 .= ".jpg";

    $prifixs = $_POST['prifixs'];
    $fathers = $_POST['fathers'];
    $prifixss = $_POST['prifixss'];
    $mothers = $_POST['mothers'];
    $prifixsss = $_POST['prifixsss'];
    $gardian = $_POST['gardian'];
    $occupation = $_POST['occupation'];
    $income = $_POST['income'];
    $mobile = $_POST['mobile'];
    $gardianmobile = $_POST['gardianmobile'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $paddress = $_POST['paddress'];
    $pstate = $_POST['pstate'];
    $pcity = $_POST['pcity'];
    $ppincode = $_POST['ppincode'];
    $admissiondate = $_POST['admissiondate'];
    $registration = $_POST['registration'];
    // $admission = $_POST['admission'];
    $admissionn = $_POST['admissionn'];
    $admissiong = $_POST['admissiong'];



    $q = "INSERT INTO `register`(`session`, `prefix`, `studentname`, `lastattend`, `gender`, `dob`, 
    `email`, `mothertongue`, `nationality`, `classattended`, `class`, `tc`, `section`, `roll`, `caste`, 
    `adhar`, `bpl`, `image`, `prifixs`, `fathers`, `prifixss`, `mothers`, `prifixsss`, `gardian`, 
    `occupation`, `income`, `mobile`, `gardianmobile`, `address`, `state`, `city`, `pincode`, `paddress`, 
    `pstate`, `pcity`, `ppincode`, `admissiondate`, `registration`, `admissionn`, `admissiong`,`signatureimage`,`principalimage`) VALUES 
	('$session', '$prefix', '$studentname', '$lastattend', '$gender', '$dob', 
    '$email', '$mothertongue', '$nationality',' $classattended', '$class', '$tc', '$section', '$roll', 
	'$caste',  '$adhar',' $bpl', '$image', '$prifixs', '$fathers', '$prifixss', '$mothers',' $prifixsss', '$gardian', 
    '$occupation', '$income', '$mobile', '$gardianmobile', '$address', '$state', '$city', '$pincode', '$paddress', 
    '$pstate', '$pcity', '$ppincode', '$admissiondate', '$registration', '$admissionn', '$admissiong', '$signatureimage','$principalimage' )";

    $query = mysqli_query($conn, $q);
    if ($query == true) {
        header('location:dashboard.php');
    }
}
// registration class  
if (isset($_POST['ajaxinsett'])) {
    if (!empty($_POST['class_wise'])) {
        $class_wise = $_POST['class_wise'];
        $sql = "SELECT * FROM `register` WHERE `class`=$class_wise";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
                <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
                echo $html;
            }
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}

// / / registration admission 

if (isset($_POST['ajaxinsettt'])) {
    if (!empty($_POST['admissionn_wise'])) {
        $admissionn_wise = $_POST['admissionn_wise'];
        $sql = "SELECT * FROM `register` WHERE `admissionn`=$admissionn_wise";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td ><a href="updatereglist.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
                <a href="action.php?id=' . $row['id'] . '&admissiondelete=admissionndelete" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}

// ajax  delete registration admission
if (isset($_GET['admissiondelete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `register` WHERE `id`='$id'";
    $q = mysqli_query($conn, $sql);
    if ($nr == 1) {
        $msg = $_SESSION['deleted succesfully'];
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

// ajax update registration admission
if (isset($_POST['update_reglist'])) {

    $id = $_POST['id'];
    $admissionn = $_POST['up_adm'];
    $class = $_POST['up_class'];
    $studentname = $_POST['up_name'];
    $fathers = $_POST['up_fatheras'];
    $admissiondate = $_POST['up_date'];
    $session = $_POST['up_session'];
    $sql = "UPDATE `register` SET `admissionn`='$admissionn',`class`='$class', `studentname`='$studentname',`fathers`='$fathers',`admissiondate`='$admissiondate',`session`='$session' WHERE `id`='$id'";
    $q = mysqli_query($conn, $sql);
    echo $q;
    // echo $q;
}

// session wise  session list

if (isset($_POST['searchajaxins'])) {
    if (!empty($_POST['session_wise'])) {
        $session_wise = $_POST['session_wise'];
        $sql = "SELECT * FROM `register` WHERE `session`='$session_wise'";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                $html .= '<td>' . $row['admissionn'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td>' . $row['dob'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
                echo $html;
            }
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}
// student name search list

if (isset($_POST['studentajax'])) {
    if (!empty($_POST['studentname_wise'])) {
        $studentname_wise = $_POST['studentname_wise'];
        $sql = "SELECT * FROM `register` WHERE `studentname`='$studentname_wise'";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                // $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td>' . $row['dob'] . '</td>';
                $html .= '<td ><a href="updatesearch.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="action.php?id=' . $row['id'] . '&searchdelete=searchdelete" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}

// ajax  delete session_wise  search
if (isset($_GET['searchdelete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `register` WHERE `id`='$id'";
    $q = mysqli_query($conn, $sql);
    if ($nr == 1) {
        $msg = $_SESSION['deleted succesfully'];
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

// ajax  update  session_wise  search
if (isset($_POST['update_sessionsearch'])) {

    $id = $_POST['id'];
    $admissionn = $_POST['up_adm'];
    $class = $_POST['up_class'];
    $studentname = $_POST['up_name'];
    $fathers = $_POST['up_fatheras'];
    $admissiondate = $_POST['up_date'];
    $session = $_POST['up_session'];
    $dob = $_POST['up_dob'];
    $sql = "UPDATE `register` SET `admissionn`='$admissionn',`class`='$class', `studentname`='$studentname',`fathers`='$fathers',`admissiondate`='$admissiondate',`session`='$session',`dob`='$dob' WHERE `id`='$id'";
    $q = mysqli_query($conn, $sql);
    echo $q;
    // echo $q;
}


//  classwise class  searchhh 

if (isset($_POST['classajaxinsett'])) {
    if (!empty($_POST['cclass_wise'])) {
        $cclass_wise = $_POST['cclass_wise'];
        $sql = "SELECT * FROM `register` WHERE `class`='$cclass_wise'";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                // $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';
                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['mobile'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';

                $html .= '</tr>';
                echo $html;
            }
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}


// classwise name search

if (isset($_POST['classnameajaxinsett'])) {
    // print_r($_POST);die;
    if (!empty($_POST['classname_wise'])) {
        // print_r($_POST['session_wise']);die;
        $classname_wise = $_POST['classname_wise'];
        // print_r($session_wise);die;
        // print_r($session_wise);die;
        $sql = "SELECT * FROM `register` WHERE `studentname`='$classname_wise'";
        // print_r($sql);die;
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        // print_r($num_row);die;
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                // $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';

                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['mobile'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';

                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}

// classwise mobile search

if (isset($_POST['mobileajaxinset'])) {


    if (!empty($_POST['classmobile_wise'])) {

        $classmobile_wise = $_POST['classmobile_wise'];

        $sql = "SELECT * FROM `register` WHERE `mobile`='$classmobile_wise'";

        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);

        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                // $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';

                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['mobile'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';

                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}

// classwise admission search

if (isset($_POST['admissionajaxinset'])) {
    // print_r($_POST);die;
    if (!empty($_POST['admission_wise'])) {
        // print_r($_POST['session_wise']);die;
        $admission_wise = $_POST['admission_wise'];
        // print_r($session_wise);die;
        // print_r($session_wise);die;
        $sql = "SELECT * FROM `register` WHERE `admissionn`='$admission_wise'";
        // print_r($sql);die;
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        // print_r($num_row);die;
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                // $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['admissionn'] . '</td>';
                $html .= '<td>' . $row['studentname'] . '</td>';
                $html .= '<td>' . $row['fathers'] . '</td>';
                $html .= '<td>' . $row['admissiondate'] . '</td>';
                $html .= '<td>' . $row['session'] . '</td>';
                $html .= '<td>' . $row['class'] . '</td>';
                $html .= '<td>' . $row['mobile'] . '</td>';
                $html .= '<td ><a href="updateclasssearch.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';

                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="8">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}
// ajax  update  class_wise  search
if (isset($_POST['update_classsearch'])) {

    $id = $_POST['id'];
    $admissionn = $_POST['up_adm'];
    $studentname = $_POST['up_name'];
    $fathers = $_POST['up_fathers'];
    $admissiondate = $_POST['up_date'];
    $session = $_POST['up_session'];
    $class = $_POST['up_class'];
    $mobile = $_POST['up_mobile'];
    $sql = "UPDATE `register` SET `admissionn`='$admissionn',`class`='$class', `studentname`='$studentname',`fathers`='$fathers',`admissiondate`='$admissiondate',`session`='$session',`mobile`='$mobile' WHERE `id`='$id'";
    $q = mysqli_query($conn, $sql);
    echo $q;
    // echo $q;
}

if (isset($_POST['monthlyajaxinset'])) {
    // print_r($_POST);die;

    if (!empty($_POST['admonnthly_wise'])) {

        $admonnthly_wise = $_POST['admonnthly_wise'];

        $sql = "SELECT * FROM `register` WHERE `admissionn`='$admonnthly_wise'";

        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        // print_r($num_row);die;
        if ($num_row > 0) {
            $row = mysqli_fetch_assoc($res3);
            $val =  json_encode($row);
            echo $val;
        }
    }
}


if (isset($_POST['monthlypayment'])) {
    // print_r($_POST);die;
    $admissionnumb = $_POST['admissionnumb'];
    $recipt = $_POST['recipt'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $nomonth = $_POST['nomonth'];
    $month = $_POST['month'];
    $paymentmode = $_POST['paymentmode'];
    $admissionfee = $_POST['admissionfee'];
    $tutionfee = $_POST['tutionfee'];
    $latefee = $_POST['latefee'];
    $examinationfee = $_POST['examinationfee'];
    $gamefee = $_POST['gamefee'];
    $bookfee = $_POST['bookfee'];
    $libraryfee = $_POST['libraryfee'];
    $computerfee = $_POST['computerfee'];
    $total = $_POST['total'];
    $paid = $_POST['paid'];
    $due = $_POST['due'];
    $_SESSION['admissionnumb'] = $admissionnumb;

    $q = "INSERT INTO `payment`(`admissionnumb`,`recipt`, `date`, `time`, `nomonth`, `month`, `paymentmode`, `admissionfee`, `tutionfee`, 
        `latefee`, `examinationfee`, `gamefee`, `bookfee`, `libraryfee`, `computerfee`, `total`, `paid`, `due`) VALUES ('$admissionnumb','$recipt',
        '$date','$time','$nomonth','$month','$paymentmode','$admissionfee','$tutionfee','$latefee','$examinationfee',
        '$gamefee','$bookfee','$libraryfee','$computerfee','$total','$paid','$due')";

    $query = mysqli_query($conn, $q);
    if ($query == true) {
        $last_id = $conn->insert_id;
        $_SESSION['last_id'] = $last_id;
        echo "success";
        header("location:paymetpdf.php");
    }
}

// class due payment admision search
if (isset($_POST['classdueajaxinset'])) {
    if (!empty($_POST['classdue_wize'])) {
        $classdue_wize = $_POST['classdue_wize'];
        $sql = "SELECT * FROM `payment` WHERE `admissionnumb`='$classdue_wize'";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                $html .= '<td>' . $row['admissionnumb'] . '</td>';
                $html .= '<td>' . $row['date'] . '</td>';
                $html .= '<td>' . $row['month'] . '</td>';
                $html .= '<td>' . $row['admissionfee'] . '</td>';
                $html .= '<td>' . $row['tutionfee'] . '</td>';
                $html .= '<td>' . $row['latefee'] . '</td>';
                $html .= '<td>' . $row['examinationfee'] . '</td>';
                $html .= '<td>' . $row['gamefee'] . '</td>';
                $html .= '<td>' . $row['bookfee'] . '</td>';
                $html .= '<td>' . $row['libraryfee'] . '</td>';
                $html .= '<td>' . $row['computerfee'] . '</td>';
                $html .= '<td>' . $row['total'] . '</td>';
                $html .= '<td>' . $row['paid'] . '</td>';
                $html .= '<td>' . $row['due'] . '</td>';
                $html .= '<td>' . $row['recipt'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a> 
                <a href="" class=""><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="16">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}




if (isset($_POST['sessiondueajaxinset'])) {

    $section = $_POST['sessiondue_wize'];
    $sql = "SELECT payment.*,register.section FROM `payment` LEFT JOIN `register` ON payment.admissionnumb=register.admissionn WHERE register.section='$section';";
    $res3 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res3);
    if ($row > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($res3)) {
            $i++;
            $html  = '<tr>';
            $html .= '<td>' . $row['admissionnumb'] . '</td>';
            $html .= '<td>' . $row['date'] . '</td>';
            $html .= '<td>' . $row['month'] . '</td>';
            $html .= '<td>' . $row['admissionfee'] . '</td>';
            $html .= '<td>' . $row['tutionfee'] . '</td>';
            $html .= '<td>' . $row['latefee'] . '</td>';
            $html .= '<td>' . $row['examinationfee'] . '</td>';
            $html .= '<td>' . $row['gamefee'] . '</td>';
            $html .= '<td>' . $row['bookfee'] . '</td>';
            $html .= '<td>' . $row['libraryfee'] . '</td>';
            $html .= '<td>' . $row['computerfee'] . '</td>';
            $html .= '<td>' . $row['total'] . '</td>';
            $html .= '<td>' . $row['paid'] . '</td>';
            $html .= '<td>' . $row['due'] . '</td>';
            $html .= '<td>' . $row['recipt'] . '</td>';
            $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a> 
            <a href="" class=""><i class="fa-solid fa-trash-can"></i></a></td>';
            $html .= '</tr>';
        }
        echo $html;
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="16">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}

// month due payment

if (isset($_POST['monthdueajaxinset'])) {
    // print_r($_POST); die;
    if (!empty($_POST['monthdue_wize'])) {
        $monthdue_wize = $_POST['monthdue_wize'];
        $sql = "SELECT * FROM `payment` WHERE `month`='$monthdue_wize'";
        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                $html .= '<td>' . $row['admissionnumb'] . '</td>';
                $html .= '<td>' . $row['date'] . '</td>';
                $html .= '<td>' . $row['month'] . '</td>';
                $html .= '<td>' . $row['admissionfee'] . '</td>';
                $html .= '<td>' . $row['tutionfee'] . '</td>';
                $html .= '<td>' . $row['latefee'] . '</td>';
                $html .= '<td>' . $row['examinationfee'] . '</td>';
                $html .= '<td>' . $row['gamefee'] . '</td>';
                $html .= '<td>' . $row['bookfee'] . '</td>';
                $html .= '<td>' . $row['libraryfee'] . '</td>';
                $html .= '<td>' . $row['computerfee'] . '</td>';
                $html .= '<td>' . $row['total'] . '</td>';
                $html .= '<td>' . $row['paid'] . '</td>';
                $html .= '<td>' . $row['due'] . '</td>';
                $html .= '<td>' . $row['recipt'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a> 
                <a href="" class=""><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="16">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}


// today payment 

if (isset($_POST['todayajaxinset'])) {
    // print_r($_POST);die;
    if (!empty($_POST['todaydate_wize'])) {
        $todaydate_wize = date('Y-m-d');

        $sql = "SELECT * FROM `payment` WHERE `date`='$todaydate_wize'";

        $res3 = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($res3);
        if ($num_row > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $i++;
                $html  = '<tr>';
                $html .= '<td>' . $i . '</td>';
                $html .= '<td>' . $row['month'] . '</td>';
                $html .= '<td>' . $row['total'] . '</td>';
                $html .= '<td>' . $row['paid'] . '</td>';
                $html .= '<td>' . $row['due'] . '</td>';
                $html .= '<td>' . $row['latefee'] . '</td>';
                $html .= '<td ><a href=""><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; 
            <a href="" class="mr-3"><i class="fa-solid fa-trash-can"></i></a></td>';
                $html .= '</tr>';
            }
            echo $html;
        }
    } else {
        $html  = '<tr>';
        $html .= '<td colspan="10">No Record</td>';
        $html .= '</tr>';
        echo  $html;
    }
}




