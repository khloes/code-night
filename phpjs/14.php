<?php
$conn = mysqli_connect('localhost','root','dbdn2974943');
mysqli_select_db($conn,'opentutorials');
$name = mysqli_real_escape_string($conn,$_GET['name']);
$password = mysqli_real_escape_string($conn,$_GET['password']);
$sql = "SELECT * FROM user WHERE name='".$name."' AND password ='".$password."'";
echo $sql;
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    if($result->num_rows == 0) {
      echo "뉘신지?";
    }else {
      echo "주인님 환영합니다";
    }
     ?>
  </body>
</html>
