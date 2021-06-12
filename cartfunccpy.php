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

}
function cartsys($username,$pack_name,$rup){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    $result1=mysqli_query($con,"SELECT * FROM carts WHERE `username`='$username'");
    $flag="";
    while($rop2=mysqli_fetch_assoc($result1)){
        if(in_array($pack_name,$rop2)){
            $flag=-1;
        }elseif (!in_array($pack_name,$rop2)){
            $flag=1;
        }
    }
    if($flag==-1){
        header("location:carttt.php");
    }elseif($flag==1){
        $result=mysqli_query($con,"INSERT INTO `carts`(`username`, `Packs`,`rup`) VALUES ('$username','$pack_name','$rup')");
        header("location: carttt.php");
    }

    
}  --------------------------------------------------------------------*/
function cartsys($username,$pack_name,$rup){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    $result=mysqli_query($con,"INSERT INTO `carts`(`username`, `Packs`,`rup`) VALUES ('$username','$pack_name','$rup')");
    $result1=mysqli_query($con,"ALTER IGNORE TABLE carts
                                    ADD UNIQUE INDEX idx_name (username,Packs, rup)");
    header("location:carttt.php");
}
/*
<?php

#INSERT INTO `test`.`carts`(`username`, `Packs`) VALUES ('username taken by session Manaagement','');
these function contains deleting duplicates also
-----------------------------------------------------------------------------------------------------
function cartsys($username,$pack_name,$rup){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    $result1=mysqli_query($con,"SELECT * FROM carts WHERE `username`='$username'");
    $rop2=mysqli_fetch_assoc($result1);
    $pck_chk=array();
    array_push($pck_chk,$pack_name);
    foreach ($pck_chk as $value){
        if(!in_array($value,$rop2)){
            $flag=1;
        }elseif (in_array($value,$rop2)==1){
            $flag=-1;
        }
    }
    if($flag==1){
        $result=mysqli_query($con,"INSERT INTO `carts`(`username`, `Packs`,`rup`) VALUES ('$username','$pack_name','$rup')");
        header("location:carttt.php");
    }elseif($flag==-1){
        header("location: carttt.php");
    }

    
}  
---------------------------------------------------------------------------------------------------------------
function cartsys($username,$pack_name,$rup){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    $result1=mysqli_query($con,"SELECT * FROM carts WHERE `username`='$username'");
    $rop2=mysqli_fetch_assoc($result1);
    if(!in_array($pack_name,$rop2)==1){
        $result=mysqli_query($con,"INSERT INTO `carts`(`username`, `Packs`,`rup`) VALUES ('$username','$pack_name','$rup')");
        header("location:carttt.php");
    }elseif (in_array($pack_name,$rop2)==1){
        header("location: carttt.php");
    }
    
}  ---------------------------------------------------------------------------------------------------------------


    if(!in_array($pack_name,$rop2)){
        $flag=1;
    }elseif (in_array($pack_name,$rop2)==1){
        $flag=-1;
    }
    if($flag==1){
        $result=mysqli_query($con,"INSERT INTO `carts`(`username`, `Packs`,`rup`) VALUES ('$username','$pack_name','$rup')");
        header("location:carttt.php");
    }elseif($flag==-1){
        header("location: carttt.php");
    }------------------------------------------------------------------------------------------------

function del($username,$pack_name,$rup){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    $del_dup=mysqli_query($con,"SELECT 
            contact_id, 
            first_name, 
            last_name, 
            email, 
            ROW_NUMBER() OVER (
                PARTITION BY 
                    $username,
                    $pack_name,
                    $rup
                
                ORDER BY 
                    $username,
                    $pack_name,
                    $rup
            ) row_num
        FROM 
            test1.carts
    )
    DELETE FROM cte
    WHERE row_num > 1;" );
}
/*-------dont use
function fetching($username){
    $con = mysqli_connect("localhost", "root", " ", "test1") or  die("connection failed".mysqli_errno($con));
    global $result=mysqli_query($con,"SELECT * FROM carts WHERE `username`='$username'");
    
}

*/
# $rop=mysqli_fetch_assoc($result);
# echo $rop['Packs'];
?>