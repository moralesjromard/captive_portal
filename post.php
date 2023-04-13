<?php
require 'config.php';
require './require/datetime_coverter.php';

error_reporting(E_ALL);
ini_set('display_errors',1);

if(!isset($_SESSION['login_id'])){
    header('Location: login.php');
    exit;
}
$id = $_SESSION['login_id'];
$get_user = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `google_id`='$id'");
if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}
else{
  header('Location: logout.php');
  exit;
}

$post_id = $_GET['product_id'];
$get_post = mysqli_query($db_connection, "SELECT posts.id, posts.file, posts.title, posts.created_at, users.name, users.profile_image FROM posts INNER JOIN users ON posts.user_id COLLATE utf8mb4_unicode_ci = users.google_id WHERE posts.id = $post_id");

if (mysqli_num_rows($get_post) > 0) {
  if ($row = mysqli_fetch_assoc($get_post)) {
    $post_title = $row['title'];
    $post_file = $row['file'];
    $post_created_at = $row['created_at'];
    $post_name = $row['name'];
    $post_image = $row['file'];
    $post_profile = $row['profile_image'];
    $_SESSION['post_id'] = $row['id'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/post.css">
  <link rel="stylesheet" href="./main.css">
  <title>Document</title>

  <!-- Font awesome cdn -->
  <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <a href="./home.php" class="close-icon">
      <i class="fal fa-times"></i>
    </a>
    <div class="post-content">
      <img src="./images/post/<?php echo $post_image ?>" alt="Post Image">
    </div>
    <div class="post-details">
      <div class="post-header">
        <div class="post-profile">
          <img src="<?php echo $post_profile ?>" alt="User Profile pic" class="profile-img">
          <p class="profile-name"><?php echo $post_name ?></p>
        </div>
      </div>
      <div class="post-description-container">
        <div class="post-details-container">
          <div class="post-title-container">
            <p class="post-title">
              <?php echo $post_title ?>
            </p>
          </div>
          <div class="post-description">
            <div class="icons">
              <i class="far fa-thumbs-up"></i>
              <i class="far fa-comment"></i>
            </div>
            <div class="post-description-texts">
              <div class="total-likes">0 Likes</div>
              <div class="post-created-text"><?php echo datetime_coverter($post_created_at) ?></div>
            </div>
          </div>
        </div>
        <div class="comment-heading">All comments</div>
        <div class="comments">
          <div id="#loading" class="comment-loading">
            <svg aria-label="Loading..." class="spinner animation-spin" viewBox="0 0 100 100"><rect fill="#555555" height="6" opacity="0" rx="3" ry="3" transform="rotate(-90 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.08333333333333333" rx="3" ry="3" transform="rotate(-60 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.16666666666666666" rx="3" ry="3" transform="rotate(-30 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.25" rx="3" ry="3" transform="rotate(0 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.3333333333333333" rx="3" ry="3" transform="rotate(30 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.4166666666666667" rx="3" ry="3" transform="rotate(60 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.5" rx="3" ry="3" transform="rotate(90 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.5833333333333334" rx="3" ry="3" transform="rotate(120 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.6666666666666666" rx="3" ry="3" transform="rotate(150 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.75" rx="3" ry="3" transform="rotate(180 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.8333333333333334" rx="3" ry="3" transform="rotate(210 50 50)" width="25" x="72" y="47"></rect><rect fill="#555555" height="6" opacity="0.9166666666666666" rx="3" ry="3" transform="rotate(240 50 50)" width="25" x="72" y="47"></rect></svg>
        </div>
        </div>
      </div>
      <form action="#" class="comment-input-container">
        <input type="text" class="comment-input" placeholder="Write your comment..." autocomplete="off" name="comment-text">
      </form>
    </div>
  </div>
  <script src="./js/php/create-comment.js"></script>
  <script src="./js/php/display-comment.js"></script>
</body>
</html>