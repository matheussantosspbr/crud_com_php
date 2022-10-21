<?php

class ExcluirTarefa
{
  public function excluirTarefa($tarefa)
  {
    require '../../../model/conexao.php';

    $pdo = new Conexao();

    $con = $pdo->conexao();

    /* ============= BUSCAR RESULTADOS ========================== */

    $query = "DELETE FROM tasks WHERE id = :id";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":id", $tarefa);
    $stmt->execute();
  }
}
