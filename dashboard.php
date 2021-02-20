<?php require 'header.php' ?>


<div class="container">
<?php 
    if(!isset($_SESSION['ID'])){ 
        ?>
    <div class="alert alert-danger">
    <h5 class="text-center">You are Not Logged in</h5>
    </div>    
   <?php } else{ ?>

   <div class="alert alert-success">
   <h3 class="text-center">Welcome <?php echo ($_SESSION['USERNAME']) ?></h3>
   </div>
   <?php } ?></div>

<?php require 'footer.php' ?>