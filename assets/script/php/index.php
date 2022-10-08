<?php

if (isset($_POST['submitCad'])) {
  require 'cadastro.php';

  $cad = new Cadastro();
  $msg = $cad->cadastrar($_POST['username'], $_POST['password'], $_POST['confPassword']);

  if ($msg == 'Preencha todos os Campos !') {
    header("Location: http://localhost/crudphp/cadastro.php?msgErro=$msg");
    exit();
  } else if ($msg == 'As Senhas não se Coincidem') {
    header("Location: http://localhost/crudphp/cadastro.php?msgErro=$msg");
    exit();
  } else if ($msg == 'Cadastro Realizado !') {
    header("Location: http://localhost/crudphp/cadastro.php?msgSucesso=$msg");
  }


  echo $msg;
}

if (isset($_POST['submitCad'])) {
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
