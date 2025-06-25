<?php
<?php
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>