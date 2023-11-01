<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <h1>Fazendo Upload</h1>
    <form action="upload.php" enctype="multipart/form-data" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="200000">    
    <input type="file" name="arquivo" id="">
    <br>
        <br>
        <input type="submit" value="enviar arquivo">

    </form>
</body>
</html>