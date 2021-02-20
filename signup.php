<?php
require 'header.php';
?>
<main>
  <div class="container p-5 my-3 bg-light text-black text-center ">
    <section>
      <h1 class="my-3">SignUp Form</h1>
      <?php

      if(isset($_GET['error'])){
        $error= $_GET['error'];

      $errors= array("Emptyfields"=>"emptyfields","InvalidMailandUsername"=>"invalidMailandUsername","InvalidMail"=>"invalidMail","InvalidUsername"=>"invalidUsername","IncorrectPassword"=>"password");
      $err= array_search($error,$errors);
    if($err){
       ?>
      <p class="text-danger"> Error= <?php echo $err; ?>. Please fill the fields Correctly</p>
       <?php   }
        }
        ?>

      <form  action="includes/signup.inc.php" method="post">
   <div class="form-group form-inline justify-content-center">
        <input type="text" class=" form-control " name="username" placeholder="Username..." value="<?php if(isset($_GET['username'])){ echo $_GET['username'];}?>">
    </div>
    <div class="form-group form-inline justify-content-center">
        <input type="text" class="form-control" name="email" placeholder="Email..." value="<?php if(isset($_GET['email'])){ echo $_GET['email'];}?>">
      </div>
         <div class="form-group form-inline justify-content-center">
        <input type="password" class="form-control" name="pwd" placeholder="Password...">
      </div>
         <div class="form-group form-inline justify-content-center">
        <input type="password" class="form-control"  name="pwd-repeat" placeholder="Repeat Password...">
      </div>
         <div class="form-group form-inline justify-content-center">
          <button type="submit" class="btn btn-dark text-white"  name="signup">Signup</button>
        </div>
      </form>

    </section>
    <?php if(isset($_GET["signup"])){  ?>
      <div class="alert alert-success text-center">
          <h5><?php echo
           $_GET["signup"] ?></h5>
      </div>
    <?php } ?>


    </div>
</main>



<?php
require 'footer.php';
?>
