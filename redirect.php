<?php
require_once('connectBD.php');
if (empty($_GET['cropKey'])) {

} else {
    $queryCheckCropKey = $dbConnect->prepare("SELECT * FROM cropUrl WHERE cropKey = ?");
    $queryCheckCropKey->execute(array(htmlspecialchars($_GET['cropKey'])));
    $queryCheckCropKey_result = $queryCheckCropKey->fetch(PDO::FETCH_ASSOC);

    if ($queryCheckCropKey_result) {
        $result = [
            'url' => $queryCheckCropKey_result['url']
        ];
        echo $result['url'];
        header('location:'.$result['url']);
    }
}

?>