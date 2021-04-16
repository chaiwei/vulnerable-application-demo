<?php

session_start();

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