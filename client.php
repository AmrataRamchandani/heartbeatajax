<html>
<head>
<title>Client</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
</head>
<?php 
$clientip=$_SERVER['REMOTE_ADDR'];
echo "<script>

setInterval(function() {

 var url = 'ajax.php';
 
	$.ajax({
           type: 'POST',
           url: url,
           data: {
           clientip: '$clientip'
           }
           
         });
}, 3000);
</script>";

?>

</html>