<?php
class AuditStudent {
  public $id;
  public $previous_name;
  public $new_name;
  public $previous_program;
  public $new_program;
  public $userId;
  //date
  public $modify;
  public $process;
  public $idStudent;
  function __construct ( $id, $previous_name, $new_name, $previous_program, $new_program, $userId, $modify, $process, $idStudent) {
    $this->id = $id;
    $this->previous_name = $previous_name;
    $this->new_name = $new_name;
    $this->previous_program = $previous_program;
    $this->new_program = $new_program;
    $this->userId = $userId;
    $this->modify = $modify;
    $this->process = $process;
    $this->idStudent = $idStudent;
  }
}
