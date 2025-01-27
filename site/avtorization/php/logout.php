<?php
session_start();
session_unset(); // Удаление всех данных сессии
session_destroy(); // Уничтожение сессии
header('Location: login.php'); // Перенаправление на страницу входа
exit();
?>
