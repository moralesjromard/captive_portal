<?php

  require_once "../config.php";
  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

  $outgoing_id = mysqli_real_escape_string($db_connection, $_POST["outgoing_id"]);
  $incoming_id = mysqli_real_escape_string($db_connection, $_POST["incoming_id"]);
  $message = mysqli_real_escape_string($db_connection, $_POST["chat-text-message"]);

  if (!empty($message)) {
    $sql = mysqli_query($db_connection, "INSERT INTO messages(incoming_message_id, outgoing_message_id, text_message) VALUES('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die();
  }