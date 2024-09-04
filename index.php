<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    $_SESSION['contentType'] == '' || $_SESSION['contentType'] == null ? header("Location: http://localhost/ip_project/views/pages/home/home.php") : header("Location: http://localhost/ip_project/views/creators/blogs.php");
    exit();
  } else {
    include 'config/config.php';
    include 'header.php';
    include 'navbar.php';
    include 'home.php';
    include 'footer.php';
  }
?>