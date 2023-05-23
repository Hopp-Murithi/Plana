<?php

if (isset($_POST['userreg'])) {
  // Fetch user inputs
  $username = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate user inputs
  $errors = array();

  if (empty($username)) {
    $errors['full_name'] = 'Please enter a username';
  }

  if (empty($email)) {
    $errors['email'] = 'Please enter an email address';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
  }

  if (empty($password)) {
    $errors['password'] = 'Please enter a password';
  }

  if ($password !== $confirm_password) {
    $errors['confirm_password'] = 'Passwords do not match';
  }

  // Create new user if there are no errors
  if (empty($errors)) {
    $user_id = wp_create_user($username, $password, $email);
    if (is_wp_error($user_id)) {
      var_dump($user_id);
      echo '<p class="signup-error">An error occurred while creating your account. Please try again later.</p>';
    }
  } else {
    // Display errors
    foreach ($errors as $error) {
      echo '<p class="signup-error">' . $error . '</p>';
    }
  }
}
?>
<?php get_header() ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card signup-card">

        <div class="card-body">
          <form method="post">
            <h1 class="d-flex align-items-center justify-content-center">Register</h1>
            <div class="form-group">
              <input type="text" class="form-control" name="full_name" placeholder="Full Name">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>
            <button type="submit" name="userreg" class="btn btn-primary btn-block">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  @import url('https://fonts.googleapis.com/css?family=PT+Serif+Caption:400');

  body {
    background: radial-gradient(#9B2915, #DFDFDF) no-repeat center center fixed;
    font-size: 16px;
    font-family: 'PT Serif Caption', serif;
    line-height: 1.5;
  }

  h1 {
    color: #3066BE;
  }

  .signup-card {
    background-color: #ffffff;
    border-radius: 10px;
    color: #DFDFDF;
    margin: 0 auto;
    margin-top: 100px;
    max-width: 600px;
    overflow: hidden;
  }

  .signup-card .card-body {
    padding: 20px;
  }

  .signup-card input[type="text"],
  .signup-card input[type="email"],
  .signup-card input[type="password"] {
    background-color: #DFDFDF;
    color: #3066BE;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
  }

  .signup-card button[type="submit"] {
    background-color: #3066BE;
    width: 100%;
    color: white;
    font-weight: 600;
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .signup-card button[type="submit"]:hover {
    background-color: #005CFB;
    color: white;
  }
</style>
