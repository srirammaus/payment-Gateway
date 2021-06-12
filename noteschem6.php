<?php
session_start();
if(!isset($_SESSION['username'])){
   header("location: login.php");
   die();
}
$user=$_SESSION['username'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Chemistry 6</title>
        <link rel="icon" href="logotrans.png" type="image/icon">
        <link rel="shortcut icon" href="#" />
    <meta name="theme-color" content="#8085e1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    
*, *::before, *::after {
   box-sizing: border-box;
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
/* Mobile First */
@media (min-width: 42em) {
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
@media (max-width: 600px) {
#oo{margin-left:15%;
}  }
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

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #8085e1;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
}

#myUL li a:hover:not(.header) {
  background-color: white;
  color:#8085e1;
}
</style>
</head>
<body>

    <div class="s-layout">
<!-- Sidebar -->
<div class="s-layout__sidebar">
  <a class="s-sidebar__trigger" href="#0">
     <i class="fa fa-bars"></i>
  </a>

  <nav class="s-sidebar__nav">
      <ul>
        
        <li>
           <a class="s-sidebar__nav-link" href="subject7" >
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
              <i class="fa fa-pencil-square-o"></i><em>Packages</em>
           </a>
        </li>
        <li>
           <a class="s-sidebar__nav-link" href="mocks.php">
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

<main class="s-layout__content" id="oo" style="margin-top:100px; align-items: center">
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Notes" title="Type in a name">

<ul id="myUL"> 
  <li><a href="jj.php?data=cone.pdf&data2=Math">math</a></li>
  <li><a href="jj.php?data=preview.pdf&data2=Chem">chem</a></li>

  <li><a href="jj.php?data=Data1&data2=Data120">class9</a></li>
  <li><a href="jj.php?data=Data1&data2=Data120">class12</a></li>
   <?php
   include_once 'package_checker.php';
   $obj=p_check($user);
   $ct=count($obj); // We can also use while loop here and print actual names present in all packages!!!! 
   if($changer==1){
   ?>
      <li><a href="jj.php?data=Data1&data2=Data120">abc</a></li> 
      <li><a href="jj.php?data=Data1&data2=Data120">xyz</a></li>
      <li><a href="jj.php?data=Data1&data2=Data120">jee</a></li>
   <?php
   }else{
   ?>
   <li><a href="packages.php">To access New Contents ! buy our products<a></li>
   <?php
   }?>
</ul>

</main>
</div>


<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
    </body>
</html>
