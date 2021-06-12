<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con));

//dummy profile page!
//  $sql =  "SELECT * FROM more WHERE user='".$_SESSION['sess_user']."'";
// $result = $con->query($sql);

// while($row = $result->fetch_assoc())  {
//     $fullname = $row['full'];
//     $user = $row['user'];
//     $dob = $row['dob'];
//     $contact = $row['con'];
//     $class = $row['class'];
//     $school = $row['school'];
    
// }

?>

<html>
  <head>
      
  <meta charset="UTF-8">
  <link rel="icon" href="logotrans.png" type="image/icon">
        <link rel="shortcut icon" href="#" />
    <meta name="theme-color" content="#8085e1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile</title>
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
      margin-left: 37em;
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
      </style>
  </head>
  <body>
      <?php
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
       $_SESSION['aa']=$aa;   ?>
         
      
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
           <a class="s-sidebar__nav-link active" href="#" style="bottom:0;">
              <i class="fa fa-user"></i><em>Profile</em>
           </a>
        </li>
     </ul>
  </nav>
</div>

<!-- Content -->

<main class="s-layout__content" id="oo">
    <div style="margin-top:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="boyhat.png" alt="Avatar" style="width:150px;">
    </div><?php echo ($fullname); ?>
            <br>
            <h1 style="margin-top:30px;color:#8085e1">Personal Details</h1>
 

    <ul style="list-style-type:none; font-size: 15px">
         <li>
           <a  href="#0" style="bottom:0;">
               <i class="fa fa-envelope" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;<?php echo ($user); ?></em>
           </a>
        </li>
        <li>
           <a  href="#0" style="bottom:0;">
              <i class="fa fa-calendar" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;<?php echo ($dob); ?></em>
           </a>
        </li>
        <li>
           <a href="#0" style="bottom:0;">
              <i class="fa fa-phone" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;<?php echo ($contact); ?></em>
           </a>
        </li>
        <li>
     <a href="#0" style="bottom:0;">
              <i class="fa fa-address-card" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;<?php echo ($class); ?></em>
           </a>
        </li>
                <li>
           <a href="#0" style="bottom:0;">
              <i class="fa fa-graduation-cap " style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;<?php echo ($school); ?></em>
           </a>
        </li>
    </ul>
           
            <h1 style="margin-top:30px;color:#8085e1">Support details</h1>
 

    <ul style="list-style-type:none;">
         <li>
           <a  href="#0" style="bottom:0;">
              <i class="fa fa-envelope" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;topperformula.edu@gmail.com</em>
           </a>
        </li>
       
        <li>
           <a href="#0" style="bottom:0;">
              <i class="fa fa-phone" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;+91 9818904918</em>
           </a>
        </li>

    </ul>


            <h1 style="margin-top:30px;color:#8085e1">Account</h1>
            <ul style="list-style-type:none;">
                <li><a  href="logout.php" style="bottom:0;">
              <i class="fa fa-sign-out" style=" color:#8085e1"></i><em>&nbsp;&nbsp;&nbsp;Log Out</em>
                    </a></li></ul>
</main>
</div>
      <script type="text/javascript">
    document.cookie = "abc =<?php $user ?>";
</script>
  
  </body>
    </html>