<?php

class ConcluirTarefa
{
  public function concluirTarefa($tarefa)
  {
    require '../../../model/conexao.php';

    $pdo = new Conexao();

    $con = $pdo->conexao();

    /* ============= BUSCAR RESULTADOS ========================== */

    $query = "UPDATE tasks
              SET status = true
              WHERE id = :id;";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":id", $tarefa);

    if ($stmt->execute()) {
      return 'Tarefa Concluida';
    }
  }
}
