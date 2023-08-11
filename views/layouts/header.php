<?php
use MuhthishimisCoding\PreFramework\Application;
$user = Application::user();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- CSS LINKS HERE -->
    <?php echo $css ??'';?>
  </head>
  <body>
   
<nav class="navbar navbar-expand-lg  bg-dark text-white" style="background-color: #000!important;" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#" >Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/contact">Contact</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled text-white-50" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <?php if($user){ ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-white " href="/profile">Welcome <?php echo $user['username'];?>!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/logout">Logout</a>
        </li>
      </ul>
      <?php }
        else{?>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/register">Register</a>
        </li>
      <?php }
        ?>
      </div>
    </div>
</nav>
<div class="container mt-3">

    <!-- <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form> -->