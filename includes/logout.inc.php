<?php

if(isset($_POST['Logout'])){
  session_start();
  session_unset();
  session_destroy();

  header("Location: ../main.php?Logout=success");
  exit();

}else{

  header('Location: ../main.php?error=You need to press Logout button');
  exit();
}





 ?>
