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
    echo '<nav class=" nav-loggedin navbar container-fluid navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href=""http://localhost/plana/"><img src="https://i.ibb.co/NrkcByb/logo.png" alt="logo" border="0"></a>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          
        </ul>
      </div>
      
      <div class="navbar-nav ml-auto"> <button>
      <a class="nav-link tickets" href="http://localhost/plana/index.php/my-tickets/">My Tickets</a>
      </button>
      <button>
     
      <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">Logout</a> </button>
      </div>
    </nav>';
  } else{
    echo'<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="https://i.ibb.co/NrkcByb/logo.png" alt="logo" border="0"></a>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
    </div>
    
    <div class="btn-color navbar-nav ml-auto"> <button>
    <a class="nav-link tickets" href="http://localhost/plana/index.php/sign-up/">Register</a>
    </button>
    <button>
      <a class="nav-link" href="http://localhost/plana/index.php/login/">Login</a> </button>
    </div>
  </nav>';
  }?>
  <style>
     body {
      margin: 0;
      padding: 0;
    }
    .nav-loggedin{
      margin-top: -32px;
    }
    img {
      width: 60px;
      margin: 0 5px;
      border-radius: 50%;
    }
.about{
  color: #ffffff;
}
    button {
      background-color: #005CFB;
      color: white;
      margin: 5px;
      border-radius: 10px;
    }
    .btn-color{
      color: #ffffff;
    }
  </style>