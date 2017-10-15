<html>
<head>
<title>Server</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
</head>
<?php

	include("db.php");
	$fetchOnlineUsers = mysqli_query($conn,"SELECT * FROM heartbeat");
	//$prevdate=date_sub(time(),date_interval_create_from_date_string('40 days'));
	$currenttime=date("d-m-Y H:i:s",time());
$prevtime=date("Y-m-d H:i:s",strtotime($currenttime) - 30);
	echo "<table id=mytable border='1'>
	<tr>
	<td>ID</td>
	<td>IP</td>
	<td>Timestamp</td>
	<td>Status</td>
	</tr>";
            
	   while($fetchOnlineUsersRecord = mysqli_fetch_array( $fetchOnlineUsers) )
              {
              $id=$fetchOnlineUsersRecord['id'];
              $ip=$fetchOnlineUsersRecord['ip'];
              $timestmp=$fetchOnlineUsersRecord['timestmp'];
	      $status=	$fetchOnlineUsersRecord['status'];
	      
		echo "<tr>
		<td>$id</td>
		<td>$ip</td>
		<td>$timestmp</td>";
if($timestmp >= $prevtime){
echo "<td>Online</td>";
}
else{
    echo "<td>Offline</td>";
}

		echo "</tr>";
	
 	      }

	echo "</table>";


echo "<script>
setInterval(function() {
$( '#mytable' ).load( 'server.php #mytable' );
}, 3000);

</script>";	

?>
</html>

