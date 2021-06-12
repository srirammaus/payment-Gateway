<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location: login.php");
  die();
}
$user=$_SESSION['username'];
?>
<html>
    <head><link rel="icon" href="logotrans.png" type="image/icon">
        <link rel="shortcut icon" href="#" />
    <meta name="theme-color" content="#8085e1">
        <title>
            Subject
        </title>
        <style>
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
  background-color:#8085e1;
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
  background-color: var(--colour-white);
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
  <div class="links">
  <ul class="links__list" style="--item-total:3">
    <li class="links__item" style="--item-count:1">
      <a class="links__link" href="#">
        <div class="links__icon" >
            <h2 style="color:#8085e1">BIO</h2>  </div></a>
    </li>
    <li class="links__item" style="--item-count:2">
      <a class="links__link" href="#">
           <div class="links__icon" >
            <h2 style="color:#8085e1">MATH</h2>  </div></a>
    </li>
    <li class="links__item" style="--item-count:3">
      <a class="links__link" href="noteschem6.php">
         <div class="links__icon" >
            <h2 style="color:#8085e1">Chem</h2>  </div></a>
    </li>

  </ul>
</div>
</body>
</html>