<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Plana</title>
  <?php wp_head(); ?>
</head>

<body>
  <?php
  $logo = get_template_directory_uri() . '/assets/logo.png';
  ?>
  <?php if (is_user_logged_in()) {
    echo '<nav class=" nav-loggedin navbar container-fluid navbar-expand-lg navbar-dark bg-light">
      <a class="navbar-brand" style="margin-left:8px;" href=""http://localhost/plana/"><img class="img" src="https://i.ibb.co/FVLbTPm/planaa-low-resolution-color-logo.png" alt="logo" border="0"></a>
      

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          
        </ul>
      </div>
      
      <div class="navbar-nav ml-auto">
       <div>
      <a class="nav-link tickets logout" href="http://localhost/plana/index.php/my-tickets/">My Tickets</a>
      </div>
      <div >
      <a class="nav-link tickets logout" href="<?php echo wp_logout_url(); ?>">Logout</a> </div>
      </div>
    </nav>';
  } else {
    echo '<nav class=" nav-loggedin navbar container-fluid navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand" style="margin-left:8px;" href="http://localhost/plana/"><img class="img" src="https://i.ibb.co/FVLbTPm/planaa-low-resolution-color-logo.png" alt="logo" border="0"></a>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        
      </ul>
    </div>
    
    <div class="navbar-nav ml-auto">
     <div>
    <a class="nav-link tickets logout" href="http://localhost/plana/index.php/sign-up/">Register</a>
    </div>
    <div >
    <a class="nav-link tickets logout" href="http://localhost/plana/index.php/login/">Login</a> </div>
    </div>
  </nav>';
  } ?>
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .nav-loggedin {
      margin-top: -32px;
    }

    .logout {
      color: black;
      text-decoration: none;
      padding: 6px;
      margin: 0 10px;
      transition: transform 2s ease-out;
    }

    .logout:hover {
      color: black;
      text-decoration: underline;
      transform: scaleX(1);

    }

    .img {
      width: 60px;
      margin: 0 5px;
      border-radius: 50%;
    }

    .about {
      color: #ffffff;
    }

    button {
      background-color: #005CFB;
      color: white;
      margin: 5px;
      border-radius: 10px;
    }

    .btn-color {
      color: #ffffff;
    }
  </style>