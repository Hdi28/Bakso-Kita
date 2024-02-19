<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title_web;?> | Bakso Kita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <style>

        *{
          font-family: 'Roboto', sans-serif;
        }

        /* navbar */

        .navbar-brand {
          font-weight: 700;
          font-style: italic;
        }

        /* end navbar */
       
        /* content */

        .bakso {
        padding-top: 100px;
      }

        .bakso h1 {
          font-weight: 400;
        }

        /* end content */

        #menu {
            padding-top: 90px;
            min-height: 500px;
        }
        .content {
            min-height: 400px;
        }
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

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      #hover {
        text-decoration: none;
        color: black;
      }

      #hover:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        text-decoration: none;
      }

      h5{
        color: black;
      }

      #container{
        padding-top: 90px;
      }


      
    
    </style>

  </head>
  <body>
  
  <nav style="background-color: RGB(133, 225, 127);" class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo $url;?>login/index.php">Bakso Kita</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($title_web == 'Detail'){ echo 'active';}?>
            <?php if($title_web == 'Main'){ echo 'active';}?>
            <?php if($title_web == 'Struk'){ echo 'active';}?>
            <?php if($title_web == 'Pembelian'){ echo 'active';}?>" aria-current="page" href="<?php echo $url;?>login/index.php">Home</a>
        </li>
        <li class="nav-item">
        <div class="dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Menu Kami
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?php echo $url;?>login/index.php#bakso">Bakso</a></li>
    <li><a class="dropdown-item" href="<?php echo $url;?>login/index.php#mie_ayam">Mie Ayam</a></li>
    <li><a class="dropdown-item" href="<?php echo $url;?>login/index.php#minuman">Minuman</a></li>
  </ul>
</div>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title_web == 'Order'){ echo 'active';}?>" href="<?php echo $url;?>login/pesanan_anda.php">Pesanan Anda</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">Log out</a>
        </li>
    </ul>
      
    </div>
  </div>
</nav>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin ingin melakukan log out?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="<?php echo $url;?>login/logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
      </div>
    </div>
  </div>
</div>