<?php
require_once(__DIR__.'/../../conexion.php');
require_once(__DIR__.'./../model/student.php');

function createStudent(Student $student) {
  global $con;
  $result = $con->query("INSERT INTO STUDENT (ID , NAME, PROGRAM) VALUES ( ".$student->getId()." , '".$student->getName()."' , '".$student->getProgram()."')");
 print(mysqli_error($con));
  /*print($con->error_get_last); */
  return $result;
}

function getAllStudents() {
  global $con;
  $results = $con->query("SELECT u.id , u.name, u.program FROM STUDENT as u");
  if ($results == false) {
    return array();
  }
  $studentList = array();
  while($row = $results->fetch_assoc()) {
      array_push($studentList, 
        new Student($row['id'], $row['name'], $row['program'])
      );
  }
  return $studentList;
}