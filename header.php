<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width,initial-scale=1">
    <title>LoginSystem</title>
    <link rel="stylesheet" href="bootstrap.css">
  </head>
  <body >
    <header>

        <div class="bg-white mb-0" >
                <h2 style="text-align:center;">LOGIN SYSTEMS</h2>
        </div>

      <nav  class="navbar navbar-expand-lg navbar-light bg-dark  " >
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto px-3  ">

              <li class="nav-item"><a class="nav-link text-white " style="font-size:20px;" href="main.php">Home </a> </li>
              <li class="nav-item"><a class="nav-link text-white" style="font-size:20px" href="about.php">About</a>  </li>
              <li class="nav-item"><a class="nav-link text-white " style="font-size:20px" href="services.php">Services</a>  </li>
              <li class="nav-item"><a class="nav-link text-white " style="font-size:20px" href="dashboard.php">Dashboard</a>  </li>
         </ul>
         <?php
            if(isset($_SESSION['ID']))
            { ?>
              <form class="form-inline mr-sm-2 col-xs-4" action="includes/logout.inc.php" method="post">

                <button type="submit" class=" btn btn-danger" name="Logout">LogOut</button>
              </form>
          <?php  }
            else
            { ?>
              <div class=" row">
                <form class="form-inline my-2 my-lg-0 col-xs-4" action="includes/login.inc.php" method="post">
                  <input class="form-control mr-sm-2" type="text" name="Email" placeholder="Username/Email">
                  <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
                  <button type="submit" class=" btn btn-primary font-weight-bold"  name="login">Login</button>
             </form>
                <a href="signup.php" class="col-xs-4 btn btn-primary mx-2 font-weight-bold">SignUp</a>
                </div>
              </div>
        <?php    }

           ?>

            

      </nav>
    </header>
<?php
require 'footer.php'; ?>
