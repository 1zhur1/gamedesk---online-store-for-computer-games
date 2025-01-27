<?php
session_start(); // Начинаем сессию

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: ../avtorization.html"); // Перенаправление на страницу входа, если пользователь не авторизован
    exit();
}

require 'db.php'; // Подключение к базе данных

// Обработка формы удаления профиля
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];

    // Удаление пользователя из базы данных
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt->execute([$user_id])) {
        // Удаление сессии
        session_unset();
        session_destroy();
        header("Location: ../avtorization.html"); // Перенаправление на страницу входа после удаления профиля
        exit();
    } else {
        echo "<script>alert('Ошибка при удалении профиля. Попробуйте снова.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icon.png" />
    <title>Удаление профиля - GameDesk</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <style>
        /* Основные стили */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2e2e2e; /* темно-серый фон */
            margin: 0;
            padding: 0;
            color: #fff;
        }

        /* Шапка */
        .prof {
            background-color: #1c1c1c; /* темный фон для шапки */
            padding: 20px;
            display: flex;
            align-items: center; /* выравнивание по центру по вертикали */
            justify-content: center; /* выравнивание по центру по горизонтали */
            gap: 20px; /* пространство между логотипом и текстом */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo img {
            height: 80px; /* Размер логотипа */
            width: auto;
            margin-right: 1450px;
            margin-top: 10px; 
        }

        .prof h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 32px;
            color: #f2f2f2; /* белый текст */
            margin: 0;
            text-align: center;
            flex-grow: 1; /* Разделяет пространство, чтобы заголовок был по центру */
        }

        /* Контейнер для формы удаления профиля */
        .delete-profile-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 30px;
            background-color: #333; /* темно-серый фон */
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .delete-profile-container h2 {
            font-size: 28px;
            color: #FFA500; /* Оранжевый для заголовка */
            margin-bottom: 20px;
        }

        .delete-profile-container p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .delete-button {
            background-color: #FF0000;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #cc0000;
        }

        /* Футер */
        footer {
            background-color: #1c1c1c;
            color: #bbb;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Шапка -->
    <div class="prof">
        <!-- Логотип слева -->
        <div class="logo">
            <a href="../php/login.php"><img src="../../img/logo.png" alt="Логотип"></a>
        </div>
        <h1></h1>
    </div>

    <!-- Форма удаления профиля -->
    <div class="delete-profile-container">
        <h2>Удаление профиля</h2>
        <p>Вы уверены, что хотите удалить свой профиль? Это действие необратимо.</p>
        <form action="" method="POST">
            <button type="submit" class="delete-button">Удалить профиль</button>
        </form>
    </div>

    <!-- Футер -->
    <footer>
        <p>&copy; 2024 GameDesk - Все права защищены</p>
    </footer>
</body>
</html>
