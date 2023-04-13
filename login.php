<?php
require 'config.php';
if(isset($_SESSION['login_id'])){
  header('Location: home.php');
  exit;
}

// ---------------------------------- Google Sign in
require './google-api/vendor/autoload.php';
$client = new Google_Client();
$client->setClientId('700783566052-48g6fhq59gm0d3hli2fimp0h9j28fe50.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/glogin2/login.php');
$client->addScope("email");
$client->addScope("profile");
if(isset($_GET['code'])):
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  if(!isset($token["error"])){
    $client->setAccessToken($token['access_token']);
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
    $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
    $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
    $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

    $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
    if(mysqli_num_rows($get_user) > 0){
      $_SESSION['login_id'] = $id; 
      header('Location: home.php');
      exit;
    }
    else{
      $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
      if($insert){
          $_SESSION['login_id'] = $id; 
          header('Location: home.php');
          exit;
      }
      else{
          echo "Sign up failed!(Something went wrong).";
      }
    }
  }
  else{
    header('Location: login.php');
    exit;
  }
// ---------------------------------- Google Sign in




    
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class='banner'></div>
    <video autoplay muted loop id='video-background' >
      <source src='./videos/temp-videobackground.mp4' type='video/mp4' />
    </video>
    <form class='container' action="#">
      <div class='form'>
        <header>
          <div class='logo'>
            <img class='logo-image' src='./images/lvcc-logo.png' alt='LVCC LOGO' />
          </div>
          <!-- <p class='intro-text'>LVCC Captive Portal</p> -->
        </header>
        <div class="error">Invalid email or password</div>
        <div class='fields'>
          <div class="field">
            <input type="text" placeholder="Enter email" name="email" class="email-input">
          </div>
          <div class="field">
            <input type="password" placeholder="Enter password" name="password" class="password-input">
          </div>
          <button class='btn' id='login-btn'>Sign in</button>
          <div class='or-container'>
            <div class='or-border or-border1'></div>
            <p class='or-text'>or</p>
            <div class='or-border or-border2'></div>
          </div>
          <a type="button" class="btn google-btn" href="<?php echo $client->createAuthUrl(); ?>">
            <img class='google-btn-image' src='./images/google-logo.png' alt='Google logo' />
            Sign in with google
          </a>
        </div>
      </div>
    </form>
    <script src="./js/php/login.js"></script>
</body>
</html>
<?php endif; ?>