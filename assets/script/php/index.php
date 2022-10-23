<?php
session_start();

if (isset($_POST['submitCad'])) {
  require 'cadastro.php';

  // INSTANCIANDO A CONEXÃO
  $cad = new Cadastro();
  $msg = $cad->cadastrar($_POST['username'], $_POST['password'], $_POST['confPassword']);

  if (isset($msg->getMessage)) {
    $textError = $msg->getMessage();
  } else {
    $textError = $msg;
  }

  if ($msg == 'Cadastro Realizado !') {
    header("Location: https://crud-php-dev-matheussantos.herokuapp.com/cadastro.php?msgSucesso=$msg");
    exit();
  } else {

    $searchError = ['duplicate key value'];
    $error = ['Usuário já Existe !'];
    echo $error;

    for ($i = 0; $i < count($searchError); $i++) {
      if (preg_match("/{$searchError[$i]}/i", $textError)) {
        header("Location: https://crud-php-dev-matheussantos.herokuapp.com/cadastro.php?msgErro=$error[$i]");
        break;
      } else {
        header("Location: https://crud-php-dev-matheussantos.herokuapp.com/cadastro.php?msgErro=$textError");
      }
    }
  }
}

if (isset($_POST['submitLog'])) {
  require 'login.php';

  $cad = new Login();
  $msg = $cad->login($_POST['username'], $_POST['password']);

  if (isset($msg['result']) && $msg['result'] == 'Login Realizado !') {

    $_SESSION['Username'] = $_POST['username'];
    header("Location: https://crud-php-dev-matheussantos.herokuapp.com/painel.php");
  } else {
    header("Location: https://crud-php-dev-matheussantos.herokuapp.com/index.php?msgErro=$msg");
  }
}
