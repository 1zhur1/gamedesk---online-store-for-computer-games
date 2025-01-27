<?php
require 'db.php'; 

session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$stmt = $pdo->prepare("SELECT name FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$name = $user['name'];

if (isset($_POST['logout'])) {
    session_destroy(); 
    header("Location: login.php"); 
    exit();
}

// Handle profile update
if (isset($_POST['update_name'])) {
    $new_name = $_POST['name'];
    $stmt = $pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
    if ($stmt->execute([$new_name, $_SESSION['user_id']])) {
        $name = $new_name; // Update the displayed name
        echo "<script>alert('Имя успешно обновлено!');</script>";
    } else {
        echo "<script>alert('Ошибка при обновлении имени. Попробуйте снова.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icon.png" />
    <title>Профиль - GameDesk</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@700&display=swap" rel="stylesheet">

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
            justify-content: center; 
            gap: 20px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo img {
            height: 50px; 
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

        .profile-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 30px;
            background-color: #333; 
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: space-between;
        }

        .profile-container h2 {
            font-size: 28px;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 20px;
            color: #FFA500; 
        }

        .profile-container h3 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #f2f2f2; 
        }

        .purchase-history {
            background-color: #444; 
            padding: 15px;
            border-radius: 5px;
            border-top: 3px solid #FFA500; 
            margin-top: 20px;
            width: 100%;
        }

        .purchase-history p {
            font-size: 18px;
            color: #bbb; 
        }

        .btn {
            background-color: #FFA500; 
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #e69500; 
        }

        .delete-btn {
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        .edit-form {
            margin-top: 20px;
            text-align: center;
        }

        .edit-form input {
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            margin-right: 10px;
            width: 200px;
        }

        .edit-form button {
            background-color: #FFA500; 
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .edit-form button:hover {
            background-color: #e69500; 
        }

        .action-container {
            margin-top: 20px;
            text-align: center;
        }

        .action-container form {
            display: inline-block;
            margin: 0 10px;
        }

        .left-column, .right-column {
            width: 48%;
        }

        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
            }

            .left-column, .right-column {
                width: 100%;
            }

            .action-container form {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="prof">
        <div class="logo">
            <a href="../../avtorization/php/login.php"><img src="../img/logo.png" alt="Логотип"></a>
        </div>
        <h1></h1>
    </div>
    <main>
        <div class="profile-container">
            <!-- Left Column: Purchase History -->
            <div class="left-column">
                <h2>Добро пожаловать, <?php echo htmlspecialchars($name); ?>!</h2>
                <h3>История покупок</h3>
                <div class="purchase-history">
                    <p>Ваша история покупок будет отображаться здесь.</p>
                </div>
            </div>

            <!-- Right Column: Actions -->
            <div class="right-column">
                <!-- Edit Profile Form -->
                <div class="edit-form">
                    <form method="POST">
                        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Новое имя">
                        <button type="submit" name="update_name">Обновить имя</button>
                    </form>
                </div>

                <!-- Action Buttons Container -->
                <div class="action-container">
                    <!-- Delete Profile Button -->
                    <form action="delete_profile.php" method="POST" style="display: inline-block;">
                        <button type="submit" class="delete-btn">Удалить профиль</button>
                    </form>

                    <!-- Logout Button -->
                    <form method="POST" style="display: inline-block;">
                        <button type="submit" name="logout" class="btn">Выход из профиля</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
