<?php
session_start(); // Начинаем сессию

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../avtorization/avtorization.html"); // Перенаправление на страницу входа, если пользователь не авторизован
    exit();
}

// Данные игры (заполняем вручную)
$game = [
    'id' => 3,
    'name' => ' Warhammer 40,000: Rogue Trader',
    'price' => 845,  // Цена игры
    'image_url' => '../../img/warhammer-40000-rogue-trader (1).jpg',  // Путь к изображению игры
    'description' => 'Преодолевайте невероятные расстояния на своем гигантском космическом корабле, путешествуя между множеством систем в Просторе Коронус - малоисследованной и смертельно опасной области космоса. Несмотря на то, что этот регион считается лишь окраиной Империума, огромный Простор скрывает множество возможностей для обогащения и открытий',
    'os' => 'Windows 10',
    'processor' => 'Intel Core i5-4590T',
    'ram' => 8,  // В оперативной памяти GB
    'graphics' => 'AMD Radeon RX Vega 6 / Intel HD Graphics 630',
    'disk_space' => 100  // Место на диске в GB
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icon.png" />
    <title>Покупка игры - <?php echo htmlspecialchars($game['name']); ?> - GameDesk</title>
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

        /* Контейнер для страницы игры */
        .game-page-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 30px;
            background-color: #333; /* темно-серый фон */
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Фото игры */
        .game-image {
            max-width: 500px;
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 50px;
            margin-left: 70px;
        }

        /* Описание игры и цена */
        .game-details {
            max-width: 600px;
            color: #fff;
        }

        .game-details h2 {
            font-size: 28px;
            color: #FFA500; /* Оранжевый для заголовка */
            margin-bottom: 20px;
        }

        .game-price {
            font-size: 36px;
            color: #fff;
            margin-top: 20px;
        }

        .buy-button {
            background-color: #FFA500;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #e69500;
        }

        /* Системные требования */
        .system-requirements {
            margin-top: 30px;
            background-color: #444;
            padding: 20px;
            border-radius: 5px;
            color: #bbb;
        }

        .system-requirements h3 {
            font-size: 24px;
            color: #FFA500;
            margin-bottom: 15px;
        }

        .system-requirements ul {
            list-style-type: none;
            padding-left: 0;
        }

        .system-requirements li {
            font-size: 18px;
        }

        /* Футер */
        footer {
            background-color: #1c1c1c;
            color: #bbb;
            text-align: center;
            padding: 20px 0;
            
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
            <a href="../../avtorization/php/login.php"><img src="../../img/logo.png" alt="Логотип"></a>
        </div>
        <h1></h1>
    </div>

    <!-- Страница игры -->
    <div class="game-page-container">
        <!-- Фото игры -->
        <div class="game-image">
            <img src="<?php echo htmlspecialchars($game['image_url']); ?>" alt="Фото игры">
        </div>

        <!-- Детали игры -->
        <div class="game-details">
            <h2><?php echo htmlspecialchars($game['name']); ?></h2>
            <div class="game-price"><?php echo number_format($game['price'], 0, ',', ' ') . ' ₽'; ?></div>
            
            <form action="buy_game.php" method="POST">
                <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                <button type="submit" class="buy-button">Купить</button>
            </form>

            <!-- Описание игры -->
            <div class="description">
                <h3>Описание</h3>
                <p><?php echo htmlspecialchars($game['description']); ?></p>
            </div>

            <!-- Системные требования -->
            <div class="system-requirements">
                <h3>Минимальные системные требования</h3>
                <ul>
                    <li>Операционная система: <?php echo htmlspecialchars($game['os']); ?></li>
                    <li>Процессор: <?php echo htmlspecialchars($game['processor']); ?></li>
                    <li>Оперативная память: <?php echo htmlspecialchars($game['ram']); ?> GB</li>
                    <li>Видеокарта: <?php echo htmlspecialchars($game['graphics']); ?></li>
                    <li>Место на диске: <?php echo htmlspecialchars($game['disk_space']); ?> GB</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Футер -->
    <footer>
        <p>&copy; 2024 GameDesk - Все права защищены</p>
    </footer>
</body>
</html>
