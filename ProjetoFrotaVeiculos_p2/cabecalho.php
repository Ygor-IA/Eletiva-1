<?php
  session_start();
  if(!isset($_SESSION['acesso']))
    header('location: index.php');
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Frota</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa; /* Um cinza claro de fundo */
    }
    @media print {
      .no-print{
        display: none !important;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark no-print shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="principal.php">Sistema Frota</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="principal.php">Início</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownCadastros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastros
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownCadastros">
              <li><a class="dropdown-item" href="tipos_veiculo.php">Tipos de Veículos</a></li>
              <li><a class="dropdown-item" href="veiculos.php">Veículos (RF1)</a></li>
              <li><a class="dropdown-item" href="motoristas.php">Motoristas (RF2)</a></li>
              <li><a class="dropdown-item" href="rotas.php">Rotas (RF3)</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="viagens.php">Viagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="relatorios.php">Relatórios</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <span class="navbar-text text-white me-3">
                  Olá, <?= htmlspecialchars($_SESSION['nome']) ?>
                </span>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger" href="logout.php">Sair</a>
            </li>
        </ul>

      </div>
    </div>
  </nav>
  
  <div class="container py-4">