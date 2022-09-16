<?php
session_start();
include '../connection.php';
function BannerImageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
	if (file_exists($_FILES["$inputname"]["tmp_name"])) {
		//do this contain any file check
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error = "";
		if (in_array($file_extension, $allext)) {
			//file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];
			if ($width == "$pass_width" && $height == "$pass_height" && $image_weight <= "$pass_size") {
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
		}
	}
	return $error;
}

if (isset($_POST['banner_upload'])) {


	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$banner = time() . $photo[0];
	$dir = "uploads/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = BannerImageupload($dir, 'image', $allext, "1920", "700", '10000000', $banner);

	if ($check === true) {
		$banner .= ".jpg";

		if ($stmt = $conn->prepare("insert into banner set image=?")) {
			$stmt->bind_param('s', $banner);
			$stmt->execute();
			if ($stmt->affected_rows == 1) {
				$_SESSION['msg'] = "Banner Added Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				$_SESSION['msg'] = "User Not Added !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
		} else {
			$_SESSION['msg'] = "User Not Added !!!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	} else {
		$_SESSION['msg'] = $check;
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}
// home page banner delete 

if (isset($_GET['bannerid'])) {
	$id = $_GET['bannerid'];
	if ($id == "") {
		header('location:home.php');
	}
	$sql = "delete from banner where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = 'Banner Delete Successfully';
	} else {
		$_SESSION['msg'] = 'Banner Not Delete Successfully';
	}
	header('location:home.php');
}

// image function

function Imageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
	if (file_exists($_FILES["$inputname"]["tmp_name"])) {
		//do this contain any file check
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error = "";
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
				}
			} else {
				$error .= "Please upload photo size of $pass_width X $pass_height";
			}
		} else {
			$error .= "Please Upload an Image";
		}
	}
	return $error;
}
// home page about section insert

if (isset($_POST['done'])) {
	$heading = $_POST['heading'];
	$title = $_POST['title'];
	$paragraph = $_POST['paragraph'];

	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `about`(heading, title, paragraph,image) VALUES ( '$heading','$title','$paragraph','$image')";
	//    print_r($q);die;
	$query = mysqli_query($conn, $q);
	if ($query == true) {
		header('location:home.php');
	}
}

// home page about us  delete 
if (isset($_GET['aboutid'])) {
	$id = $_GET['aboutid'];
	if ($id == "") {
		header('location:home.php');
	}
	$sql = "delete from about where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:home.php');
}
// home page about us   update 

if (isset($_POST['homeabout_update'])) {

	$id = $_POST['id'];
	$heading = $_POST['heading'];
	$title = $_POST['title'];
	$paragraph = $_POST['paragraph'];
	$image =  $_FILES['image'];
	if ($_FILES['image']['name'] != '') {
		$image =  $_FILES['image']['name'];
		$photo = explode('.', $image);
		$img =  $photo[0];

		$dir = "uploads/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
		$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
		if ($check == true) {
			$img .= ".jpg";
			$q = "update about set id='$id', heading='$heading',title='$title',image='$img',paragraph='$paragraph' where `id`='$id' ";
		}
	} else {
		$q = "update about set id='$id', heading='$heading',title='$title',paragraph='$paragraph' where `id`='$id' ";
	}
	$query = mysqli_query($conn, $q);
	header('location:home.php');
}


// home page principal desk insert 

if (isset($_POST['principal'])) {
	$heading = $_POST['heading'];
	$title = $_POST['title'];
	$paragraph = $_POST['paragraph'];

	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `principalhome`(heading, title, paragraph,image) VALUES ( '$heading','$title','$paragraph','$image')";

	$query = mysqli_query($conn, $q);
	if ($query == true) {
		header('location:home.php');
	}
}
// home page principal desk delete

if (isset($_GET['principalid'])) {
	$id = $_GET['principalid'];
	if ($id == "") {
		header('location:home.php');
	}
	$sql = "delete from principalhome where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:home.php');
}

// home page update principal desk 

if (isset($_POST['homeprincipal_update'])) {

	$id = $_POST['id'];
	$heading = $_POST['heading'];
	$title = $_POST['title'];
	$paragraph = $_POST['paragraph'];
	$image =  $_FILES['image'];
	if ($_FILES['image']['name'] != '') {
		$image =  $_FILES['image']['name'];
		$photo = explode('.', $image);
		$img =  $photo[0];
		$dir = "uploads/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
		$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);

		if ($check == true) {
			$img .= ".jpg";
			$q = "update principalhome set id='$id', heading='$heading',title='$title',image='$img',paragraph='$paragraph' where `id`='$id' ";
		}
	} else {
		$q = "update principalhome set id='$id', heading='$heading',title='$title',paragraph='$paragraph' where `id`='$id' ";
	}
	$query = mysqli_query($conn, $q);
	header('location:home.php');
}


//   home page gallary insert

if (isset($_POST['gallaryhomes'])) {
	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "19200", "7000", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `gallaryhome`(`image`) VALUES ('$image')";

	$query = mysqli_query($conn, $q);
	if ($query == true) {
		header('location:home.php');
	}
}
// home page gallary  delete

if (isset($_GET['gallaryid'])) {
	$id = $_GET['gallaryid'];
	if ($id == "") {
		header('location:home.php');
	}
	$sql = "delete from gallaryhome where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:home.php');
}

