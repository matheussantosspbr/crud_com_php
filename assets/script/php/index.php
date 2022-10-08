<?php

if (isset($_POST['submitCad'])) {
  require 'cadastro.php';

  // INSTANCIANDO A CONEXÃO
  $cad = new Cadastro();
  $msg = $cad->cadastrar($_POST['username'], $_POST['password'], $_POST['confPassword']);

  if ($msg == 'Cadastro Realizado !') {
    header("Location: http://localhost/crudphp/cadastro.php?msgSucesso=$msg");
    exit();
  } else {
    // 
    $textError = $msg->getMessage();

    $searchError = ['duplicate key value'];
    $error = ['Usuário já Existe !'];

    for ($i = 0; $i < count($searchError); $i++) {
      if (preg_match("/{$searchError[$i]}/i", $textError)) {
        header("Location: http://localhost/crudphp/cadastro.php?msgErro=$error[$i]");
        break;
      } else {
        header("Location: http://localhost/crudphp/cadastro.php?msgErro=$textError");
      }
    }
  }
}

if (isset($_POST['submitLog'])) {
  require 'login.php';

  $cad = new Login();
  $msg = $cad->login($_POST['username'], $_POST['password']);

  if ($msg == 'Preencha todos os Campos !') {
    header("Location: http://localhost/crudphp/cadastro.php?msgErro=$msg");
    exit();
  } else if ($msg == 'Senha ou Usuário Inválido') {
    header("Location: http://localhost/crudphp/cadastro.php?msgErro=$msg");
    exit();
  } else if ($msg == 'Login Realizado !') {
    header("Location: http://localhost/crudphp/cadastro.php?msgSucesso=$msg");
  }


  echo $msg;
}
