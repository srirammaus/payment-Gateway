<?php
session_start() //THis page is dummy register page!
;?>
<html>
<head>
    <title>Register</title><link rel="icon" href="logotrans.png" type="image/icon">
    <link rel="shortcut icon" href="#" />
<meta name="theme-color" content="#8085e1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>


        body{
            background-color:#8085e1;
        }
.container{
padding: 60px 80px;
background-color: white;
margin: auto;
text-align: center;
background-color:#8085e1;
}

.wrap{  
position: relative;
width: 150px;
height: 150px;
margin: 20px auto 30px auto;
&:last-child {
margin-bottom: 0;
}
}

.clicker{
background-color: white;
outline: none;  
font-weight: 600;
  position:absolute;
cursor: pointer;
padding: 0;
  border: none;
  height: 150px;
  width: 150px;
left: 8px;
top: 8px;
  border-radius: 100px;
  z-index: 2;
}



.circle{
  position: relative;
border-radius:10px;
  width: 167PX;
  height: 160px;
  z-index: 1;
}



    </style>
</head>
<body>
   
<div class="container">

<div class="wrap">	
<button class="clicker" style="color: #8085e1" onclick="location.href = 'register4';">STUDENT</button>
<div class="circle angled"></div>
</div>
</div>
    <div class="container">
<div class="wrap">	
  <button class="clicker" style="color:#8085e1" onclick="location.href = 'login';">TEACHER</BUTTON>
<div class="circle angled"></div>
</div>
</div>
</body>
</html>
