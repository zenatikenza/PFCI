<?php session_start();
require('../login/dbconnection.php');
if(isset($_POST['login']))
{ 
$password=$_POST['password'];
$useremail=$_POST['uemail'];
$retp= query($con,"SELECT * FROM user WHERE email="$useremail and "password"=$password );
$ret= query($con,"SELECT * FROM abonne WHERE email="$useremail );

$trouv=false;
while ($tuple=$con->fetch()) {
  if ($useremail==$tuple["email"] AND $password==$tuple["password"]) {
    $trouv=true;
    break;
    
  }
}
if ($trouv==true) {
  // pour sauvegarder mon email
  $_SESSION["connected"]=true;
  $_SESSION["uemail"]=$_POST["mail"];
  header("location:..login/libraryforuser/library-login/index.html");
} else {
    $_SESSION["connected"]=false;
  header("location:index.php");
}



  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body ">
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form"  name="login" action="" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Useremail" name="uemail" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" name="login" value="LOG IN" class="btn solid" />
            
           
          </form>
          <form action="#" class="sign-up-form"  name="login" action="" method="post">
            <h2 class="title">Rest Password</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Useremail" name="femail" />
            </div>
       
          <input type="submit" name="send" onClick="myFunction()" value="Send " class="btn solid" />
           
            
                     </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Forget password ?</h3>
            <p>
          
Don't worry, click here and we'll call you back immediately
            </p>
            <button class="btn transparent" id="sign-up-btn">
            Reset password
            </button>
          </div>
          <img src="images/fot-lo.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Not you ?</h3>
           
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/fot-lo.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
