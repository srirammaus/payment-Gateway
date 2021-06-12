<?php

global $ses2,$ses3,$ses6,$ses1,$ses7,$ses5,$ses8,$ses10,$ses4,$ses11,$ses9;
$ses1=$_SESSION['st'];
$ses2=$_SESSION['em'];
$ses3=$_SESSION['d_p'];
$ses4=$_SESSION['f_name'];
$ses5=$_SESSION['amt'];
$ses6=$_SESSION['tx'];
$ses7=$_SESSION['p_info'];
$ses8=$_SESSION['h_sh'];
$ses9=$_SESSION['ph'];
$ses10=$_SESSION['net_amt_db'];
$ses11=$_SESSION['e_id'];
$ses12=$_SESSION['time'];
if($ses7==$r_pack){
    $flags=1;
}else{
    $flags=2;
}
if(!isset($ses1) || !isset($ses2) || !isset($ses3)|| !isset($ses4)|| !isset($ses5)|| !isset($ses6)|| !isset($ses7)|| !isset($ses8)|| !isset($ses9)|| !isset($ses10)|| !isset($ses11)){
    header("location: t_status.php");
}
if($flags==1){
    $con = mysqli_connect("localhost", "root", "", "trans_details") or  die("connection failed".mysqli_errno($con));
    $query="INSERT INTO `trans_details`.`trans_`(`email`, `Time`,`deduction_percentage`, `txnid`, `status`, `productinfo`,`amount`,`hash`,`net_amount_debit`,`firstname`,`easepayid`,`phone`,`username`) VALUES ('$ses2','$ses12','$ses3','$ses6','$ses1','$ses7','$ses5','$ses8','$ses10','$ses4','$ses11','$ses9','$r_user')";
    $result=mysqli_query($con,$query);
    $result1=mysqli_query($con,"ALTER IGNORE TABLE `trans_details`.`trans_`
                                        ADD UNIQUE INDEX idx_name ( `username`,`txnid`,`hash`,`status`,`easepayid`)");
}else{
    $con = mysqli_connect("localhost", "root", "", "trans_details") or  die("connection failed".mysqli_errno($con));
    $query="INSERT INTO `trans_details`.`trans_`(`email`, `Time`,`deduction_percentage`, `txnid`, `status`, `productinfo`,`amount`,`hash`,`net_amount_debit`,`firstname`,`easepayid`,`phone`,`username`) VALUES ('$ses2','$ses12','$ses3','$ses6','$ses1','$r_pack','$ses5','$ses8','$ses10','$ses4','$ses11','$ses9','$r_user')";
    $result=mysqli_query($con,$query);
    $result1=mysqli_query($con,"ALTER IGNORE TABLE `trans_details`.`trans_`
                                        ADD UNIQUE INDEX idx_name ( `username`,`txnid`,`hash`,`status`,`easepayid`)");
}

?>
