<?php
require 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверка наличия пользователя с таким email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Успешная авторизация
        $_SESSION['user_id'] = $user['id'];
        header("Location: login.php"); // Перенаправление на главную страницу
        exit();
    } else {
        echo "Неправильный email или пароль.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDesk</title>
    <link rel="shortcut icon" href="../../img/icon.png" />
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .val-container img {
            height: 30px; /* Укажите нужный размер для иконок */
            margin-left: 15px;
            cursor: pointer; /* Указываем курсор при наведении */
        }

        /* Стили для модального окна */
        .modal {
            display: none; /* Скрыто по умолчанию */
            position: fixed; /* Фиксированное позиционирование */
            z-index: 1; /* Сверху всех элементов */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* Черный фон с прозрачностью */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Вертикальное центрирование */
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .currency-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .currency-option {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .currency-option:hover {
            background-color: #f0f0f0;
        }

        /* Добавляем стили для анимации */
        .game-item {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="http://localhost/сайт.html">
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
    <a href="#katalog">
        <div class="search-bar">
            <div class="katalog">
                <b>
                    <span>КАТАЛОГ</span>
                </b>
            </div>
        </a>
            <a href="about.php">
            <div class="katalog">
                <b>
                    <span>О САЙТЕ </span>
                </b>
            </div>
            </a>
        <div class="search-content">
            <input type="text" placeholder="Поиск по товарам, категориям и продавцам">
            <button>Найти</button>
        </div>
    </div>
    <div class="banner-container">
        <div class="all">
            <input checked type="radio" name="respond" id="desktop">
            <article id="slider">
                <input checked type="radio" name="slider" id="switch1">
                <input type="radio" name="slider" id="switch2">
                <input type="radio" name="slider" id="switch3">
                <input type="radio" name="slider" id="switch4">
                <input type="radio" name="slider" id="switch5">
                <div id="slides">
                    <div id="overflow">
                        <div class="image">
                            <article><img style="height: 300; width: 300;" src="../../img/banner 1.png"></article>
                            <article><img src="../../img/banner 2.png"></article>
                            <article><img src="../../img/banner 3.png"></article>
                            <article><img src="../../img/banner 4.png"></article>
                            <article><img src="../../img/banner 5.png"></article>
                        </div>
                    </div>
                </div>
                <div id="controls">
                    <label for="switch1"></label>
                    <label for="switch2"></label>
                    <label for="switch3"></label>
                    <label for="switch4"></label>
                    <label for="switch5"></label>
                </div>
                <div id="active">
                    <label for="switch1"></label>
                    <label for="switch2"></label>
                    <label for="switch3"></label>
                    <label for="switch4"></label>
                    <label for="switch5"></label>
                </div>
            </article>
        </div>
    </div>
    <div class="g-list">
        <div class="container">
            <div class="game-list">
                <h2><a name="katalog">Каталог</h2></a>
                
                <div class="game-item">
                    <a href="../../games/Resident Evil 4 Gold Edition.php?id=1">
                        <img src="../../img/resident-evil-4-gold-edition.jpg" alt="Resident Evil 4 Gold Edition">
                    </a>
                    <div class="game-info">
                        <h3>Resident Evil 4 Gold Edition</h3>
                        <p>Экшены</p>
                        <div class="discount">-34%</div>
                        <div class="price" data-price-rub="3295" data-price-usd="39.99">3295 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Red Dead Redemption 2 Ultimate Edition.php?id=2">
                        <img src="../../img/red-dead-redemption-2-ultimate-edition.jpg" alt="Red Dead Redemption 2: Ultimate Edition">
                    </a>
                    <div class="game-info">
                        <h3>Red Dead Redemption 2: Ultimate Edition</h3>
                        <p>Экшены, Приключения</p>
                        <div class="discount">-30%</div>
                        <div class="price" data-price-rub="2795" data-price-usd="33.99">2795 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Warhammer 40,000 Rogue Trader.php?id=3">
                        <img src="../../img/warhammer-40000-rogue-trader.jpg" alt="Warhammer 40,000: Rogue Trader">
                    </a>
                    <div class="game-info">
                        <h3>Warhammer 40,000: Rogue Trader</h3>
                        <p>Экшены</p>
                        <div class="discount">-47%</div>
                        <div class="price" data-price-rub="845" data-price-usd="10.00">845 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Hearts of Iron IV Cadet Edition.php?id=4">
                        <img src="../../img/hearts-of-iron-4.jpg" alt="Hearts of Iron IV: Cadet Edition">
                    </a>
                    <div class="game-info">
                        <h3>Hearts of Iron IV: Cadet Edition</h3>
                        <p>Стратегии</p>
                        <div class="discount">-30%</div>
                        <div class="price" data-price-rub="615" data-price-usd="7.50">615 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Little Nightmares II.php?id=5">
                        <img src="../../img/little-nightmares-ii.jpg" alt="Little Nightmares II">
                    </a>
                    <div class="game-info">
                        <h3>Little Nightmares II</h3>
                        <p>Приключения</p>
                        <div class="discount">-87%</div>
                        <div class="price" data-price-rub="275" data-price-usd="3.30">275 RUB</div>
                    </div>
                </div>
            </div>
            <div class="game-list">
                <h2></h2>
                <div class="game-item">
                    <a href="../../games/Metro Exodus Gold Edition.php">
                        <img src="../../img/metro-exodus-gold-edition.jpg" alt="Metro Exodus Gold Edition">
                    </a>
                    <div class="game-info">
                        <h3>Metro Exodus Gold Edition</h3>
                        <p>Шутеры</p>
                        <div class="discount">-25%</div>
                        <div class="price" data-price-rub="589" data-price-usd="7.00">589 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Mafia II Definitive Edition.php">
                        <img src="../../img/mafia-ii-definitive-edition.jpg" alt="Mafia III: Definitive Edition">
                    </a>
                    <div class="game-info">
                        <h3>Mafia II: Definitive Edition</h3>
                        <p>Экшены</p>
                        <div class="discount">-15%</div>
                        <div class="price" data-price-rub="835" data-price-usd="10.00">835 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Dark Souls Remastered.php?id=1">
                        <img src="../../img/dark-souls-remastered.jpg" alt="Dark Souls Remastered">
                    </a>
                    <div class="game-info">
                        <h3>Dark Souls Remastered</h3>
                        <p>Экшены, RPG</p>
                        <div class="discount">-55%</div>
                        <div class="price" data-price-rub="1075" data-price-usd="12.50">1075 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/Grand Theft Auto V Premium Edition.php">
                        <img src="../../img/grand-theft-auto-v-premium-edition.jpg" alt="Grand Theft Auto V: Premium Edition">
                    </a>
                    <div class="game-info">
                        <h3>Grand Theft Auto V: Premium Edition</h3>
                        <p>Экшены, Приключения</p>
                        <div class="discount">-16%</div>
                        <div class="price" data-price-rub="2795" data-price-usd="33.99">2795 RUB</div>
                    </div>
                </div>
                <div class="game-item">
                    <a href="../../games/No Man's Sky.php">
                        <img src="../../img/no-mans-sky.jpg" alt="No Man's Sky">
                    </a>
                    <div class="game-info">
                        <h3>No Man's Sky</h3>
                        <p>Экшены</p>
                        <div class="discount">-49%</div>
                        <div class="price" data-price-rub="875" data-price-usd="10.00">875 RUB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <!-- Модальное окно для выбора валюты -->
    <div id="currencyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Выберите валюту</h2>
            <div class="currency-options">
                <div class="currency-option" data-currency="RUB">Рубли (RUB)</div>
                <div class="currency-option" data-currency="USD">Доллары (USD)</div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Открытие модального окна при клике на иконку валюты
            $('.val').click(function() {
                $('#currencyModal').show();
            });

            // Закрытие модального окна при клике на крестик
            $('.close').click(function() {
                $('#currencyModal').hide();
            });

            // Закрытие модального окна при клике вне его области
            $(window).click(function(event) {
                if ($(event.target).is('#currencyModal')) {
                    $('#currencyModal').hide();
                }
            });

            // Обработка выбора валюты
            $('.currency-option').click(function() {
                var selectedCurrency = $(this).data('currency');
                $('#currency').val(selectedCurrency);
                updatePrices(selectedCurrency);
                $('#currencyModal').hide();
            });

            function updatePrices(currency) {
                $.ajax({
                    url: 'get_prices.php',
                    type: 'GET',
                    data: { currency: currency },
                    success: function(data) {
                        var prices = JSON.parse(data);
                        $('.price').each(function(index) {
                            $(this).text(prices[index] + ' ' + currency);
                        });
                    }
                });
            }

            // Добавляем анимации для game-item
            $('.game-item').each(function() {
                $(this).on('mouseenter', function() {
                    $(this).css('transform', 'translateY(-5px)'); // Поднимаем карточку
                });

                $(this).on('mouseleave', function() {
                    $(this).css('transform', 'translateY(0)'); // Возвращаем карточку на место
                });
            });
        });
    </script>
</body>
</html>
