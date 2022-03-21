<?php require_once(__DIR__ . '/../../conexion.php');
require_once(__DIR__. '/../model/audit_student.php');
class AuditStudentDao {
  function getAll() {
    global $con;
    $results = $con->query("SELECT * FROM AUDIT_STUDENT");
    if ($results == false) {
      return array();
    }
    $list = array();
    while($row = $results->fetch_assoc()) {
        array_push($list, 
          new AuditStudent(
            $row['ID'], $row['PREVIOUS_NAME'], $row['NEW_NAME'],
            $row['PREVIOUS_PROGRAM'], $row['NEW_PROGRAM'], $row['USERID'],
            $row['MODIFY'], $row['PROCESS'], $row['ID_STUDENT'])
        );
    }
    return $list;
  }
}
