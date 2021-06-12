<?php
session_start();
$con_1=mysqli_connect("localhost", "root", "") or  die("connection failed".mysqli_errno($con_1));
$flag="";
if(isset($_SESSION['send_check_pack']) && isset($_SESSION['sess_user']) && isset($_SESSION['send_check_rup']) && isset($_SESSION['sb']) && isset($_SESSION['trans'])){
    $flag=1;
    $packages= implode(', ', $_SESSION['send_check_pack']);//dont delete anything here;
    $user=$_SESSION['sess_user'];
}elseif(!isset($_SESSION['send_check_pack']) && !isset($_SESSION['send_check_rup']) && !isset($_SESSION['sb']) && !isset($_SESSION['trans']) && !isset($_SESSION['sess_user'])){
    $flag=-1;
}else {
    header('Refresh: 5; URL=http://deb.local/E-com2/packages.php');
    die();
}
include('trans.php');
if($flag==1){
    add($user,$packages);
    $query="SELECT `trans_id` FROM prod.transfer WHERE `username`='$user' AND `packages`='$packages' ORDER BY id DESC LIMIT 1"; //insted we can also use while here
    $resultt=mysqli_query($con_1,$query);
    if(mysqli_num_rows($resultt) > 0){
        $row=mysqli_fetch_assoc($resultt);
        $txnid=$row['trans_id'];
    }
}
if($flag==1){
    $List = implode(' ', $_SESSION['send_check_pack']);
    if(strlen($List)>40){
        $List1="take there";
    }else{
        $List1=$List;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <!-- style css -->
    <link rel="stylesheet" href="Style.css">

<style type="text/css">
  body {
    font-family: sans-serif;;
    font-size: 17px;
    padding: 8px;
    /*color: #fff;*/
    background: #8085e1;
  }
  h2{
    text-align:left;
    color: white;
    padding-left: 20px;
    }

* {
    box-sizing: border-box;
  }

  .error {
    color: red;
    border-color: red;
  }
.row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -10px;
}

.col-30 {
    -ms-flex: 30%; /* IE10 */
    flex: 30%;
    /*background: #8085e1;*/
}

.col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
}
.col-70 {
    -ms-flex: 70%; /* IE10 */
    flex: 70%;
}
.col-30,.col-50,.col-70 {
    padding: 0 20px;
}
.container1 {
    background-color: #FFFFFF;
    padding: 13px 120px 13px 120px;
    border: 1px solid lightgrey;
    border-radius: 3px;
    box-shadow: 0 0 2rem 0 rgba(168, 180, 194, 0.37);
}
.container2 {
    background-color: #FFFFFF;
    padding: 3px 18px 13px 18px;
    border: 1px solid lightgrey;
    border-radius: 3px;
    box-shadow: 0 0 2rem 0 rgba(168, 180, 194, 0.37);
}

input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid rgb(130, 26, 26);
    border-radius: 1px;
}
input[type=number] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid rgb(130, 26, 26);
    border-radius: 1px;
    
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
label {
    margin-bottom: 10px;
    display: block;
}

.icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
}

.btn {
    background-color: #01BAEF;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 38%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
    box-shadow: 0 0 1rem 0 rgba(99, 123, 150, 0.329);
    font-weight: bold;
}

.btn:hover {
    background-color: #0CBABA;
}

a {
    color: #2196F3;
}

hr {
    border: 1px solid lightgrey;
}

span.price {
    float: right;
    color: grey;
}


@media (max-width: 800px) {
    .row {
        flex-direction: column-reverse;
    }
    .col-30 {
        margin-bottom: 20px;
    }
    .container1{
      padding: 3px 18px 13px 18px;
    }
    .btn{
      width: 80%;
    }
}


</style>
</head>
<body>

  <h2>Checkout</h2>
  <div class="row">
      <div class="col-70">
          <div class="container1"><?php if($flag==1){ ?>
                    <form id="validate" action="pay__/easebuzz.php?api_name=initiate_payment" class="form-style" method="post">
                        <h3>Billing Address</h3>
                        <input type="hidden" id="txnid" name="txnid" value="<?php echo "$txnid";?>" >
                        <input id="amount" type="hidden" name="amount" value="<?php $ii=$_SESSION['trans'];
                         $io=number_format((float)$ii, 2, '.', '');
                         if($io !=number_format((float)$ii, 2, '.', '')){
                             header("location:checkout.php");
                         }else {
                            echo "$io";
                         }
                         ?>">
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Soeng Souy" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="you@gmail.com " required>
                        <label for="email"><i class="fa fa-envelope"></i> Phone</label>
                        <input type="number" id="phone" name="phone" placeholder="+9190000xxxxx" required>
                        <!--<label for="productinfo">Product Information<sup>*</sup></label>-->
                        <input type="hidden" id="productinfo" name="productinfo" value="<?php
                         echo "$List1";
                         ?>" placeholder='Enter Your Packages List i.e:"premium packages jee-1,premium packages neet-2" ' required >
                        <input type="hidden" id="surl" class="surl" name="surl" value="http://deb.local/E-com2/pay__/t_status.php" >
                        <input type="hidden" id="furl" class="furl" name="furl" value="http://deb.local/E-com2/pay__/t_status.php" >
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="110 W. 15th Phnom Penh" required>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Phnom Penh" required>

                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="Phnom Penh"required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zipcode" placeholder="12000"required>
                            </div>
                        </div>
                        <center><input type="submit" name="sbt" value="Continue to checkout" class="btn"></center>
                    </form><?php }else{
                        ?><p><span >Your Will be Redirected to  Packages Page Within 5 Seconds..</span></p><?php }?>
          </div>
      </div>
      <div class="col-30">
          <div class="container2">
          <?php 
            if($flag==1){
                $cpt=count($_SESSION['send_check_pack']);?>
            <h3>Your cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $cpt ?></b></span></h3>
            <?php
        }else{?>
        <h3>Your cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h3>
        <?php
        }?>
            <hr>
            <?php 
            if($flag==1){
                $cpt=count($_SESSION['send_check_pack']);
                $cptt=count($_SESSION['send_check_rup']);
                $sbb=$_SESSION['sb'];
                $trans=$_SESSION['trans'];
                for($i=0;$i<$cpt&&$cptt;$i++){
            ?>
                <p><?php echo $_SESSION['send_check_pack']["$i"];?> <span class="price">₹ <?php echo $_SESSION['send_check_rup']["$i"]; ?></span></p>
            <?php
                }
            ?>
            <p>Subtotal <span class="price">₹ <?php echo $sbb; ?></span></p>
            <p>GST <span class="price">18 %</span></p>
            <hr>
            <p><b>Total <span class="price" style="color:black">₹ <?php echo "$trans"; ?></span></b></p>
            <?php
            }else{
            ?>
            <p><span class="price">Your Session Was Expired! please click below to go back to cart page</span></p>

            <?php
            }?>
            <center><a href="carttt.php"><input type="submit" value="Back to cart" class="btn"></a></center>
        </div>
      </div>
  </div>


  <script>
    $('#validate').validate({
        roles: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zip: {
                required: true,
            },
            
        },
        messages: {
            fullname:"Please input full name*",
            email:"Please input email*",
            city:"Please input city*",
            address:"Please input address*",
            state:"Please input state*",
            zip:"Please input address*",
        },
    });
</script>

<script type="text/javascript">


</script>

</body>
</html>