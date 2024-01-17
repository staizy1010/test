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

// Обработка отправленной формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $logo = $_POST["logo"];
    $about = $_POST["about"];

    // SQL-запрос для добавления данных в таблицу
    $sql = "INSERT INTO info (logo, about) VALUES ('$logo', '$about')";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно добавлены";
    } else {
        echo "Ошибка при добавлении данных: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
</head>
<body>

    <h2>Добавить данные</h2>

    <!-- Форма для ввода данных -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="logo">Логотип:</label>
        <input type="text" name="logo" required><br>

        <label for="about">Описание:</label>
        <textarea name="about" rows="4" required></textarea><br>

        <input type="submit" value="Добавить данные">
    </form>

</body>
</html>
