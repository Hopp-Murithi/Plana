<?php get_header() ?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card login-card">

        <div class="card-body">
          <form>
            <h1 class="d-flex align-items-center justify-content-center ">Login</h1>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
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

  h1{
      color:#DFDFDF;
    }

  .login-card {
    background-color: #3066BE;
    border-radius: 10px;
    color: #DFDFDF;
    margin: 0 auto;
    margin-top: 100px;
    max-width: 600px;
    overflow: hidden;
  }

  .login-card .card-image {
    width: 50%;
    float: left;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }

  .login-card .card-body {
    padding: 20px;
  }

  .login-card input[type="email"],
  .login-card input[type="password"] {
    background-color: #DFDFDF;
    color: #3066BE;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
  }

  .login-card button[type="submit"] {
    background-color: #9B2915;
    width: 100%;
    color: white;
    font-weight: 600;
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .login-card button[type="submit"]:hover {
    background-color: #EE0A0A;
    color: white;
  }
</style>