<?php require_once(__DIR__.'/../../share/model/user.php');
require_once(__DIR__.'/../../share/util/sessions.php');
require_once(__DIR__.'/../../share/util/location.php');
require_once(__DIR__.'/../../share/dao/userdao.php');

session_start();
if (isset($_POST['logout'])) { unset($_SESSION['session_username']); }
if(!isset($_SESSION["session_username"])) {
  header("Location: ../login.php");
  return;
}

if(isset($_POST['back'])) {
  header("Location: /admin/reports.php");
}

$user = unserialize($_SESSION["session_username"]);
if ($user->getNivel() > 0) {
  header('Location: /teachers/index.php');
  return;
}

$allUsers = getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Admin</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');
    body {
      font-family: "Roboto Condensed";
      background-color:  #F2F2F2;
    }
    .navbar {
      background-color: #034159 !important;
      
    }
    .name {
      color: #F2F2F2 !important;
      font-weight: bold;
      font-size: 1.5rem;
    }
    .account-select {
      color: #F2F2F2 !important;
      font-size: 1.3rem;
    }
    .main {
      background-color: #7AACBF;
    }
    form button {
      background-color: #166273;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand name mx-4" href="#">Admin <?php echo $user->getUserName(); ?></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="nav-item dropdown offset-10">
          <section class="navbar-nav mb-2 mb-lg-0">
            <a class="nav-link account-select dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cuenta
            </a>
            <ul class="dropdown-menu offset-md-10" aria-labelledby="navbarDropdown">
              <form method="POST"  action="index.php">
                  <input type="submit" name="logout" class="dropdown-item" value="Cerrar sesi&oacute;n" />
              </form>
            </ul>  
          </section>
        </div>
      </div>
    </div>
  </nav>
  <main class="main my-5 mx-5 py-5 px-5">
    <div class="row justify-content-center">
      <section class="text-center col-7 fs-2 py-2 border mx-5 fw-bolder"> Usuarios </section>
    </div>
    <table class="table table-dark mt-5 table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre de Usuario</th>
          <th scope="col">Contrase??a</th>
          <th scope="col">Nivel</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($allUsers as $u) {
              echo "<tr><th scope='row'>{$u->getId()}</th>";
              echo  "<td>{$u->getUserName()}</td>";
              echo  "<td>{$u->getPassword()}</td>";
              echo  "<td>{$u->getNivel()}</td></tr>";
            }
          ?>
      </tbody>
    </table>
    <form action="#" method="POST" class="row justify-content-center px-5 ">
          <button name="back" class=" col-4 shadow text-center fs-5 fw-normal py-2 rounded text-light">Anterior</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>