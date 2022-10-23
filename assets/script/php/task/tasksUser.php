<?php

class Tasks
{
  public function tasks($username)
  {
    require '/model/conexao.php';

    $pdo = new Conexao();
    $con = $pdo->conexao();

    $query = " SELECT
              id,
	            task,
	            status
          from
              tasks
          where
              user_task = :username
    ";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $tasksUser = $stmt->fetchAll();

    return $tasksUser;
  }
}
