<?php 

session_start();
include("../login/checklogin.php");
check_login();
require_once('../login/dbconnection.php');

    
?>


<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>change password</title>

  

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

    <!-- Custom Style-->
    <link rel="stylesheet" href="http://localhost/gestiondunebibliotheque/login/css/login.css">

    <link rel="stylesheet" href="http://localhost/gestiondunebibliotheque/css/serchs.css">


<!-- Basic -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


    <!-- End header -->


<body>
    <div class="codrops-top clearfix" style="background-color: #04488C ;">
        <a class="codrops-icon codrops-icon-prev" href="http://localhost/Tiri-Bouteldja [système de gestion d_une bibliothèque (mémoire + implémentation)]\Gestion d_une bibliothèque (abonné)\libraryforuser/library-login/index.php"><span>Previous page</span></a>
     
      </div>

<section  style="background-color: #04488C ;">

<?php

$bdd= mysqli_connect("localhost","root","","biblio");
if(isset($_POST['Submit']) )
{
 $oldpass=$_POST['opwd'];
 $user=$_POST['user'];
 $newpassword=$_POST['npwd'];
$sql=mysqli_query($bdd,"SELECT * FROM user WHERE email='$user' AND password='$oldpass'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($bdd,"UPDATE user SET password='$newpassword' where email='$user'");
$_SESSION['message']="Password Changed Successfully ";
$_SESSION['msg_type']="success";
}
else
{
    $_SESSION['message']="username and password doesn't match";
$_SESSION['msg_type']="danger";

}
}
?>


<?php
  if (isset($_SESSION['message'])): ?>
  <div class="err-msg alert alert-<?=$_SESSION['msg_type']?>">
<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
  <?php endif; ?>
</section>
<section style="background-color: #04488C ;" >
<div class="cont marg" >

<div class="rapper">
    <div class="rightside">
<form class="chngpsw-form" method="POST" onsubmit="return valid()">
    <div class="titles chngpsw-title">
        <h1>change password</h1>
        
    </div>
 <?php    $email=$_SESSION['email']; 
?>
    <div class="form-group" style="margin-right: 3rem;">
    <input class="form-input" type="text" name="user" id="user" value= "<?php echo $email; ?> " readonly style="padding-left: 1rem;">
        <div class="input-icon" style="margin-left: 100px;">
            <i class="fas fa-user"></i>
        </div>
    </div>
    <div class="form-group" style="margin-right: 3rem;">
    <input class="form-input" type="password" name="opwd" id="opwd" placeholder="old password" style="padding-left: 1rem;">
        <div class="input-icon" style="margin-left: 100px;">
            <i class="fas fa-user-lock"></i>
        </div>
    </div>
    <div class="form-group" style="margin-right: 3rem;">
    <input class="form-input" type="password" name="npwd" id="npwd" placeholder="new password" style="padding-left: 1rem;">
        <div class="input-icon" style="margin-left: 100px;" >
            <i class="fas fa-user-lock">  </i>
        </div>
    </div>

    <div class="form-group" style="margin-right: 3rem;">
    <input class="form-input" type="password" name="cpwd" id="cpwd" placeholder="confirm new password"
    style="padding-left: 1rem;">
        <div class="input-icon" style="margin-left: 100px;">
            <i class="fas fa-user-lock"></i>
        </div>
    </div>

    <input class="btn btn-psw" type="submit" name="Submit" value="Change Passowrd" />
</form>

</div>
  </div>


<div class="rapper2">
                
<div class="leftside" ><img class="pswimg" src="http://localhost/gestiondunebibliotheque/image/Security On-bro(2).svg" alt=""> </div>

</div>   </section>

</body>

 

    <!-- ALL JS FILES -->
    
    <script type="text/javascript">
function valid()
{
  
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty ");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty ");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty ");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match ");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>



</html>