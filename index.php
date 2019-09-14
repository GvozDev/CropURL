<html class=".bg-primary">
<head>
    <link href="CSS/design.css" rel="stylesheet">
    <title>CropURL</title>
    <link rel="icon" href="https://icons8.com/iconizer/files/Vector_night/orig/scissors.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        function createCropURL() {
            urlForCrop = $("input[name='urlForCrop']").val();
            $.ajax({
                type: "POST",
                url: "cropUrlService.php",
                data: {urlForCrop: urlForCrop},
                success: function (data) {
                    $("#response").html(data);
                }
            });
            return false;
        }
    </script>
</head>

<div class="main">
    <div class="urlCrop_block">
        Введите URL:
        <input class="input" type='text' name='urlForCrop' placeholder='URL'/>
        <button class="button" onClick="createCropURL()">Сократить ссылку</button>
    </div>
    <div id="response"></div>
</div>

</body>
</html>