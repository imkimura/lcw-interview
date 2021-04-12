<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Locaweb Exam</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- DataTable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Montserrat:wght@300;400;500&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/main.css">
    
  </head>
  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light" style="z-index: 1;">      
      <div class="collapse navbar-collapse" id="navbarNav">
        <a class="navbar-brand title-navbar" href="index.php"><img src="./assets/img/locaweb.png" alt="LOCAWEB"></a>
        <ul class="navbar-nav">
          <li class="nav-item<?php if (preg_match("/\bindex.php\b/", $_SERVER['SCRIPT_NAME'])): ?> active<?php endif; ?>">
            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item<?php if (preg_match("/\bvende(dor|dores)\b/", $_SERVER['SCRIPT_NAME'])): ?> active<?php endif; ?>">
            <a class="nav-link" href="vendedores.php">Vendedores</a>
          </li>
          <li class="nav-item<?php if (preg_match("/\bvend(a|as)\b/", $_SERVER['SCRIPT_NAME'])): ?> active<?php endif; ?>">
            <a class="nav-link" href="vendas.php">Vendas</a>
          </li>
        </ul>
      </div>
      <div>
        <p> <i class="fas fa-user-shield" style="color: #f00843;font-size: 21px;margin-right: 7px;"></i> Ola, Caro Analisador!</p>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </nav>
    <div class="container">

    