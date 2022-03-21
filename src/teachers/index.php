<?php require_once(__DIR__.'/../share/model/user.php');
session_start();
$user = unserialize($_SESSION["session_username"]);
if ($user->getNivel() == 0) {
  header('Location: /admin/index.php');
  return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profesores</title>
</head>
<body>
  <h1>Profesores <?php echo $user->getNivel(); ?></h1>
</body>
</html>