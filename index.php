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
            <div class="Section1">       
                <div class="formWrapper">
                            <form action="process.php" method="post" name="textNumberer" enctype="multipart/form-data">
                            <h1>Name To Number</h1>
                            <label for="textFile">Select English File</label>
                            <input type="file" name="textFile" accept=".txt" required>
                            
                            <label for="jsonFile">Select NameList File</label>
                            <input type="file" name="jsonFile" accept=".json" required>

                            <input type="submit" name="nameToNum" class="btn">
                        </form>
                    </div>
                    <div class="formWrapper">
                        <form action="process.php" method="post" name="textNamer" enctype="multipart/form-data">
                            <h1>Number to Namer</h1>
                            <label for="textFile">Select Numbered File</label>
                            <input type="file" name="textFile" accept=".txt" required>
                            
                            <label for="jsonFile">Select NameList File</label>
                            <input type="file" name="jsonFile" accept=".json" required>
                
                            <input type="submit" name="numToName" class="btn">
                        </form>
                    </div>
            </div>

        <hr>
        <div class="Section2">
            <div class="formWrapper">
                <form action="process.php" method="post" name="fileMulti" enctype="multipart/form-data">
                    <h1>File multiplier</h1>
                    <label for="textFile">Select English File</label>
                    <input type="file" name="textFile" accept=".txt" required>
    
                    <label for="startNum">Enter start and last chapter number</label>
                    <div class="numInput">
                        <input type="number" name="startNum" placeholder="start" required>
                        <input type="number" name="endNum"  placeholder="end" required>
                        <input type="number" name="partingNum"  placeholder="per part" required>
                    </div>
    
                    <input type="submit" name="fileMulti" class="btn">
                </form>
            </div>
            <div class="formWrapper">
                <form action="process.php" method="post" name="nameList" enctype="multipart/form-data">
                    <h1>NameList creator</h1>
                    <label for="textFile">Select new namelist File</label>
                            <input type="file" name="textFile" accept=".txt">

                            <label for="fileName">Enter a name for file</label>
                            <input type="text" name="fileName">

                            <input type="submit" name="nameList" class="btn">
                </form>
            </div>
                <div class="formWrapper">
                        <form action="process.php" method="post" name="nameExtractor" enctype="multipart/form-data">
                            <h1>Name Extractor</h1>
                            <label for="textFile">Select English File</label>
                            <input type="file" name="textFile" accept=".txt" required>
                            
                            <label for="jsonFile">Select NameList File</label>
                            <input type="file" name="jsonFile" accept=".json" required>

                            <input type="submit" name="nameExtractor" class="btn">
                        </form>
                    </div>
            </div>
        </div>

            <a href="<?php if (isset($_GET['dlLink'])) {echo $_GET['dlLink'];}?>" class="dlLink" download><?php if (isset($_GET['fileName'])) {echo $_GET['fileName'];}?></a>
    </main>


    
</body>
</html>