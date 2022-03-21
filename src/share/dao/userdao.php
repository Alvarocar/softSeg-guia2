<?php
require_once(__DIR__.'/../../conexion.php');
require_once(__DIR__.'./../model/user.php');

function getAllUsers(): array {
  global $con;
  $results = $con->query("SELECT u.userid, u.username, u.password, u.nivel FROM USER as u");
  if ($results == false) {
    return array();
  }
  $userList = array();
  while($row = $results->fetch_assoc()) {
      array_push($userList, 
        new User($row['userid'], $row['username'], $row['password'], $row['nivel'])
      );
  }
  return $userList;
}

/**
 * If the function not find the user then returns null
 * @return User | Null
 */
function findUser($username, $pass) {
  global $con;
  $pass = md5($pass);
  $result = $con->query("SELECT u.userid, u.username, u.password, u.nivel FROM USER as u WHERE u.username='". $username."' AND u.password='". $pass."'");
  $user = null;
  while($row = $result->fetch_assoc()) {
    $user = new User($row['userid'], $row['username'], $row['password'], $row['nivel']);
    
  }
  return $user;
}

function findUsername($username) {
  global $con;
  return mysqli_query($con, "SELECT u.username FROM user as u WHERE u.username='" . $username . "'");
}

function createAdmin(User $user): bool {
  global $con;
  $result = $con->query("INSERT INTO USER (USERID , USERNAME, PASSWORD, NIVEL) VALUES ( '".$user->getId()."' , '".$user->getUserName()."' , '".$user->getPassword()."' , '".$user->getNivel()."' )");
  return $result;
}
