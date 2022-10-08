<?php

class Login
{
  public function login($username, $senha)
  {
    // instanciando a conexão

    require '../../../model/conexao.php';

    $pdo = new Conexao();

    $con = $pdo->conexao();

    // Validação se tem campo vazio
    if (empty($username) || empty($senha)) {
      return 'Preencha todos os Campos !';
      exit();
    }

    /* ============= BUSCAR RESULTADOS ========================== */
    return 'Cadastro Realizado !';
  }
}
