<?php require_once(__DIR__."/location.php");
function logout($SESSION, $Id) {
  unset($SESSION[$Id]);
}