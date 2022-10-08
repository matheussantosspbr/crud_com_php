<?php

class Cadastro
{
  public function cadastrar($username, $senha, $confSenha)
  {
    // instanciando a conexão

    require '../../../model/conexao.php';

    $pdo = new Conexao();

    $con = $pdo->conexao();

    // Validação se tem campo vazio
    if (empty($username) || empty($senha) || empty($confSenha)) {
      return 'Preencha todos os Campos !';
      exit();
    }

    // Validação de as credenciais de senha são iguais
    if ($_POST['password'] != $_POST['confPassword']) {
      return 'As Senhas não se Coincidem';
      exit();
    }

    // // Subir os dados para o banco de dados
    // $senhaCriptografada = md5($senha);

    // // Query de Usuarios
    // $query = "INSERT INTO
    //             filhos (`pessoas_id`, `nome`)
    //           VALUES
    //             (:id_pess, :nomeFil)";

    // $sqlFilhos = $conexao->prepare($query);
    // $sqlFilhos->bindParam(":id_pess", $id);
    // $sqlFilhos->bindParam(":nomeFil", $json['pessoas'][$i]['filhos'][$j]);
    // $sqlFilhos->execute();
    // $sqlFilhos->fetchAll(PDO::FETCH_ASSOC);
    return 'Cadastro Realizado !';
  }
}
