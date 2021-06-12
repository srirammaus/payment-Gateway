<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con));

$username="sriram";
$_SESSION['sess_user']=$username;
$class_=11;
$_SESSION['class']=$class_;
//username---need to place here next of class
function var__($class_){
   /*----------------------for taking class-----------By This function we will get class_ from mysql.Now temporaily vairaable will be assigned-----------------
   $con__ = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con__));
   $class__var=mysqli_query($con__,"SELECT * FROM `` ---- WHERE `username`=''"); */
   if(empty($class_)){
      header("location:register2.php"); // ---here we need to redirect him to Sigin .
   }
 }

 var__($class_);
 if($class_==6 || $class_==7||$class_==8 ||$class_==9 || $class_==10  || $class_==11|| $class_==12 ){
   if($class_==6 || $class_==7||$class_==8 ||$class_==9 || $class_==10  ){
      header("location:all_packages.php?id=BOARDS");
   }
}else{
   header("location:register2.php");
}


?>

<html>
  <head>
      
  <meta charset="UTF-8">
  <link rel="icon" href="logotrans.png" type="image/icon">
        <link rel="shortcut icon" href="#" />
    <meta name="theme-color" content="#8085e1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#8085e1">
      <title>Packages</title>
      <style>
*, *::before, *::after {
   box-sizing: border-box;
}

body {
   font-family: sans-serif;
   font-size: 1em;
   color: #333;
}

h1 {
  font-size: 1.4em;
}

em {
   font-style: normal;
}

a {
   text-decoration: none;
   color: inherit;
} 

/* Layout */
.s-layout {
   display: flex;
   width: 100%;
   min-height: 100vh;
}



/* Sidebar */
.s-sidebar__trigger {
   z-index: 2;
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 4em;
   background: #8085e1;
}

.s-sidebar__trigger > i {
   display: inline-block;
   margin: 1.5em 0 0 1.5em;
   color: #fff;
}

.s-sidebar__nav {
   position: fixed;
   top: 0;
   left: -15em;
   overflow: hidden;
   transition: all .3s ease-in;
   width: 15em;
   height: 100%;
   background: #8085e1;
   color: rgba(255, 255, 255, 1);
}

.s-sidebar__nav:hover,
.s-sidebar__nav:focus,
.s-sidebar__trigger:focus + .s-sidebar__nav,
.s-sidebar__trigger:hover + .s-sidebar__nav {
   left: 0;
}

.s-sidebar__nav ul {
   position: absolute;
   top: 4em;
   left: 0;
   margin: 0;
   padding: 0;
   width: 15em;
}

.s-sidebar__nav ul li {
   width: 100%;
}

.s-sidebar__nav-link {
   position: relative;
   display: inline-block;
   width: 100%;
   height: 4em;
}

.s-sidebar__nav-link em {
   position: absolute;
   top: 50%;
   left: 4em;
   transform: translateY(-50%);
}

.s-sidebar__nav-link:hover {
    background: white;
   color:#8085e1;
}



.s-sidebar__nav-link > i {
   position: absolute;
   top: 0;
   left: 0;
   display: inline-block;
   width: 4em;
   height: 4em;
}

.s-sidebar__nav-link > i::before {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
}
li{
  margin: 10px 0;
}
/* Mobile First */@media (max-width: 600px) {
#oo{margin-left:15%;
}  }
@media (min-width: 601px) {
   .s-layout__content {
      margin-left: 4em;
   }
   
   /* Sidebar */
   .s-sidebar__trigger {
      width: 4em;
   }
   
   .s-sidebar__nav {
      width: 4em;
      left: 0;
   }
   
   .s-sidebar__nav:hover,
   .s-sidebar__nav:focus,
   .s-sidebar__trigger:hover + .s-sidebar__nav,
   .s-sidebar__trigger:focus + .s-sidebar__nav {
      width: 15em;
   }
}

@media (min-width: 601px) {
   .s-layout__content {
      margin-left: 50em;
      justify-content: center;
    align-content: center;
    align-content: center;
   }
   
   /* Sidebar */
   .s-sidebar__trigger {
      display: none
   }
   
   .s-sidebar__nav {
      width: 15em;
   }
   
   .s-sidebar__nav ul {
      top: 1.3em;
   }
}

s-layout__content{
    width:100%;
    
}


        
:root {
  --base-grid: 8px;
  --colour-white: #fff;
  --colour-black: #1a1a1a;
}

*, :after, :before {
    box-sizing: border-box;
}

html {
  margin: 0;
  padding: 0;
  background-position: 100%;
}

body {
  /*background-color:#8085e1;*/
  font-family: Josefin Sans, sans-serif;
    margin: 0;
  padding: 0;
}

.links {
  --link-size: calc(var(--base-grid)*20);
  color: var(--colour-black);
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  min-height: 100vh;
}

.links__list {
  position: relative;
  list-style: none;
}

