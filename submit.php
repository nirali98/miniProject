<?php  
require 'database.php';

if (isset($_POST['submit'])) {
	
	$url=$_POST['url'];
	$statement = $dbh->prepare("INSERT INTO url_details (url) VALUES (?)");
	$statement->execute([$url]);

}

header("Location: index.php");
