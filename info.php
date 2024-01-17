<?php
// Подключение к базе данных
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "metal_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение id из URL
$id = $_GET["id"];

// SQL-запрос для выборки данных по указанному id
$sql = "SELECT * FROM info WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Вывод данных
    $row = $result->fetch_assoc();
    echo "<h2>Данные с ID $id</h2>";
    echo "<p>Логотип: " . $row["logo"] . "</p>";
    echo "<p>Описание: " . $row["about"] . "</p>";
} else {
    echo "Данные не найдены";
}

$conn->close();
?>