.links__item {
  width: var(--link-size);
  height: var(--link-size);
  position: absolute;
  top: 0;
  left: 0;
  margin-top: calc(var(--link-size)/-2);
  margin-left: calc(var(--link-size)/-2);
  --angle: calc(360deg/var(--item-total));
  --rotation: calc(140deg + var(--angle)*var(--item-count));
  transform: rotate(var(--rotation)) translate(calc(var(--link-size) + var(--base-grid)*2)) rotate(calc(var(--rotation)*-1));
}

.links__link {
  opacity: 0;
  animation: on-load .3s ease-in-out forwards;
  animation-delay: calc(var(--item-count)*150ms);
  width: 100%;
  height: 100%;
  border-radius: 50%;
  position: relative;
  background-color: #8085e1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  color: inherit;
}

.links__icon {
  width: calc(var(--base-grid)*8);
  height: calc(var(--base-grid)*8);
  transition: all .3s ease-in-out;
  fill: var(--colour-black);
}

.links__text {
  position: absolute;
  width: 100%;
  left: 0;
  text-align: center;
  height: calc(var(--base-grid)*2);
  font-size: calc(var(--base-grid)*2);
  display: none;
  bottom: calc(var(--base-grid)*8.5);
  animation: text .3s ease-in-out forwards;
}

.links__link:after {
  content: "";
  background-color: transparent;
  width: var(--link-size);
  height: var(--link-size);
  border: 2px dashed var(--colour-white);
  display: block;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 0;
  transition: all .3s cubic-bezier(.53,-.67,.73,.74);
  transform: none;
  opacity: 0;
}

.links__link:hover .links__icon {
  transition: all .3s ease-in-out;
  transform: translateY(calc(var(--base-grid)*-1));
}

.links__link:hover .links__text {
  display: block;
}

.links__link:hover:after {
  transition: all .3s cubic-bezier(.37,.74,.15,1.65);
  transform: scale(1.1);
  opacity: 1;
}

@keyframes on-load {
  0% {
    opacity: 0;
    transform: scale(.3);
  }
  70% {
    opacity: .7;
    transform: scale(1.1);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes text {
  0% {
    opacity: 0;
    transform: scale(0.3) translateY(0);
  }
  100% {
    opacity: 1;
    transform: scale(1) translateY(calc(var(--base-grid)*5));
  }
}
      </style>
  </head>
  <body>
      <!-- <?php
          $aa='';
                  $ww= $class;
          if ($ww== '6') 
          {
  $aa = "subject6.php";
} 
else if ($ww=='7') 
{
  $aa = "subject7.php";

} 
else if ($ww=='8')
{
  $aa = "subject8.php";

} 
else if ($ww=='9') 
{
  $aa = "subject9.php";

} 
else if ($ww=='10') 
{
  $aa = "subject10.php";

} 
else if ($ww=='11') 
{
  $aa = "subject11.php";
}
else
{
  $aa = "subject12.php";
}
       $_SESSION['aa']=$aa;   ?> -->
         
      
    <div class="s-layout">
<!-- Sidebar -->
<div class="s-layout__sidebar">
  <a class="s-sidebar__trigger" href="#0">
     <i class="fa fa-bars"></i>
  </a>

  <nav class="s-sidebar__nav">
     <ul>
        
        <li>
           <a class="s-sidebar__nav-link" href="<?php echo $aa ?>" >
               <i class="fa fa-book"></i><em>Notes</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="vids.php">
              <i class="fa fa-camera"></i><em>Video lessons</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="mocks.html">
              <i class="fa fa-pencil-square-o"></i><em>Mocks</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="packages.php">
              <i class="fa fa-book"></i><em>Packages</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="cart.php">
              <i class="fa fa-cart-plus"></i><em>Cart</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link active" href="profile1.php" style="bottom:0;">
              <i class="fa fa-user"></i><em>Profile</em>
           </a>
        </li>
     </ul>
  </nav>
</div>

<!-- Content -->
<? $this_page="home" ?>
<main class="s-layout__content" id="oo">
        <div class="links">
  <ul class="links__list" style="--item-total:3">
  <?php
  if($class_==11 || $class_==12){?>
    <li class="links__item" style="--item-count:1">
      <a class="links__link" href="all_packages.php?id=JEE">
        <div class="links__icon" >
            <h2 style="color:white;">JEE</h2>  </div></a>
    </li>
    <li class="links__item" style="--item-count:2">
      <a class="links__link" href="all_packages.php?id=NEET">
           <div class="links__icon" >
            <h2 style="color:white;">NEET</h2>  </div></a>
    </li>
    <li class="links__item" style="--item-count:3">
      <a class="links__link" href="all_packages.php?id=BOARDS">
         <div class="links__icon" >
            <h2 style="color:white;">BOARDS</h2>  </div></a>
    </li>
    <?php
  }?>

  </ul>
</div>







</main>
</div>
      <script type="text/javascript">
    document.cookie = "abc =<?php $user ?>";
</script>
  
  </body>
    </html>