<?php
require 'config.php';
require 'dao/ClientDaoMysql.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$usuarioDao = new ClientDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $usuarioDao->delete($id);
}

header("Location: listar.php");
exit;
