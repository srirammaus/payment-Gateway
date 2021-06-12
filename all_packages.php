<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con));
if(!isset($_SESSION['sess_user'])){
  header("location: register2.php");
  die();
}
$user=$_SESSION['sess_user'];

$id="";
$flag="";
if(isset($_GET['id'])){
  $id=$_GET['id'];
  #echo "<br>TEST $id <br>";
  
}
else{
  #echo "<br>TEST FAIL <br>";
}
/*--- 12 connections-for Temporary we dont use functions-*/
$cls=$_SESSION['class'];
if($id != "BOARDS" && $id !="JEE" && $id !="NEET"){
  header("location: packages.php"); //---proper.
}
if(empty($cls)){
  header("location: register2.php"); //------Here WE need to redirect user to sigin.
}
if($id== "JEE"){
  if($cls ==11 || $cls ==12){
    $flag=1;
  }else{
    header("location: register2.php");//------Here we need redirect where the Class is initiated !!!
  }
}
if($id== "NEET"){
  if($cls ==11 || $cls ==12){
    $flag=2;
  }else{
    header("location: register2.php");//------Here we need redirect where the Class is initiated !!!
  }
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
   background:#f7f7f7;
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
      margin-left: 18em;
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


.container {
  width: 90%;
  margin: 50px auto;
}
.heading {
  text-align: center;
  font-size: 30px;
  margin-bottom: 20px;
}

.row {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-flow: wrap;
}

.card {
  width: 112%;
  background:#f9f7f7;
  border: 1px solid #f3ecec;
  margin-bottom: 50px;
  transition: 0.3s;
  border-radius: 6px;
  box-shadow: 1px 3px 6px 0px;
}

.card-header {
  text-align: center;
  padding: 10px 10px;
  background: linear-gradient(to right, #ff416c, #ff4b2b);
  color: #fff;
}

.card-body {
  padding: 30px 20px;
  text-align: center;
  font-size: 18px;
}

.card-body .btn {
  /*display: block;*/
  color: #fff;
  text-align: center;
  background: #8085e1;
  padding: 11px 33px;
    border-radius: 22px;
    font-size: 17px;
    font-weight: 600;
    box-shadow: 1px 0px 4px 1px #9e9e9e;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
}

@media screen and (max-width: 1000px) {
  .card {
    width: 100%;
  }
}

@media screen and (max-width: 620px) {
  .container {
    width: 100%;
  }
  .button3{
    margin-top: -35px;
    margin-left: -29px;
  }

  .heading {
    padding: 20px;
    font-size: 27px;
    margin-bottom:-12px;
  }

  .card {
    width: 88%;
  }
  
}

.card-body .btn:hover,.button3:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.button3{
  background-color: #8085e1; 
  border: none;
  color: white;
  font-weight: bold;
  padding: 15px 32px;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  margin-bottom: 10px;
}
.right-check{
  padding-right: 5px;
  color: #20c997;
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
<?php
  
    if($flag==1){ 
      #echo "<br > THIS IS JEE THIS IS JEE THIS IS JEE THIS IS JEE THIS IS JEE $id<br>";
      //$flag=1;
    ?>
<main class="s-layout__content" id="oo">
  <div class="container">
    <div class="heading">
      <h4 style="color: #8085e1;margin-left: -44px;">LESSONS</h4>
    </div>
    <div class="row">
      <?php 
        // $category=$_GET['category'];
        $_SESSION['package_tag']=array();
        $_SESSION['rup_tag']=array();
        $product_array=mysqli_query($con,"SELECT * FROM `cartforjee` ORDER BY id ASC ");
        while($row=mysqli_fetch_assoc($product_array)){?>
      
      <div class=" col-lg-6 col-md-6">
    
      <div class="card">
        <div class="card-header">
          <h1><?php echo $row['package_name']; ?></h1>
        </div>
        <div class="card-body">
          <h2><b>₹ <span><?php echo $row['rupees']; ?></span>/<small>mo</small></b></h2> 
              <ul style="list-style: none;padding-left: 0px;">
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em>Recorded Screen Sharing sessions</em></p> 
                </li>
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em><?php  echo $row['audio_session'];?></em>
                </li>
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em><?php  echo $row['video_session'];?></em></p> 
                </li>
              </ul>
               <br><?php $_SESSION['package_tag'][]=$row['package_name']?>
               <?php $_SESSION['rup_tag'][]=$row['rupees']?>
              <button class="btn">
              <a href="cart.php?packid=<?php echo $row["id"];?>&pack=<?php echo $id ?>">Add to cart</a></button>
          
        </div><!--card-body-->
      </div><!--card-->
      
    </div><?php 
  }
}?>
<?php 
  if($flag ==1){
  ?>
  </div><!--col-md-6-->
</div>
<center><a href="cart.php"><button class="button3">View cart >></button></a></center>
</div>
</main>
</div>

<!--content for neet -->
<?php
  
  }elseif($flag==2){ 
      #echo "<br > THIS IS JEE THIS IS JEE THIS IS JEE THIS IS JEE THIS IS JEE $id<br>";
      //$flag=2;
    ?>
<main class="s-layout__content" id="oo">
  <div class="container">
    <div class="heading">
      <h4 style="color: #8085e1;margin-left: -44px;">LESSONS</h4>
    </div>
    <div class="row">
    
      <?php 
        // $category=$_GET['category'];
        $_SESSION['package_tag']=array();
        $_SESSION['rup_tag']=array();
        $product_array=mysqli_query($con,"SELECT * FROM `cartforneet` ORDER BY id ASC ");
        while($row=mysqli_fetch_assoc($product_array)){?>
      <div class=" col-lg-6 col-md-6">
    
      <div class="card">
        <div class="card-header">
          <h1><?php echo $row['package_name']; ?></h1>
        </div>
        <div class="card-body">
          <h2><b>₹ <span><?php echo $row['rupees']; ?></span>/<small>mo</small></b></h2> 
              <ul style="list-style: none;padding-left: 0px;">
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em>Recorded Screen Sharing sessions</em></p> 
                </li>
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em><?php  echo $row['audio_session'];?></em>
                </li>
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em><?php  echo $row['video_session'];?></em></p> 
                </li>
              </ul>
               <br><?php $_SESSION['package_tag'][]=$row['package_name']?>
               <?php $_SESSION['rup_tag'][]=$row['rupees']?>
              <button class="btn">
              <a href="cart.php?packid=<?php echo $row["id"];?>&pack=<?php echo $id ?>">Add to cart</a></button>
          
        </div><!--card-body-->
      </div><!--card-->
    
    </div><?php 
  }
}?><?php 
  if($flag ==2){
?>
  </div><!--col-md-6-->
</div>
<center><a href="cart.php"><button class="button3">View cart >></button></a></center>
</div>
</main>
</div>
<?php
  
  }elseif($id=="BOARDS"){ 
      #echo "<br > THIS IS JEE THIS IS JEE THIS IS JEE THIS IS JEE THIS IS JEE $id<br>";
      $flag=3;
    ?>
<main class="s-layout__content" id="oo">
  <div class="container">
    <div class="heading">
      <h4 style="color: #8085e1;margin-left: -44px;">LESSONS</h4>
    </div>
    <div class="row">
      <?php 
        // $category=$_GET['category'];
        $_SESSION['package_tag']=array();
        $_SESSION['rup_tag']=array();
        $product_array=mysqli_query($con,"SELECT * FROM `cartforcet` WHERE `class`='$cls' "); //ORDER BY id ASC
        while($row=mysqli_fetch_assoc($product_array)){?>

      <div class=" col-lg-6 col-md-6">
      <form action="cart.php" method="post">   
      <div class="card">
        <div class="card-header">
          <h1><?php echo $row['package_name']; ?></h1>
        </div>
        <div class="card-body">
          <h2><b>₹ <span><?php echo  $row['rupees']; ?></span>/<small>mo</small></b></h2> 
              <ul style="list-style: none;padding-left: 0px;">
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em>Recorded Screen Sharing sessions</em></p> 
                </li>
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em><?php  echo $row['audio_session'];?></em>
                </li>
                <li>
                  <i class="fa fa-check right-check" aria-hidden="true"></i><em><?php  echo $row['video_session'];?></em></p> 
                </li>
              </ul>
               <br>
              <button class="btn"><?php $_SESSION['package_tag'][]=$row['package_name']?>
               <?php $_SESSION['rup_tag'][]=$row['rupees']?>
              <a href="cart.php?packid=<?php echo $row["id"];?>&pack=<?php echo $id ?>">Add to cart</a></button>
          <form>
        </div><!--card-body-->
      </div><!--card-->
       
    </div><?php 
  }
}?><?php 
  if($flag ==3){
?>
  </div><!--col-md-6-->
</div>
<center><a href="cart.php"><button class="button3">View cart >></button></a></center>
</div>
</main>
</div>
<?php
  }
?>