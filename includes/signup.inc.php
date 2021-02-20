<?php

if(isset($_POST['signup']))
{
 require 'dbh.inc.php';

$username= $_POST['username'];
$Email= $_POST['email'];
$pwd= $_POST['pwd'];
$pwdrepeat= $_POST['pwd-repeat'];

if(empty($username)||empty($Email)||empty($pwd)||empty($pwdrepeat))
{
  header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$Email);
  exit();
}
elseif(!filter_var($Email,FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/",$username))
{
  header("Location: ../signup.php?error=invalidMailandUsername");
  exit();
}
elseif(!filter_var($Email,FILTER_VALIDATE_EMAIL))
{
  header("Location: ../signup.php?error=invalidMail&username=".$username);
  exit();
}
elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username))
{
  header("Location: ../signup.php?error=invalidUsername&email=".$Email);
  exit();
}
elseif($pwd!==$pwdrepeat)
{
  header("Location: ../signup.php?error=password&username=".$username."&email=".$Email);
  exit();
}
else{
  $sql=" SELECT Username FROM users WHERE Username=?";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql))
  {
    header("Location: ../signup.php?error=sqlError");
    exit();
  }
  else
   {
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultcheck= mysqli_stmt_num_rows($stmt);
    if($resultcheck<0)
    {
      header("Location: ../signup.php?error=Usernametaken&email=".$Email);
      exit();
    }else{

      $sql= "INSERT INTO users (Username,Email,Password) VALUES(?,?,?)";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signup.php?error=sqlError");
          exit();
        }
        else
         {
           $hashedpwd= password_hash($pwd,PASSWORD_DEFAULT);

           mysqli_stmt_bind_param($stmt,"sss",$username,$Email,$hashedpwd);
           mysqli_stmt_execute($stmt);
            $_SESSION['success']="SignUp Success";
           header("Location: ../main.php");

           exit();
        }

    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
}
else {
  header("Location: ../signup.php");
  exit();
}






 ?>
