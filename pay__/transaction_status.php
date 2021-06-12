<?php 
include_once('easebuzz-lib/easebuzz_payment_gateway.php');
session_start();
global $j_d;
$SALT ="------"; // USE SALT HERE
//$con = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con));
$easebuzzObj = new Easebuzz($MERCHANT_KEY = null
    , $SALT, $ENV = null);
    
$result = $easebuzzObj->easebuzzResponse( $_POST );

$j_d=json_decode($result,true); //insted True

if($j_d['data'] == "Response params is empty."){
  header('Refresh: 1; URL=http://deb.local/E-com2/packages.php');
  $flag=1;
}
if($flag !=1){
  $_SESSION['st']=$j_d['data']["status"];
  $_SESSION['em']=$j_d['data']["email"];
  $_SESSION['d_p']=$j_d['data']["deduction_percentage"];
  $_SESSION['f_name']=$j_d['data']["firstname"];
  $_SESSION['amt']=$j_d['data']["amount"];
  $_SESSION['tx']=$j_d['data']["txnid"];
  $_SESSION['p_info']=$j_d['data']["productinfo"];
  $_SESSION['h_sh']=$j_d['data']["hash"];
  $_SESSION['ph']=$j_d['data']["phone"];
  $_SESSION['net_amt_db']=$j_d['data']["net_amount_debit"];
  $_SESSION['e_id']=$j_d['data']["easepayid"];
  $_SESSION['time']=$j_d['data']["addedon"];
}
?>



