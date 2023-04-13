<?php

  require_once "../config.php";
  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

  $outgoing_id = mysqli_real_escape_string($db_connection, $_SESSION['login_id']);
  $incoming_id = mysqli_real_escape_string($db_connection, $_SESSION['testing_lang']);
  $output = "";

  $sql = "SELECT * FROM messages 
  LEFT JOIN users ON users.google_id COLLATE utf8mb4_unicode_ci = messages.outgoing_message_id
  WHERE (outgoing_message_id = {$outgoing_id} AND incoming_message_id = {$incoming_id}) OR (outgoing_message_id = {$incoming_id} AND incoming_message_id = {$outgoing_id}) ORDER BY messages.id";
  $query = mysqli_query($db_connection, $sql);

  // utf8mb4_unicode_ci

  while ($row = mysqli_fetch_assoc($query)) {
    if ($row["outgoing_message_id"] === $outgoing_id) { // sender
      $output .= "<div class='chat-item outgoing'>
                    <div class='details'>
                      <p>".$row['text_message']."</p>
                    </div>
                  </div>";
    } 
    else { // Receiver
      $output .= "<div class='incoming'>
                    <img src='".$row['profile_image']."' alt='profile img'>
                    <div class='details'>
                      <p>".$row['text_message']."</p>
                    </div>
                  </div>";
    }
  } 
  echo $output;