<?php

require_once '../config.php';

error_reporting(E_ALL);
ini_set('display_errors',1);

$searchTerm = mysqli_real_escape_string($db_connection, $_POST['searchTerm']);
$output = '';
$sql = mysqli_query($db_connection, "SELECT * FROM users WHERE name LIKE '%{$searchTerm}%' AND google_id != {$_SESSION['login_id']}");

if (mysqli_num_rows($sql) > 0) {
  require "./data.php";
} else {
  $output .= "<p class='search-text'>We couldn't find any matches for '" . $searchTerm . "'.</p>";
}

echo $output;