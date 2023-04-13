<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);

  require_once '../config.php';

  $session_id = $_SESSION['login_id'];
  $title = mysqli_real_escape_string($db_connection, $_POST['title']);
  $post_upload_file = $_FILES['file-upload'];

  if (empty($title)) {
    echo "Please fill out post title";

  } else if (empty($post_upload_file['name'])) {
    echo "Please add a post image or a video";

  } else {
    $post_upload_file_name = $post_upload_file['name'];
    $post_upload_file_type = $post_upload_file['type'];
    $post_upload_file_temp_name = $post_upload_file['tmp_name'];
    $post_upload_file_error = $post_upload_file['error'];

    $post_upload_file_explode = explode('.', $post_upload_file_name);
    $post_upload_file_ext = end($post_upload_file_explode);
    $extensions = ['png', 'jpeg', 'jpg'];

    if (in_array($post_upload_file_ext, $extensions) === true) {
      $time = time();
      $new_post_upload_file_name = $time.$post_upload_file_name;

      if (move_uploaded_file($post_upload_file_temp_name, "../images/post/" . $new_post_upload_file_name)) {
        $sql = "INSERT INTO posts(user_id, title, file) VALUES('{$session_id}', '{$title}', '{$new_post_upload_file_name}')";
        $result = mysqli_query($db_connection, $sql);

        echo 'success';

      } else {
        echo "something went wrong";
      }
    } else {
      echo "Only (JPG, JPEG, PNG) files are allowed";
    }
  }