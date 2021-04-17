<?php

session_start();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require 'config.php';

require 'includes/database.php';

$db = new DB;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; 

    $sql = "
    SELECT * FROM users 
    WHERE id = '". $user_id."'";
    $result = $db->query($sql);
    $user = $db->fetch_assoc($result);
}