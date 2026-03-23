<?php //Nav bar Start
  include 'components/_connaction.php';
  session_start();
  session_unset();
  session_abort();
  $_SESSION['islogin'] = false;
  header("location:login.php");
  exit;
?>