<?php
class User {

  private $userId;
  private $username;
  private $password;
  private $nivel;

  function __construct(int $userId,string $username,string $password,int $nivel) {
    $this->userId = $userId;
    $this->username = $username;
    $this->password = $password;
    $this->nivel = $nivel;
  }

  function isAdmin(): bool {
    return ($this->nivel == 0) ? true: false;
  }

  function getId(): int {
    return $this->userId;
  }

  function getUserName(): string {
    return $this->username;
  }

  function getPassword(): string {
    return $this->password;
  }

  function getNivel(): string {
    return $this->nivel;
  }
}