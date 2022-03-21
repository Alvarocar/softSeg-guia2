<?php
class Student {

  private $id;
  private $name;
  private $program;

  function __construct(int $id,string $name,string $program) {
    $this->id = $id;
    $this->name = $name;
    $this->program = $program;
  }

  function getId(): int {
    return $this->id;
  }

  function getName(): string {
    return $this->name;
  }

  function getProgram(): string {
    return $this->program;
  }

}