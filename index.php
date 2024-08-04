<?php include_once "autoloader.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>NovelEast text toolBox</title>
</head>
<body>
    <header>
        <h1>section 1</h1>
    </header>
    <main>
    <!-- enctype="multipart/form-data" -->
        <form action="process.php" method="post" id="frmS1">
            <label for="">Select English File</label>
            <input type="file" name="frmS1Text" id="frmS1Text" accept=".txt" required>
            
            <label for="">Select NameList File</label>
            <input type="file" name="frmS1Json" id="frmS1Json" accept=".json" required>

            <input type="submit" name="frmS1Sub" id="frmS1Sub">
        </form>
    </main>
    
</body>
</html>