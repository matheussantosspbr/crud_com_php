<?php

class AddTarefa
{
  public function addTarefa($tarefa, $username)
  {
    // instanciando a conexão

    require '../../../model/conexao.php';

    $pdo = new Conexao();

    $con = $pdo->conexao();

    /* ============= BUSCAR RESULTADOS ========================== */

    $query = "INSERT INTO
                tasks (user_task, task, status)
              VALUES
                (:user_task, :task, false)";

    try {
      $stmt = $con->prepare($query);
      $stmt->bindParam(":user_task", $username);
      $stmt->bindParam(":task", $tarefa);

      if ($stmt->execute()) {
        return 'Tarefa Criada';
      }
      // Para caso ouver algum erro durante o processo de cadastro
    } catch (PDOException $e) {
      return $e;
    }
  }
}
