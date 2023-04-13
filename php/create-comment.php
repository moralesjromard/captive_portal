<?php

require_once '../config.php';
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$post_id = $_SESSION['post_id'];
$user_id = $_SESSION['login_id'];
$comment_text = mysqli_real_escape_string($db_connection, $_POST["comment-text"]);

if (strlen($comment_text) > 1) {
  $sql = "INSERT INTO comments(post_id, user_id, text) VALUES({$post_id}, {$user_id}, '{$comment_text}')";
  $result = mysqli_query($db_connection, $sql);

  if ($result) {
    echo "success";
  }
}

