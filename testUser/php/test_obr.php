<?php
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "wpcqjynf_0975", "Makarov1983", "wpcqjynf_0975");
if ($mysqli == false) {
  print("error");
} else {
  // print("Соединение установлено успешно");

  $name = $_POST["name"];
  $q1 = $_POST["q1"];
  $q2 = $_POST["q2"];
  $q3 = $_POST["q3"];
  $q4 = $_POST["q4"];
  $q5 = $_POST["q5"];
  $q6 = $_POST["q6"];
  $q7 = $_POST["q7"];
  $q8 = $_POST["q8"];
  $q9 = $_POST["q9"];
  $q10 = $_POST["q10"];
  $q11 = $_POST["q11"];
  $q12 = $_POST["q12"];
  $email = trim(mb_strtolower($_POST["email"]));
  $tel = $_POST["tel"];
  

  


    $mysqli->query("INSERT INTO `tested`(`name`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `email`, `tel`) VALUES ('$name', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$email', '$tel')");
    print("ok");
  }

