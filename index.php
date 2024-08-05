<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>NovelEast text toolBox</title>
</head>
<body>

    <main>
        <div class="formWrapper">
            <h1>Name To Number</h1>
            <form action="process.php" method="post" name="textNumberer" enctype="multipart/form-data">
                <label for="">Select English File</label>
                <input type="file" name="textFile" accept=".txt" required>
                
                <label for="">Select NameList File</label>
                <input type="file" name="jsonFile" accept=".json" required>

                <input type="submit" name="nameToNum" class="btn">
            </form>

            <h1>Number to Namer</h1>
            <form action="process.php" method="post" name="textNamer" enctype="multipart/form-data">
                <label for="">Select Numbered File</label>
                <input type="file" name="textFile" accept=".txt" required>
                
                <label for="">Select NameList File</label>
                <input type="file" name="jsonFile" accept=".json" required>

                <input type="submit" name="numToName" class="btn">
            </form>
        </div>

            <a href="<?php if (isset($_GET['dlLink'])) {echo $_GET['dlLink'];}?>" class="dlLink" download><?php if (isset($_GET['fileName'])) {echo $_GET['fileName'];}?></a>
    </main>


    
</body>
</html>