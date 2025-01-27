<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require '../avtorization/php/db.php'; 


if (!isset($_SESSION['user_id'])) {
    header('Location: ../php/login.php');
    exit();
}


$email = $_POST['email'];
$vid_card = $_POST['payment-method'];
$number = $_POST['card-number'];
$name = $_POST['name'];
$id_user = $_SESSION['user_id']; 

try {
    
    $stmt = $pdo->prepare("INSERT INTO payments (id_user, email, vid_card, number, name) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$id_user, $email, $vid_card, $number, $name]);

    
    header('Location: success.php');
    exit();
} catch (PDOException $e) {
    echo 'Ошибка при сохранении данных: ' . $e->getMessage();
}
?>