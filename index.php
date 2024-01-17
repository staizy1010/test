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

// SQL-запрос для выборки всех записей из таблицы info
$sql = "SELECT * FROM info";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список записей</title>
</head>
<body>

    <h2>Список записей</h2>

    <?php
    // Вывод данных, если они есть
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
              ?>
            <a href="/info.php?id=<?php echo $row["id"];?>"> 
            
           
            <img src="
            <?php

            echo $row["logo"];
            
            ?>
            ">
            </a>
            <?php

            

        }
    } else {
        echo "Записей не найдено";
    }
    ?>


</body>
</html>

<?php
$conn->close();
?>


