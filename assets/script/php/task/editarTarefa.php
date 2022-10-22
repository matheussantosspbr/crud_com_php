<?php

class EditarTarefa
{
  public function editarTarefa($tarefa, $id)
  {
    require '../../../model/conexao.php';

    $pdo = new Conexao();

    $con = $pdo->conexao();

    /* ============= BUSCAR RESULTADOS ========================== */

    $query = "UPDATE tasks
              SET task = :tarefa
              WHERE id = :id;";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":tarefa", $tarefa);
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
      return 'Tarefa Editada';
    }
  }
}
