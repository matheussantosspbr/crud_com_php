<?php

class Conexao
{
  public function conexao()
  {
    // conexão PostgreSQL
    $endereco = 'ec2-52-202-236-238.compute-1.amazonaws.com';
    $dbName = 'dasb5ctr9vk6sh';
    $dbUser = 'cxbiernanqycdi';
    $senha = '2ab781f5e3d1074a8ac86831ad917f5f28b17190cf6e6bb97587c29a6d05d3ed';

    try {
      // Conexão PDO
      $con = new PDO("pgsql:host=$endereco;port=5432;dbname=$dbName", $dbUser, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      // return "conectado";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
    return $con;
  }
}
