<?php
if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost'){
    $conn = new mysqli("localhost","root","","school");
}
else{
    $conn = new mysqli("localhost","","","");
}
if($conn->connect_errno){
       echo "connection failed";
 }
date_default_timezone_set('Asia/kolkata');

?>
