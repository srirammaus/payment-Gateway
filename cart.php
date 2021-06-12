<?php
include 'cartfunc.php';
session_start();
$con = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con));
$packid="";
$flag="";
if(!isset($_SESSION['sess_user'])){
  header("location: login.php");
  die();
}
$username=$_SESSION['sess_user'];
if(isset($_SESSION['package_tag']) || isset($_SESSION['rup_tag'])){
  if(isset($_GET['packid'])){
    $packid=$_GET['packid'];
    $pack="";
    if(isset($_GET['pack'])){
      if($_GET['pack']=="JEE" || $_GET['pack']=="NEET"){
        $pack=$_GET['pack'];
        $pack_name= $_SESSION['package_tag'][$packid];
        $rup= $_SESSION['rup_tag'][$packid];
        cartsys($username,$pack_name,$rup);
      }elseif($_GET['pack']=="BOARDS"){
        $pack=$_GET['pack'];
        $pack_name= $_SESSION['package_tag']['0'];
        $rup= $_SESSION['rup_tag']['0'];
        cartsys($username,$pack_name,$rup);
      }
    }
  }
}elseif(!isset($_SESSION['package_tag']) || !isset($_SESSION['rup_tag'])){
  header("location:packages.php");
}
$del_pacs="";
if(isset($_GET['del'])){
  $del_pacs=$_GET['del'];
  $query="DELETE FROM carts WHERE `username`='$username'AND `Packs`='$del_pacs'" ;
  $result2=mysqli_query($con,$query);
  header("location: cart.php");

}
?>

<html>
  <head>
      
  <meta charset="UTF-8">
  <link rel="icon" href="logotrans.png" type="image/icon">
        <link rel="shortcut icon" href="#" />
 <!--  <link rel="stylesheet" type="text/css" href="cart.css"> -->

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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


@import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.container{
  max-width: auto;
  margin: 0 auto;
}
.container > h1{
  padding-top: 80px;
  padding-bottom: 30px;
  /*padding-left: 50px;*/
}
.cart{
  display: flex;
  width: 180%;
}

.products{
  flex: 0.70;
}

.product{
  display: flex;
  width: 100%;
  overflow: hidden;
  border: 1px solid silver;
  margin-bottom: 20px;
}

.product:hover{
  border: none;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.2);
  transform: scale(1.01);
}

.product > img{
  width: 300px;
  height: 200px;
  object-fit: cover;
}

.product > img:hover{
  transform: scale(1.04);
}

.product-info{
  padding: 20px;
  width: 100%;
  position: relative;
}

.product-name, .product-price, .product-offer{
  margin-bottom: 20px;
}

.product-remove{
  position: absolute;
  bottom: 20px;
  right: 20px;
  padding: 10px 25px;
  background-color: green;
  color: white;
  cursor: pointer;
  border-radius: 5px;
}

.product-remove:hover{
  background-color: white;
  color: green;
  font-weight: 600;
  border: 1px solid green;
}

.product-quantity > input{
  width: 40px;
  padding: 5px;
  text-align: center;
}

.fa{
  margin-right: 5px;
}

.cart-total{
  flex: 0.30;
  margin-left: 20px;
  padding: 20px;
  height: 370px;
  border: 1px solid silver;
  border-radius: 5px;
  background-color: #f4f7f7;
}

.cart-total p{
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
  font-size: 20px;
}

.cart-total a{
  display: block;
  text-align: center;
  height: 40px;
  line-height: 40px;
  background-color: tomato;
  color: white;
  text-decoration: none;
}

.cart-total a:hover{
  background-color: red;
}

@media screen and (max-width: 700px){
  .remove{
    display: none;
  }

  .product{
    height: 150px;
  }

  .product > img{
    height: 150px;
    width: 200px;
  }

  .product-name, .product-price, .product-offer{
    margin-bottom: 10px;
  }

}

@media screen and (max-width: 900px){
  .cart{
    flex-direction: column;
  }

  .cart-total{
    margin-left: 0;
    margin-bottom: 20px;
  }

}

@media screen and (max-width: 1220px){
  .container{
    max-width: 100%;
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

<main class="s-layout__content" id="oo">
  <div class="container">

  <h1 style="color: #8085e1;">Shopping Cart</h1>
  <div class="cart">
    <div class="products">
      <?php
        $_SESSION['send_check_pack']=array();
        $_SESSION['send_check_rup']=array();
        $subtotal=array();
        $pack_count=array();
        $flag_1="";
        $result=mysqli_query($con,"SELECT * FROM carts WHERE `username`='$username'");
        while($rop=mysqli_fetch_assoc($result)){
          $flag_1=1;
          if(!empty($rop['rup']) && !empty($rop['Packs'])){?>
      <div class="product">
        <div class="product-info">
          <h3 class="product-name"><?php if(!in_array($rop['Packs'],$_SESSION['send_check_pack'])){
            $_SESSION['send_check_pack'][]=$rop['Packs'];
          }
                                  array_push($pack_count,$rop['Packs']);
                                  echo $rop['Packs'] ;?></h3>
          <h4 class="product-price">₹ <?php $_SESSION['send_check_rup'][]=$rop['rup'];
                                  array_push($subtotal,$rop['rup']);
                                  echo $rop['rup']  ;?></h4>
          <p class="product-remove">
            <i class="fa fa-trash" aria-hidden="true"></i>
            <span class="remove"><a href="cart.php?del=<?php echo $rop['Packs'];?>">Remove</a></span>
          </p>
        </div>
      </div><?php
          }
        }?>
    

    </div>
        <?php if($flag_1==1){?>
    <div class="cart-total">
      <div>
        <h3>Order Summary</h3>
      </div>
    
    <br><hr><br>
      <p>
        <span>Subtotal</span>
        <span>₹ <?php $sb=array_sum($subtotal);
                    $_SESSION['sb']=$sb;
                    echo "$sb";?></span>
      </p>
      <p>
        <span>GST</span>
        <span>₹ 18%</span>
      </p>
      <p>
        <span>Number of Items</span>
        <span><?php $ct=count($pack_count);
                    echo "$ct"; ?></span>
      </p>
      <hr><br>
      <p>
        <span><b>Total</b></span>
        <span><b>₹ <?php include 'gst.php';
                  gst($sb);
                  echo $tot;
                  $_SESSION['trans']=$tot; ?></b></span>
      </p>
      <a href="checkout.php">Proceed to Checkout</a>
    </div>
    <?php
        }else{
          echo '<h2 class="product-name">Please Select Packages From packages To Cart !</h2>';
        }?>
  </div>
</div>
  
</main>
</div>

      <script type="text/javascript">
    document.cookie = "abc =<?php $user ?>";
</script>

  </body>
    </html>