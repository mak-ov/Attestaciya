<?php

class User {
  private $name;
  private $tel;
  private $email;
  private $id;
  private $lastname;
  private $q1;
  private $q2;
  private $q3;
  private $q4;
  private $q5;
  private $q6;
  private $q7;
  private $q8;
  private $q9;
  private $q10;
  private $q11;
  private $q12;

  function __construct($id, $name, $tel, $email, $lastname, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12)
  {
    $this->id = $id;
    $this->name = $name;
    $this->tel = $tel;
    $this->email = $email;
    $this->lastname = $lastname;
    $this->q1 = $q1;
    $this->q2 = $q2;
    $this->q3 = $q3;
    $this->q4 = $q4;
    $this->q5 = $q5;
    $this->q6 = $q6;
    $this->q7 = $q7;
    $this->q8 = $q8;
    $this->q9 = $q9;
    $this->q10 = $q10;
    $this->q11 = $q11;
    $this->q12 = $q12;

  }
  function getId() {
    return $this->id;
  }
  function getName() {
    return $this->name;
  }
  function getTel() {
    return $this->tel;
  }
  function getEmail() {
    return $this->email;
  }
  function getLastame() {
    return $this->lastname;
  }
  function getQ1() {
    return $this->q1;
  }
  function getQ2() {
    return $this->q2;
  }
  function getQ3() {
    return $this->q3;
  }
  function getQ4() {
    return $this->q4;
  }
  function getQ5() {
    return $this->q5;
  }
  function getQ6() {
    return $this->q6;
  }
  function getQ7() {
    return $this->q7;
  }
  function getQ8() {
    return $this->q8;
  }
  function getQ9() {
    return $this->q9;
  }
  function getQ10() {
    return $this->q10;
  }
  function getQ11() {
    return $this->q11;
  }
  function getQ12() {
    return $this->q12;
  }
  //* Статический Метод добавления пользователя
  static function addUser($name, $lastname, $email, $pass) {
    global $mysqli;

    $email = trim(mb_strtolower($email));
    $pass = trim($pass);
    $pass = password_hash("$pass", PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");

    if ($result->num_rows != 0) {
      return json_encode(["result"=>"exist"]);
    } else {
      $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
      return json_encode(["result"=>"success"]);
    }
  }

  //* Статический метод авторизации пользователя
  static function authUser($email, $pass) {
    global $mysqli;

    $email = trim(mb_strtolower($email));
    $pass = trim($_POST["pass"]);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    $result = $result->fetch_assoc();

    if (password_verify($pass, $result["pass"])) {
      $_SESSION["id"] = $result["id"];
      return json_encode(["result"=>"success"]);
    } else {
      return json_encode(["result"=>"exist"]);
    }
  }

//* Статический метод получения данных конкретного пользователя
  static function getUser($userId) {
    global $mysqli;

    $result = $mysqli->query("SELECT `name`, `tel`, `email`, `id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12` FROM `tested` WHERE `id`='$userId'");
    $result = $result->fetch_assoc();

    return json_encode($result);
  }

  //* Статический метод получения всех пользователей
  static function getUsers() {
    global $mysqli;

    $result = $mysqli->query("SELECT `name`, `tel`, `email`, `id` FROM `tested` WHERE 1");

    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return json_encode($users);
  }
}