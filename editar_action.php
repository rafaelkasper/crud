<?php
require 'config.php';
require 'dao/ClientDaoMysql.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$clientDao = new ClientDaoMysql($pdo);
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);



if ($id && $name && $email) {

   $novoCliente = new Client();
   $novoCliente->name = $name;
   $novoCliente->email = $email;
   $novoCliente->id = $id;

   $clientDao->update($novoCliente);
   header("Location: listar.php");
   exit;
} else {
   header("Location: adicionar.php");
   exit;
}
