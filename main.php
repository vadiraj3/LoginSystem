<?php
require 'header.php';

?>
<main >
  <?php  if(isset($_GET['error'])){ ?>
    <div class="alert alert-danger">
    <h3 class="text-center"><?php echo $_GET['error']?></h3></div>
 <?php }
  ?>
<div class="servicescontainer">
        <h1>Home Page</h1>
   </div>

</main>

   

<?php require 'footer.php';
?>
