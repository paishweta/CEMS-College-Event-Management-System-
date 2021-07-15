<?php
session_start();
$username = $_SESSION["username"];
$pwd = $_SESSION["pwd"];
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
	<title>See you soon</title>
</head>
<body>
	<script> 
        alert("Hope we meet again!!");
        window.location = "index.html";
    </script>
</body>
</html>
