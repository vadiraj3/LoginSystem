<?php

if(isset($_POST['login'])){

  require 'dbh.inc.php';

  $mail= $_POST['Email'];
  $pwd= $_POST['pwd'];

  if(empty($mail)||empty($pwd))
  {
    header('Location: ../main.php?error=EmptyFields');
    exit();
  }
  $sql= "SELECT * FROM users WHERE Username=? OR Email=?;";
  $stmt= mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
    header('Location: ../main.php?error=sqlError');
    exit();
  }
  else
  {
    mysqli_stmt_bind_param($stmt,"ss",$mail,$mail);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($result))
    {
      $pwdcheck= password_verify($pwd, $row['Password']);
      if($pwdcheck==false){
        header('Location: ../main.php?error=wrongpassword');
        exit();
      }
      elseif($pwdcheck==true){
        session_start();

        $_SESSION['ID']= $row['Id'];
        $_SESSION['USERNAME']=$row['Username'];

        header('Location: ../dashboard.php?login=success');
        exit();

      }else{
        header('Location: ../main.php?error=someerror');
        exit();
      }
    }
    else {
      header('Location: ..main.php?error=nouser');
      exit();
    }
  }

}else{
  header('Location: ../main.php?error=Invalidaccess');
  exit();
}
  ?>
