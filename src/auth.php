<?php require_once('./share/model/user.php');
session_start();
if (!isset($_SESSION['session_username'])) {
  header('Location: login.php');
  return;
}

$user = unserialize($_SESSION["session_username"]);

if ($user->getNivel() > 0) {
  header('Location: teachers/index.php');
  return;
}

header('Location: admin/index.php');
return;