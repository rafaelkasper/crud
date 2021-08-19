<?php
require 'config.php';
require 'dao/ClientDaoMysql.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$clientDao = new ClientDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    if ($clientDao->findByEmail($email) === false) {
        $novoCliente = new Client();
        $novoCliente->name = $name;
        $novoCliente->email = $email;

        $clientDao->insert($novoCliente);

        header("Location: listar.php");
        exit;
    } else {
        header("Location: adicionar.php");
        exit;
    }
} else {
    header("Location: adicionar.php");
    exit;
}
