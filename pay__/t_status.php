<?php
include 'transaction_status.php';

$id=$_SESSION["tx"];
$con = mysqli_connect("localhost", "root", "", "prod") or  die("connection failed".mysqli_errno($con));
$query="SELECT `username` FROM `prod`.`transfer` WHERE `trans_id`='$id' ";
$user_=mysqli_query($con,$query);
if (mysqli_num_rows($user_) > 0) {
  while($row=mysqli_fetch_assoc($user_)){
    $r_user=$row['username'];
  }
}
$con2= mysqli_connect("localhost", "root", "", "prod") or  die("connection failed".mysqli_errno($con2));
$query2="SELECT `packages` FROM prod.transfer WHERE `username`='$r_user' AND `trans_id`='$id' ";
$pack_=mysqli_query($con2,$query2);
if (mysqli_num_rows($pack_) > 0) {
  while($row2=mysqli_fetch_assoc($pack_)){
    $r_pack=$row2['packages'];
    
  }
}

?>
<html>
  <?php
  if($j_d['status'] ==1){
    $check_1= $j_d['status'];
    $obj=$j_d['data']['status'];?>
  <head>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #8085e1;
      }
        h1 {
          color: #3DC480;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          /*font-weight: 900;*/
          font-size: 35px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        /*line-height: 200px;*/
        margin-left:-26px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        width:40%;
      }


      /*.content {
		  font-family: 'Helvetica Neue';
		  display: flex;
		  flex-flow: column nowrap;
		  justify-content: center;
		  align-items: center;
		  font-size: 30px;
		}*/
		/*.symbol {
		  font-size: 120px;
		  color: #3DC480;
		}*/
		.btn {
		  display: block;
		  color: #fff;
		  text-align: center;
		  background: #8085e1;
		  margin-top: 30px;
		  text-decoration: none;
		  padding: 10px 26px;
		  border-radius: 25px;
		  font-weight: bold;
		  font-family: sans-serif;
		  font-size: 22px;
		  width: 40%;
		}
		.btn:hover {
		  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		}
		.closemark{
			margin-left: 0px;
			color: #f44336;
			font-weight: bold;
			font-size: 130px;
		}
		@media screen and (max-width: 768px) {
		  .card {
		    width: 80%;
		  }
		}

    </style>
    <body>
      <?php 
      if($obj=="success"){ ?>
      <div class="card">
      <div style="border-radius:200px; height:140px; width:140px; background: #e6eadf; margin:0 auto;">
        <i class="checkmark" style="color: #3DC480;">✓</i>
      </div>
      <!-- <div class='content'>
  		<div class='fa fa-check-circle-o symbol'>
  	  </div> -->
        <h1>Order Successfully Placed!</h1> 
        <p>We received your purchase request<br/> we'll be in touch shortly!</p>
        <center><a href="../packages.php" class="btn">Continue</a></center>
      </div>
    <?Php } elseif($obj=="failure") {?>

      <div class="card">
      <div style="border-radius:200px; height:140px; width:140px; background: #e6eadf; margin:0 auto;">
        <i class="closemark">×</i>
      </div>
        <h1 style="color: #f44336;">Transaction Failed!</h1> 
        <p>Something went wrong with your Transaction;<br/> Please check your network connection and try again!</p>
        <center><a href="../packages.php" class="btn">Continue</a></center>
      </div>
    <?php }elseif($obj=="userCancelled"){?>

      <br>
      <div class="card">
      <div style="border-radius:200px; height:140px; width:140px; background: #e6eadf; margin:0 auto;">
        <i class="closemark">×</i>
      </div>
        <h1 style="color: #f44336;">Transaction Cancelled!</h1> 
        <p>Your order has been cancelled;<br/> if you think it is mistake, please contact us immediately!</p>
        <center><a href="../packages.php" class="btn">Continue</a></center>
      </div>
      <?php }else{?>
        <h1 style="color: #f44336;">Something went Wrong , please Contact us immediately</h1>
    <?php 
    header('Refresh: 4; URL=http://deb.local/E-com2/packages.php');
    }?>
    </body>
  <?php
    }else{
    header('Refresh: 2; URL=http://deb.local/E-com2/packages.php');
  }?>
</html>
<?php 
include 't_detail.php';
?>