 <?php
session_start();
include '../connection.php';
$msg = '';
if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);
}
if ($msg != '') {
  echo "<script>alert('$msg')</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="login-box">
    <h2>Login</h2>
    <form action="action.php" method="post">
      <div class="user-box">
        <input type="text" name="username" id="username" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" id="password" required="">
        <label>Password</label>
      </div>
      
      <a class="lo" name="login" type="button" onclick="loginajex()">Login
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <!-- <button class="btn btn-success login"  type="submit" name="login"> Login </button><br> -->
      </a>
    </form>
    <a class="forget" href="" style="color: green;">Forget Password</a>
    <!-- <input type="button" href=""> -->
  </div>
  

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <script>   
    function loginajex(){
      debugger;
      var username = $('#username').val();
      var password = $('#password').val();
      
      $.ajax({
        type: "POST",
        url: "action.php",
        // dataType: "json",
        data: {username:username, password:password, ajaxinset:'ajaxinset'},
        success: function(result){
          // alert(result);
          if(result.id!=''){
           
            window.location.href = "dashboard.php";

          }else{
            alert('something Error!');
            window.location.href = "index.php";
          }
        }
        }
      );
    }
    </script>
</body>

</html>