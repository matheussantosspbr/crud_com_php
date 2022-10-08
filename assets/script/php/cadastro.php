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
      $stmt = $con->prepare($query);
      $stmt->bindParam(":nome", $username);
      $stmt->bindParam(":password", md5($senha));
      $stmt->bindParam(":created_date", date("d/m/y"));

      if ($stmt->execute()) {
        return 'Cadastro Realizado !';
      }

      // Para caso ouver algum erro durante o processo de cadastro
    } catch (PDOException $e) {
      return $e;
    }
  }
}
