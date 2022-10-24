<?php

class Cadastro
{
  public function cadastrar($username, $senha, $confSenha)
  {
    // INSTANCIANDO A CONEXÃO
    require '../../../model/conexao.php';

    $pdo = new Conexao();
    $con = $pdo->conexao();

    // Validação se tem campo vazio
    if (empty($username) || empty($senha) || empty($confSenha)) {
      return 'Preencha todos os Campos !';
      exit();
    }
    // Validação de as credenciais de senha são iguais
    if ($senha != $confSenha) {
      return 'As Senhas não se Coincidem';
      exit();
    }

    // // Query de Usuarios
    $query = "INSERT INTO
                users (name, password, created_date)
              VALUES
                (:nome, :password, :created_date)";

    try {
      date_default_timezone_set('America/Sao_Paulo');

      $stmt = $con->prepare($query);
      $stmt->bindParam(":nome", $username);
      $stmt->bindParam(":password", md5($senha));
      $stmt->bindParam(":created_date", date('Y-m-d'));

      if ($stmt->execute()) {
        return 'Cadastro Realizado !';
      }

      // Para caso ouver algum erro durante o processo de cadastro
    } catch (PDOException $e) {
      $msg = ['PDOException: SQLSTATE[23505]: Unique violation: 7 ERROR: duplicate key value violates unique constraint "users_pkey" DETAIL: Key (name)=(' . $username . ') already exists. in /app/assets/script/php/cadastro.php:38 Stack trace: #0 /app/assets/script/php/cadastro.php(38): PDOStatement->execute() #1 /app/assets/script/php/index.php(9): Cadastro->cadastrar() #2 {main}'];

      if ($e == $msg) {
        return 'duplicate key value';
      } else {
        return $e;
      }
    }
  }
}
