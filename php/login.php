<?php

require_once '../config.php';
$email = mysqli_real_escape_string($db_connection, $_POST["email"]);
$password = mysqli_real_escape_string($db_connection, $_POST["password"]);


if (empty($email) || empty($password)) {
  echo "Invalid email or password";
} else {
  $sql = "SELECT * from users WHERE email = '{$email}'";
  $result = mysqli_query($db_connection, $sql);
  $row_count = mysqli_num_rows($result);

  if ($row_count > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
      if ($email == $row['email'] && $password == 'lvcc2023') {
        $_SESSION['login_id'] = $row['google_id']; 
        
        echo 'success';
      } else {
        echo "Invalid email or password";
      }
    } 
  } else {
    echo "Invalid email or password";
  }
}
