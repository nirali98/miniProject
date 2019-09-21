<?php 

require 'database.php';

$stmt = $dbh->query("SELECT * FROM url_details ORDER BY id DESC LIMIT 1");
$urlData = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($urlData);