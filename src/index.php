<?php require_once('./share/model/user.php');
    session_start();
    if (!isset($_SESSION["session_username"])) {
        header("location:login.php");
    } else {
        $globalUser = unserialize($_SESSION["session_username"]);
?>

<?php 

function redirect($url) {
$string = '<script type="text/javascript">';
$string .= 'window.location = "' . $url . '"';
$string .= '</script>';

echo $string;
}

if(isset($_POST['logout'])) {
    unset($_SESSION["session_username"]);
    redirect('login.php');
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Software Seguro</title>
    </head>
    <body>
            <div id="welcome">
                <h2>Bienvenido, <span><?php echo $globalUser->getUserName()?>!</span></h2>
                <form action="index.php" method="POST">
                <button type="submit" name="logout">Finalice sesión</button>
                </form>
            </div>
    </body>
</html>

<?php
    }
 ?>
