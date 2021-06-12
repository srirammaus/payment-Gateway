<pre>
<?php
$salt="	AKJBKSDBKSDBFKDSBFKSDBFKBSFKDSDKBSDJKBFSDKJJKCKBDSKBJBSDKDBCJKDSB";
#$salt1="8965686498982434972467256384657256458696486464";
$hash_pass=Null;
$host_name="localhost";$user_name="root";
$password="";
$db_con=Null;

function id_conn(){
	global $host_name;
	global $user_name;
	global $password;
	global $db_con;
	global $db_name;
	$db_con=mysqli_connect($host_name,$user_name,$password);
	if ($db_con) {
		return $db_con;
	}else{
		return 0;	}
	}
/*
	function transid(){
		global $salt,$salt1;
		$num=rand(1000000,9997899);
		$num=md5(strrev(($num.$salt)));
		return md5(strrev($num.$salt1));
	}*/
function trans_id(){
	global $salt,$salt1;
	mt_srand((double)microtime()*10000);
	$charid = md5(uniqid(rand(), true));
	$cid=md5(strrev($charid.$salt));
	$c = unpack("C*",$cid);
	$c = implode("",$c);

	return substr($c,0,20);

}
function add($username,$packages){
	$conn=id_conn();
	if ($conn) {
		$id=trans_id();
		$check=dup_check($id,$username,$packages);
		//$flag=dup_check_1($username,$packages);
		
		if ($check) {
			apply_query($id,$username,$packages);
			
		}else{
			$id=mdf5($id.$salt1.$salt);
			apply_query($id,$username,$packages);
			
		}
		
		
	}
	else{
		echo "Conection lost";}
	}
	function dup_check($id,$username,$packages){
		$check=1;
		$conn=id_conn();
		$sql = "SELECT trans_id FROM prod.transfer ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				if ($id!=$row['trans_id']) {
					$check=1;
				}else{
					$check=0;
				}
			}
		}
		if ($check) {
			return 1;
		}else{
			return 0;
		}
	}
	/*
	function dup_check_1($username,$packages){
		$flag=1;
		$conn=id_conn();
		$sql = "SELECT packages FROM prod.transferWHERE `username`= '$username' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				if ($packages!=$row['packages']) {
					$flag=1;
				}else{
					$flag=0;
				}
			}
		}
		if ($flag) {
			return 1;
		}else{
			return 0;
		}
	}
	*/
	function apply_query($id,$username,$packages){
		$conn=id_conn();
		$query="INSERT INTO prod.transfer(`username`,`packages`,`trans_id`)VALUES('$username','$packages','$id')";
		if(mysqli_query($conn,$query)){
				return 1;
			}
			else{
				return 0;
			}
	}
	
	?>

	</pre>