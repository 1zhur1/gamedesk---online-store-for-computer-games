<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас - GameDesk</title>
    <link rel="shortcut icon" href="../../img/icon.png" />
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }
        header {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container img {
            height: 50px;
        }
        .val-container {
            display: flex;
            align-items: center;
        }
        .val-container img {
            height: 30px;
            margin-left: 10px;
            cursor: pointer;
        }
        .about-content {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }
        .about-content h1, .about-content h2 {
            color: #000;
        }
        .about-content p {
            line-height: 1.6;
        }
        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .footer-section {
            margin: 10px;
        }
        .footer-section img {
            height: 30px;
            margin-top: 10px;
        }
        .footer-logos img {
            height: 50px;
        }
        .push {
            height: 60px; /* Высота футера */
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="../../avtorization/php/login.php">
                <img src="../../img/logo.png" alt="Gamedesk Logo" class="logo">
            </a>
        </div>

        <div class="val-container">
            <img src="../../img/val.png" class="val" id="currency-toggle">
            <input type="hidden" id="currency" value="<?php echo isset($_SESSION['currency']) ? $_SESSION['currency'] : 'RUB'; ?>">
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="profile.php">
                    <img src="../../img/profile.png" class="val">
                </a>
            <?php else: ?>
                <a href="../avtorization.html">
                    <img src="../../img/profile.png" class="val">
                </a>
            <?php endif; ?>
        </div>
    </header>
    <div class="about-content">
        <h1>О нас</h1>
        <p>Добро пожаловать на GameDesk - ваш надежный магазин цифровых игр и ключей от официальных издателей. Мы предлагаем широкий ассортимент игр по разным жанрам и платформам, а также регулярные акции и скидки для наших клиентов.</p>
        <h2>Кто мы?</h2>
        <p>GameDesk был основан в 2023 году группой энтузиастов видеоигр, стремящихся сделать процесс покупки цифровых игр максимально удобным и приятным для наших клиентов. Наша команда состоит из профессионалов своего дела, которые заботятся о качестве предоставляемых услуг и удовлетворении потребностей наших пользователей.</p>
        <h3>Создатель:</h3>
        <p>Журавлев Арсений Юрьевич, Группа: 2122, Курс 3, Контакты: +375445796025</p>
    </div>
    <div class="push"></div>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Лицензионные ключи от официальных издателей</h3>
                <img src="../../img/kluch.png" alt="Icon">
            </div>
            <div class="footer-section">
                <h3>Гарантированная техподдержка вашей покупки</h3>
                <img src="../../img/shesternya.png" alt="Icon">
            </div>
            <div class="footer-section">
                <h3>Регулярные акции, скидки и бонусы</h3>
                <img src="../../img/procent.png" alt="Icon">
            </div>
            <div class="footer-section">
                <h3>Более 9000 положительных отзывов от реальных клиентов</h3>
                <img src="../../img/otzyv.png" alt="Icon">
            </div>
        </div>
        <div class="footer-logos">
            <img src="../../img/pay.png" alt="Логотип 1">
        </div>
    </footer>
</body>
</html>
