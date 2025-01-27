<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icon.png" />
    <title>Форма оплаты</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2e2e2e;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .prof {
            background-color: #1c1c1c;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo img {
            height: 80px;
            width: auto;
        }

        .prof h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 32px;
            color: #f2f2f2;
            margin: 0;
            text-align: center;
            flex-grow: 1;
        }

        .payment-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
        }

        .payment-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2e2e2e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2e2e2e;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            background-color: #f7931e;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #e48309;
        }
    </style>
</head>
<body>
    <div class="prof">
        <div class="logo">
            <a href="../../avtorization/php/login.php"><img src="../../img/logo.png" alt="Логотип"></a>
        </div>
        <h1></h1>
        <div></div>
    </div>
    <div class="payment-form">
        <h2>Оформление заказа</h2>
        <form action="process_payment.php" method="post">
            <div class="form-group">
                <label for="payment-method">Способ оплаты:</label>
                <select id="payment-method" name="payment-method">
                    <option value="visa">Visa</option>
                    <option value="mastercard">Mastercard</option>
                    <option value="mir">МИР</option>
                </select>
            </div>
            <div class="form-group">
                <label for="card-number">Номер карты:</label>
                <input type="text" id="card-number" name="card-number" placeholder="XXXX XXXX XXXX XXXX" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit" class="submit-btn">Оплатить</button>
        </form>
    </div>
</body>
</html>