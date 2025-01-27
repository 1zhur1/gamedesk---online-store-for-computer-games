<?php
require 'db.php';

// Включение отображения ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хешируем пароль

    // Проверка на существование пользователя с таким email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "Пользователь с таким email уже существует.";
    } else {
        // Вставка данных в базу
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $password])) {
    // Перенаправление на страницу входа
        header("Location: login.php");
    exit();
} else {
    echo "Ошибка при регистрации.";
    print_r($stmt->errorInfo());  // Печать ошибки SQL
}
    }
}
?>