// about page insert
if (isset($_POST['aboutcms'])) {
	$heading = $_POST['heading'];

	$paragraph = $_POST['paragraph'];

	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `aboutus`(heading, paragraph,image) VALUES ( '$heading','$paragraph','$image')";
	//    print_r($q);die;
	$query = mysqli_query($conn, $q);
	if ($query == true) {
		header('location:about_cms.php');
	}
}
//    about page delete
if (isset($_GET['aboutusid'])) {
	$id = $_GET['aboutusid'];
	if ($id == "") {
		header('location:about_cms.php');
	}
	$sql = "delete from aboutus where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:about_cms.php');
}

// about page update

if (isset($_POST['about_update'])) {

	$id = $_POST['id'];
	$heading = $_POST['heading'];
	
	$paragraph = $_POST['paragraph'];
	$image =  $_FILES['image'];
	if ($_FILES['image']['name'] != '') {
		$image =  $_FILES['image']['name'];
		$photo = explode('.', $image);
		$img =  $photo[0];

		$dir = "uploads/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
		$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
		if ($check == true) {
			$img .= ".jpg";
			$q = "update aboutus set id='$id', heading='$heading',image='$img',paragraph='$paragraph' where `id`='$id' ";
		}
	} else {
		$q = "update aboutus set id='$id', heading='$heading',paragraph='$paragraph' where `id`='$id' ";
	}
	$query = mysqli_query($conn, $q);
	header('location:about_cms.php');
}

// principal desk insert 
if (isset($_POST['principalcms'])) {
	$heading = $_POST['heading'];

	$paragraph = $_POST['paragraph'];
	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `principaldesk`(`heading`, `paragraph`,`image`) VALUES ('$heading','$paragraph','$image')";

	$query = mysqli_query($conn, $q);

	if ($query == true) {
		header('location:principal_cms.php');
	}
}

// principal desk update
if (isset($_POST['principal_update'])) {

	$id = $_POST['id'];
	$heading = $_POST['heading'];
	// $title = $_POST['title'];
	$paragraph = $_POST['paragraph'];
	$image =  $_FILES['image'];
	if ($_FILES['image']['name'] != '') {
		$image =  $_FILES['image']['name'];
		$photo = explode('.', $image);
		$img =  $photo[0];
		$dir = "uploads/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
		$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);

		if ($check == true) {
			$img .= ".jpg";
			$q = "update principaldesk set id='$id', heading='$heading',image='$img',paragraph='$paragraph' where `id`='$id' ";
		}
	} else {
		$q = "update principaldesk set id='$id', heading='$heading',paragraph='$paragraph' where `id`='$id' ";
	}
	$query = mysqli_query($conn, $q);
	header('location:principal_cms.php');
}

// principal desk delete

if (isset($_GET['prid'])) {
	$id = $_GET['prid'];
	if ($id == "") {
		header('location:home.php');
	}
	$sql = "delete from principaldesk where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:principal_cms.php');
}

// gallery page insert

if (isset($_POST['gallary'])) {
	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "19200", "7000", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `gallary`(`image`) VALUES ('$image')";

	$query = mysqli_query($conn, $q);
	if ($query == true) {
		header('location:gallery_cms.php');
	}
}
//    gallery page delete

if (isset($_GET['galleryyid'])) {
	$id = $_GET['galleryyid'];
	if ($id == "") {
		header('location:gallery_cms.php');
	}
	$sql = "delete from gallary where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:gallery_cms.php');
}

// teachers page insert

if (isset($_POST['teacher'])) {
	$name = $_POST['name'];
	$qualification = $_POST['qualification'];
	$designation = $_POST['designation'];

	$image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
	$dir = "uploads/";

	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);
	$img .= ".jpg";
	$q = "INSERT INTO `teacher`(name, qualification, designation,image) VALUES ( '$name','$qualification','$designation','$image')";

	$query = mysqli_query($conn, $q);
	if ($query == true) {
		header('location:teacher_cms.php');
	}
}

// teachers page delete

if (isset($_GET['teachersid'])) {
	$id = $_GET['teachersid'];
	if ($id == "") {
		header('location:home.php');
	}
	$sql = "delete from teacher where id='$id'";
	if (mysqli_query($conn, $sql) === true) {
		$_SESSION['msg'] = ' Delete Successfully';
	} else {
		$_SESSION['msg'] = ' Not Delete Successfully';
	}
	header('location:teacher_cms.php');
}

// teachers page update

if (isset($_POST['teacher_update'])) {
	$name = $_POST['name'];
	$qualification = $_POST['qualification'];
	$designation = $_POST['designation'];
	$image =  $_FILES['image'];
	if ($_FILES['image']['name'] != '') {
		$image =  $_FILES['image']['name'];
		
		$photo = explode('.', $image);
		$img =  $photo[0];
		$dir = "uploads/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
		$check = Imageupload($dir, 'image', $allext, "1920", "700", '10000000', $img);

		if ($check == true) {
			$img .= ".jpg";
			$q = "update teacher set id='$id', name='$name',qualification='$qualification',designation='$designation',image='$img' where `id`='$id' ";
			//  print_r($q);die;
		}
	} else {
		$q = "update teacher set id='$id', name='$name',qualification='$qualification',designation='$designation' where `id`='$id' ";
	}
	$query = mysqli_query($conn, $q);
	header('location:teacher_cms.php');
}