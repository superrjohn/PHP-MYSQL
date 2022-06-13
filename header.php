<?php 
session_start();
include_once 'dbConnect.php';
include_once 'stock.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>寶石預訂</title>
  <link rel="stylesheet" href="/css/css.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">首頁</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/about.php">關於</a>
        </li>
      </ul>
      <ul class="d-flex">
    <?php
    if($_SESSION)
    {
      echo 
        "<li class='nav-link active'>
          你好, {$_SESSION['name']}
        </li>";
      echo ' 
      <li class="navbar-nav me-2">
        <a class="nav-link active" aria-current="page" href="/allOrders.php">所有訂單</a>
      </li>';
      echo '
      <li class="navbar-nav me-2">
        <a class="nav-link active" aria-current="page" href="/functions.php?op=logout">登出</a>
      </li>';
      
    }
    else
    {
      echo '
      <li class="navbar-nav me-2">
        <a class="nav-link active" aria-current="page" href="/login.php">用戶登入</a>
      </li>';
    } 
  ?>
      </ul>
    </div>
  </div>
</nav>