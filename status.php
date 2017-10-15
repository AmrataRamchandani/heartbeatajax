<?php
include("db.php");

$updatestatus="UPDATE heartbeat 
		SET status = (CASE
		 WHEN timestmp >= ( SELECT DATE_SUB(NOW(), INTERVAL 30 SECOND) ) THEN 'Online'
		 WHEN timestmp < ( SELECT DATE_SUB(NOW(), INTERVAL 30 SECOND) ) THEN 'Offline'
		END) ";


if (mysqli_query($conn, $updatestatus)) {
    echo "Success";
} else {
    echo "Error";
}


?>
