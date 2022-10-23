<?php

class TasksCheck
{
  public function tasksCheck($username)
  {

    require '../../../../model/conexao.php';

    $pdo = new Conexao();
    $con = $pdo->conexao();

    $query1 = " SELECT
              count(status)
            from
              tasks
            where
              user_task = :user
              and status = true

    ";
    $stmt1 = $con->prepare($query1);
    $stmt1->bindParam(":user", $username);
    $stmt1->execute();
    $true = $stmt1->fetchAll();

    return $true;
  }
}
