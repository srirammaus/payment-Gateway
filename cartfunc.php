<?php

#INSERT INTO `test`.`carts`(`username`, `Packs`) VALUES ('username taken by session Manaagement','');
/*these function contains deleting duplicates also
----------------------------------------------------------------------------------------------------------------------------------------
function empty_user_db($username){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    $result1=mysqli_query($con,"SELECT * FROM carts ");
    $flag="";
    while($rop2=mysqli_fetch_array($result1)){
        if(in_array($username,$rop2)){
           echo "";
        }elseif (!in_array($username,$rop2)){
            $result=mysqli_query($con,"INSERT INTO `carts`(`username`) VALUES ('$username')");
        }else{
            $result=mysqli_query($con,"INSERT INTO `carts`(`username`) VALUES ('$username')");
        }
    }


}  --------------------------------------------------------------------*/
function cartsys($username,$pack_name,$rup){
    $con = mysqli_connect("localhost", "root", "", "test1") or  die("connection failed".mysqli_errno($con));
    $result=mysqli_query($con,"INSERT INTO `carts`(`username`, `Packs`,`rup`) VALUES ('$username','$pack_name','$rup')");
    $result1=mysqli_query($con,"ALTER IGNORE TABLE carts
                                    ADD UNIQUE INDEX idx_name (username,Packs, rup)");
    header("location:cart.php");
}

?>