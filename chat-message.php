<?php
  require_once './config.php';

  error_reporting(E_ALL);
  ini_set('display_errors',1);

  $output = '';
  $sql = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id != {$_SESSION['login_id']}");

  if (mysqli_num_rows($sql) > 0) {
    require './php/data.php';
  }

  $user_id = $_GET['userid'];
  $_SESSION['testing_lang'] = $user_id;

  $sql = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id = {$user_id}");

  if (mysqli_num_rows($sql) > 0) {
    if ($row = mysqli_fetch_assoc($sql)) {
      $name = $row['name'];
      $profile_image = $row['profile_image'];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LVCC Captive Portal | Chats</title>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./css/chat.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body onload="()=> {
  alert('hello world');
}">
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

    <main class="main-content">
      <div class="left-chat">
        <div class="search-part-container">
          <form action="#" class="search-part">
            <i class="far fa-search fa-lg"></i>
            <input class="search-input" type="text" placeholder="Search user" name="search-user">
          </form>
        </div>

        <div class="chats">
          <h1 class="chat-header-text">Chats</h1>
          <div id="chat-user-container">

            <?php echo $output ?>

          </div>
        </div>
      </div>

      <div class="right-chat">
        <div class="right-chat-header">
          <img src="<?php echo $profile_image ?>" alt="Profile Image">
          <h2 class="right-chat-header-name"><?php echo $name ?></h2>
        </div>

        <div class="chat-messages-container">
          
        </div>

        <form class="chat-bottom" action="#">
          <input style="display: none;" type="text" name="outgoing_id" value="<?php echo $_SESSION['login_id'] ?>" hidden>
          <input style="display: none;" type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
          <div class="bottom-items">
            <!-- <i class="fas fa-paperclip fa-lg"></i> -->
            <input type="text" placeholder="Write a message..." class="chatmessage-input" name="chat-text-message">
            <button style="border: none; background: transparent; outline: none; cursor: pointer;"><i class="fas fa-paper-plane"></i></button>
          </div>
        </form>
      </div>
    </main>

    <?php require './require/bulletin-board.php'; ?>
  </div>
  <script src="./js/php/chat.js"></script>
  <script src="./js/php/users.js"></script>
  <script>
    const box = document.querySelector('.chat-messages-container');

    window.onload = () => {
      const chatBox = document.querySelector('.chat-messages-container');

      chatBox.scrollTop = chatBox.scrollHeight;
    };
  </script>
</body>
</html>