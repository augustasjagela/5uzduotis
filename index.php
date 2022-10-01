<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST["upload"])) {
        $file = $_FILES["file"];


        $file_dir = "uploads/";
        $file_path = $file_dir . $file["name"];

        if($file["size"] > 1000000) {
            echo "Max 1MB";
        } else if($file["type"] != "application/pdf") {
            echo "Only .pdf files";
        } else if(move_uploaded_file($file["tmp_name"],$file_path)) {
            echo "Failas ikeltas";
        } else {
            echo "Failas neikeltas";
        }
        
       
    }
?>