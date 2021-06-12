<?php
function p_check($username){
    global $user_msq,$changer;
    $con = mysqli_connect("localhost", "root", "", "trans_details") or  die("connection failed".mysqli_errno($con));
    $query="SELECT * FROM `trans_details`.`trans_` WHERE `username`='$username' AND `status`='success'";
    $result=mysqli_query($con,$query);
    $p_arr=array();
    
    if (mysqli_num_rows($result) > 0) {
        $changer=1;
        while($row=mysqli_fetch_assoc($result)){
            $package=$row['productinfo'];
            //$user_msq=$row['username'];
            $p_arr[]=$package;
        }
    }else{
        $changer=-1;
    }
    
    return $p_arr;
}
?>