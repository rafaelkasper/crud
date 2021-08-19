<?php
require 'config.php';
require 'dao/ClientDaoMysql.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$clienteDao = new ClientDaoMysql($pdo);
$lista = $clienteDao->findAll();
$name = $_SESSION['name'];

?>

<!doctype html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./images/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="./styles/style.css" rel="stylesheet">
  <title>LISTA DE CLIENTES</title>
</head>

<body>
  <div class="container">
    <br />


    <?php include 'navbar.php'; ?>

    <br />
    <h1>LISTA DE CLIENTES</h1>
    <div>
      <p><strong><?= $name; ?></strong>, hoje é dia <?= date('d/m/Y'); ?>.</p>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
          </tr>

        </thead>
        <?php foreach ($lista as $usuario) : ?>
          <tbody>
            <tr>
              <td><?= $usuario->id; ?></td>
              <td><?= $usuario->name; ?></td>
              <td><?= $usuario->email; ?></td>
              <td>
                <a class="btn btn-warning" href="editar.php?id=<?= $usuario->id; ?>">Editar</a>
                <a class="btn btn-danger" href="deletar.php?id=<?= $usuario->id; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    </div>

    <div>
      <a class="btn btn-primary" href="adicionar.php">ADICIONAR</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


</body>

</html>