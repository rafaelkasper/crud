<?php
require 'config.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.87.0">
  <title>Cadastrar</title>
  <link rel="shortcut icon" href="./images/favicon.png" />
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="./styles/signin.css" rel="stylesheet">
</head>

<body class="text-center">



  <div class="card">
    <div class="logo">
      <img class="mb-4" src="./images/logo.png" alt="" width="300">
    </div>
    <main class="form-signin">

      <form method="POST" action="signup_action.php">
        <?php if (!empty($_SESSION['flash'])) : ?>
          <?= $_SESSION['flash']; ?>
          <?php $_SESSION['flash'] = ''; ?>
        <?php endif; ?>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingName" placeholder="Nome" name="name">
          <label for="floatingInput"><strong>Nome</strong></label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="nome@cigam.com" name="email">
          <label for="floatingInput"><strong>E-mail</strong></label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword"><strong>Senha</strong></label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" id="btn" type="submit"><strong>Cadastrar</strong></button>
        <p class="mt-5 mb-3 text-muted">&copy; Rafael Kasper</p>
      </form>
    </main>

  </div>

</body>

</html>