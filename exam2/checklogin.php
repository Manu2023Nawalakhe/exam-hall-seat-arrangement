<?php
include "connection.php";
  $email = $_POST['email'];
  $password = $_POST['pass'];
  
 //database connection here
 $con = new mysqli("localhost","root","","exam_hall");
 echo $password;
 echo $email;
 $sql = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'";
 $result = $conn->query($sql);
 if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['loggedin'] = true;
 header("location: ./index.php");
 echo"<h2>Login Sucessfully</h2>";
}
else{
   echo"<h2>Invalide Email or password</h2>";
   echo "ERROR: Hush! Sorry $sql. "
   . mysqli_error($conn);
    session_start();
    $_SESSION['loggedin'] = true;
 header("location: ./index.php");
 echo"<h2>Login Sucessfully</h2>";
}

?>