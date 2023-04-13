<?php

require_once '../config.php';

// error_reporting(E_ALL);
// ini_set('display_errors',1);

// $output = '';
// $sql = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id != {$_SESSION['login_id']}");

// if (mysqli_num_rows($sql) > 0) {

//   $outgoing_id = null;

//   while ($row = mysqli_fetch_assoc($sql)) {
//   $sql2 = "SELECT * FROM messages WHERE (incoming_message_id = {$row['google_id']} OR outgoing_message_id = {$row['google_id']}) AND (outgoing_message_id = {$_SESSION['login_id']} OR incoming_message_id = {$_SESSION['login_id']}) ORDER BY id DESC LIMIT 1";
//   $query2 = mysqli_query($db_connection, $sql2);
//   $row2 = mysqli_fetch_assoc($query2);
//   if (mysqli_num_rows($query2)) {
//     $result = $row2['text_message'];
//   }
//   else {
//     $result = "No message available";
//   }
//   // Trimming message
//   (strlen($result) > 28) ? $text_message = substr($result, 0, 40) . '...' : $text_message = $result;
//   // Adding you to outgoing message
//   ($outgoing_id == $_SESSION['login_id']) ? $you = "You: " : $you = "";
//   $output .= '
//               <a href="./chat-message.php?userid='.$row['google_id'].'" class="ind-chats">
//                 <div class="imgs">
//                   <img src="'.$row['profile_image'].'" alt="Image">
//                 </div>
//                 <div class="ind-chats-infos">
//                   <h3 class="user-name">'.$row['name'].'</h3>
//                     <p class="last-message">'. $you . $text_message .'</p>
//                 </div>
//               </a>
//               ';
//   }
// }

// echo $output;

echo 'hello world';