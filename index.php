<?php
require_once 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = getenv('MYSQL_HOST');
$port = getenv('MYSQL_PORT');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$database = getenv('MYSQL_DATABASE');

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Теперь вы можете использовать $conn для работы с вашей базой данных

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск и продажа билетов</title>
</head>
<body>
    <h1>Добро пожаловать на сайт поиска и продажи билетов!</h1>
    
    <h2>Список доступных билетов:</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Название мероприятия</th><th>Дата и время</th><th>Цена</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["event_name"] . "</td>";
            echo "<td>" . $row["event_date"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Нет доступных билетов.";
    }
    $connection->close();
    ?>

</body>
</html>
