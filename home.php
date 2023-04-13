<?php
  require 'config.php';

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

  $get_posts = mysqli_query($db_connection, "SELECT posts.id, title, file, name, profile_image FROM posts INNER JOIN users ON posts.user_id COLLATE utf8mb4_unicode_ci = users.google_id;");
  $output = '';

  if (mysqli_num_rows($get_posts) > 0) {
    while ($row = mysqli_fetch_assoc($get_posts)) {
      $output .= '
        <div class="post">
            <div class="post-header">
              <div class="post-profile">
                <img src="'. $row['profile_image'] .'" alt="User Profile pic" class="profile-img">
                <p class="profile-name">'. $row['name'] .'</p>
              </div>
            </div>
            <div class="post-content">
              <div class="post-image-container">
                <img class="post-image" src="./images/post/'.$row['file'].'" alt="Post Image">
              </div>
              <a href="./post.php?product_id='.$row['id'].'">
                <div class="banner">
                  <div class="icon">
                    <i class="fas fa-thumbs-up"></i>
                    <p class="post-count">0</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-comment"></i>
                    <p class="post-count">0</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
      ';
    }
  }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" href="./css/home.css">

  <!-- Font awesome cdn -->
  <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
  <!-- create post form -->
  <div class="create-post-modal-banner">
    <form class="create-post-modal" action="#" enctype="multipart/form-data">
      <header>
        <span class="post-modal-header-text">Create post</span>
        <i class="fal fa-times"></i>
      </header>
      <div class="error"></div>
      <input class="post-modal-input" type="text" name="title" placeholder="Share something to everyone!">
      <label for="file-upload" class="custom-file-upload">
          <i class="fal fa-photo-video"></i>
          <span>Add image</span>
          <img id="ImdID" src="" alt="Image" />
      </label>
      <input id="file-upload" type="file" name="file-upload" onchange="readURL(this)" />
      <button class="post-modal-button">Post</button>
    </form>
  </div>

  <div class="wrapper">
    <div class="container">
    <!-- side nav -->
    <nav class="side-nav">
      <h1 class="side-nav-title">My Account</h1>
      <div class="side-nav-item" title="Home">
      <a href="./home.php" class="side-nav-link">
          <i class="fas fa-home"></i></i>
          Home
      </a>
      </div>
      <div class="side-nav-item" title="Message">
      <a href="./chat.php" class="side-nav-link">
          <i class="fas fa-comment-alt"></i>
          Message
      </a>
      </div>
      <div class="side-nav-item" title="LVCC Drive">
      <a href="./lv-drive.php" class="side-nav-link">
          <i class="fas fa-folder"></i>
          LVCC Drive
      </a>
      </div>
      <div class="side-com-item">
      <a href="./logout.php" class="side-com-link">
          <i class="fas fa-sign-out-alt fa-lg" ></i>
          Log out
      </a>
      </div>
      <h1 class="community-title">Community</h1>
      <div class="side-com-item">
      <a href="#" class="side-com-link">
          <i class="fas fa-users"></i>
          AIM Community
      </a>
      </div>
      <div class="side-com-item">
      <a href="#" class="side-com-link">
          <i class="fas fa-users"></i>
          BSIS Community
      </a>
      </div>
      <div class="side-com-item">
      <a href="#" class="side-com-link">
          <i class="fas fa-users"></i>
          ACT Community
      </a>
      </div>
    </nav>

      <!-- Main content -->
      <main class="main-content">
        <div class="create-post">
          <div class="create-post-top">
            <div class="profile-img-container">
              <img src="<?php echo $user['profile_image'] ?>" alt="User Profile pic" class="profile-img">
            </div>
            <div class="create-post-input-container">
              <div class="create-post-input">
                Share something to everyone!"
              </div>
            </div>
          </div>
        </div>
        <div class="posts">
          <?php echo $output ?>
        </div>
      </main>

      <?php require './require/bulletin-board.php'; ?>

    </div>
  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script src="./js/home.js"></script>
  <script src="./js/php/create-post.js"></script>
</body>
</html>