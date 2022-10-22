<?php

require './task/addTarefa.php';
require './task/editarTarefa.php';
require './task/excluirTarefa.php';
require './task/concluirTarefa.php';

if (isset($_POST['add'])) {
  $add = new AddTarefa();
  $add->addTarefa($_POST['tarefa'], $_POST['username']);

  header("Location: http://localhost/crudphp/painel.php");
}

if (isset($_POST['concluir'])) {
  $concluir = new ConcluirTarefa();
  $concluir->concluirTarefa($_POST['tarefa']);

  header("Location: http://localhost/crudphp/painel.php");
}

if (isset($_POST['editar'])) {
  $e = new EditarTarefa();
  $e->editarTarefa($_POST['tarefa'], $_POST['idTarefa']);

  header("Location: http://localhost/crudphp/painel.php");
}

if (isset($_POST['excluir'])) {
  $ex = new ExcluirTarefa();
  $ex->excluirTarefa($_POST['tarefa']);

  header("Location: http://localhost/crudphp/painel.php");
}
