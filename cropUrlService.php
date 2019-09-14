<?php
require_once('connectBD.php');
if (empty($_POST['urlForCrop'])) {
    echo "Вы ничего не ввели :/";
    die;
} else {

    $url = filter_var($_POST['urlForCrop'], FILTER_SANITIZE_URL);

    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo "URL не валиден";
    } else {
        $letters = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890";
        $count = strlen($letters);
        $cropKey = "";
        $result = "";

        //Проверка на повторение ключей
        do {
            for ($i = 0; $i < 5; $i++) {
                $cropKey .= $letters[mt_rand(0, $count)];
            }

            $queryCheckCropKey = $dbConnect->prepare("SELECT * FROM cropUrl WHERE cropKey = ?");
            $queryCheckCropKey->execute(array($cropKey));
            $queryCheckCropKey_result = $queryCheckCropKey->fetch(PDO::FETCH_ASSOC);
        } while ($queryCheckCropKey_result);

        //Защита от пустого ключа и спама кнопки
        while(empty($cropKey)) {
            //echo "ПРОПУСК";
        }

        $result = $_SERVER['HTTP_HOST'] . "/-" . $cropKey;

        $queryAddCropURL = $dbConnect->prepare("INSERT INTO `cropUrl` (`id`, `url`, `cropKey`) VALUES (NULL, ?, ?);");
        $queryAddCropURL->execute(array(htmlspecialchars($_POST['urlForCrop']), $cropKey));
    }
    ?>
    <div class="countiesList_block">
        <?php
        echo $result;
        ?>
    </div>
    <?php
}
?>