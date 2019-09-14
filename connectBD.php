<?php
try {
    $HOST = "localhost";
    $LOGIN = "root";
    $PASSWORD = "?????????";
    $DATABASE = "UCDB";

    $dbConnect = new PDO("mysql:host=$HOST;dbname=$DATABASE;charset=utf8;", $LOGIN, $PASSWORD);

} catch (PDOException $exception) {
    echo "<b>Ошибка подключения: </b>" . $exception->getMessage();
    die;
}
?>
