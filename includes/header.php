<?php

  session_start();
  if(!$_SESSION['nome']){
    header("Location: index.php");
    exit;
  }

  $nome   = $_SESSION['nome'];
  $id     = $_SESSION['id'];
  $foto   = $_SESSION['foto'];
  $email  = $_SESSION['email'];
  $tipo   = $_SESSION['tipo'];
  $rg   = $_SESSION['rg'];
  $cpf   = $_SESSION['cpf'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">

    <!-- Bootstrap CSS and ICONS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Portal de Notícias</title>
  </head>
  <body class="bg-dark text-light">
    <div>
  <nav class="navbar navbar-expand-lg text-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-light ms-3" href="home.php">
        <img class="logoNav" src="assets/img/logo.png">
        Portal de Notícias
      </a>
      <button class="navbar-toggler text-light me-3 navbarIcon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="home.php">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex align-items-center me-3" role="search">
          <div class="dropdown text-light me-4">
            <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?=$nome;?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Perfil</a></li>
              <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            </ul>
          </div>
          <img class="fotoNav" src="<?=$foto;?>" onerror="this.src='image/usuarioDefault.png'" alt="Foto de <?=$nome;?>" oneerror>
        </form>
      </div>
    </div>
  </nav>
</div>

  <!-- Modal Perfil-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Perfil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-4"><img class="imgPerfil" src="<?=$foto?>" onerror="this.src='image/usuarioDefault.png'"></div>
              <div class="col-6 ms-2">
                <div class="row"><h5> Nome: <?=$nome?> </h5></div>
                <div class="row"><h5> Email: <?=$email?> </h5></div>
                <div class="row"><h5> Rg: <?=$rg?> </h5></div>
                <div class="row"><h5> Cpf: <?=$cpf?> </h5></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" href="editarUsuario.php" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>
    <div class="container">

    