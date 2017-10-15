<?php
$clientip =$_POST['clientip'];

include("db.php");


$check= mysqli_query($conn, "SELECT * FROM heartbeat where ip='$clientip' ") ;
if(mysqli_num_rows($check) > 0){
	$sql = "UPDATE heartbeat set timestmp=now() where ip='$clientip' ";
	}
else{
	$sql = "insert into heartbeat (ip) values('$clientip') ";
}

if ( mysqli_query($conn, $sql) ) {
    echo "Success";  
} else {
    echo "Error";
}


?>
