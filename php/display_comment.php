<?php 

require_once '../config.php';
require_once '../require/datetime_coverter.php';
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$post_id = $_SESSION["post_id"];

$sql = "SELECT comments.text, comments.created_at, users.name, users.profile_image, users.google_id FROM comments INNER JOIN users ON comments.user_id COLLATE utf8mb4_unicode_ci = users.google_id WHERE comments.post_id = {$post_id};";

$result = mysqli_query($db_connection, $sql);
$rowCount = mysqli_num_rows($result);
$output = "";

if ($rowCount > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $comment_text = $row["text"];
    $comment_created_at = $row["created_at"];
    $comment_name = $row["name"];
    $comment_profile = $row["profile_image"];
    $comment_user_id = $row["google_id"];

    $output .= '<div class="comment">
                  <div class="comment-profile">
                    <img src="'.$comment_profile.'">
                  </div>
                  <div class="comment-text-container">
                    <div class="comment-profile-left">
                      <div class="comment-name">'.$comment_name.'</div>
                    </div>
                    <div class="comment-text">'.$comment_text.'</div>
                    <div class="comment-created-text">'.datetime_coverter($comment_created_at).'</div>
                  </div>
                </div>';
  }
}

echo $output;