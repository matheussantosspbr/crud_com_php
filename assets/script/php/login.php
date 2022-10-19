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

    $query = "SELECT 
                name,
                password
              FROM
                users
              WHERE
                name = :username
                and password = :password
                ";

    try {
      $stmt = $con->prepare($query);
      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":password", md5($senha));
      $stmt->execute();
      $user = $stmt->fetchAll();

      if ($user == array()) {
        return 'Você pode ter digitado o endereço de e-mail ou a senha errados, ou você não tem cadastro.';
      } else {
        return [
          "result" => 'Login Realizado !',
          "dados" => $user
        ];
      }

      // Para caso ouver algum erro durante o processo de cadastro
    } catch (PDOException $e) {
      return $e;
    }
  }
}
