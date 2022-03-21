<?php require_once('./share/dao/userdao.php');
  session_start();
  
  if (isset($_SESSION['session_username'])) {
    header('Location: index.php');
  }
?>

<?php 
  
  $message = '';

  function no_empty_fielts($data) {
    if (empty($data['id']) ||  empty($data['username']) || empty($data['password'])) {
      return false;
    }
    return true;
  }

  function search_by_email($con, $email) {
    return mysqli_query($con, "SELECT u.email FROM user as u WHERE u.email='" . $email . "'");
  }


  function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
  }

  function complete_register() {
    $_SESSION['account_created'] = 'created';
    redirect('login.php');
  }

  function register_user() {
    global $message;
    if (!no_empty_fielts($_POST)) {
      $message = "Todos los campos se deben diligenciar";
      return ;
    }
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $nivel = $_POST["nivel"];
    $result = findUsername($username);
    if (!($result == false)){
      $message = 'El correo seleccionado ya se encuentra registrado';
      return ;
    }
    $user = new User($id, $username, $password, $nivel);
    if (!createAdmin($user)) {
      $message = "No se pudo insertar los datos ingresados ".$user->getNivel();
      return ;
    }
    $message = '';
    complete_register();
  }
?>

<?php
if (isset($_POST["register"])) {
  register_user();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Registro</title>
</head>
<body>
  <main class="row pt-5">
    <form class="col-4 offset-4 border p-3 pb-4 rounded d-grid gap-3" action="register.php" method="post">
      <fieldset class="d-grid gap-2">
        <legend>Registro</legend>
        <section class="d-grid gap-4">
          <input name="id" type="number" class="form-control" placeholder="ID del Usuario">
          <input name="username" type="text" class="form-control" placeholder="Nombre de usuario">
          <input name="password" type="password" class="form-control" placeholder="Contraseña">
          <input name="nivel" type="number" class="form-control" placeholder="Nivel del Usuario">
        </section>
      </fieldset>
      <input name="register" value="Registrarse" class="btn btn-info p-2" type="submit">
      <a href="login.php">¿Ya tienes una cuenta?, Ingresa aqui!</a>
      <?php if (!empty($message)) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $message ?>
        </div>
      <?php
      } 
      ?>
    </form>
  </main>

  
</body>
</html>

