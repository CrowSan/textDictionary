<?php 
include_once "functions.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST["jsonName"]) && isset($_FILES["txtFile"])) {
//         $file = $_FILES["txtFile"];
//         $filename = $_FILES["txtFile"]["name"];
//         $success = move_uploaded_file($file['tmp_name'], "uploads/" . $filename);
//         $json_name = $_POST["jsonName"]; 
//         make_new_NameList_byOne("uploads/{$filename}", $json_name); 
//     } else {
//         echo "Error: Missing required form data.";
//     }
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_FILES["jsonFile"]) && isset($_FILES["txtFile"])) {
//         $txtFile = $_FILES["txtFile"];
//         $txtFileName = $_FILES["txtFile"]["name"];
//         $txtSuccess = move_uploaded_file($txtFile['tmp_name'], "uploads/txt" . $txtFileName);

//         $jsonFile = $_FILES["jsonFile"]; // Corrected variable name
//         $jsonFileName = $_FILES["jsonFile"]["name"];
//         $jsonSuccess = move_uploaded_file($jsonFile['tmp_name'], "uploads/json" . $jsonFileName);
//         // $json_name = $_POST["jsonName"]; 
//         // make_new_NameList_byOne("uploads/{$filename}", $json_name); 
//         add_To_NameList("uploads/txt{$txtFileName}","uploads/json{$jsonFileName}");
//     } else {
//         echo "Error: Missing required form data.";
//     }
// }


#1. get all $_FILE datas
#2. get NAME of FILE ($_FILE["gothen name"]["name"])
#3. move Uploaded file from TMP_NAME to UPLOAD.$FileName

// $names = file_get_contents("uploads/".$filename,);
// print_r($names);
#change this function so it returns the result \\
#finale result of this function should be ECHO json file path
# IF(succsess) {ECHO "/json/{$fileName}.json";}

// add_To_NameList($new_list_of_names, $jsonFileName)
// make_Numbered_Text($enTextFile, $jsonNameList)
// make_Named_Text($jsonNameList, $numberedTextFile, $finalOutputName)
// make_Namelist_From_Text($textFile,$mixedNameList)
// header("location: index.html");



// make_new_NameList_byOne("txt/Vampire system/my vampire system Names.txt", "vampSystem");
// $newNames = compare_Namelist_From_Text("txt/Vampire system/Vamp Sys 701-800.txt","json/VampireSystem_mixTrash.json");
// echo "<pre>";
// print_r($newNames);
// make_nameList_Merger_forMix("json/VampireSystem_mixTrash.json",$newNames,"VampireSystem_mixTrash");

// Num_Text("Vampire system/Vamp Sys 501-600", "json/NL_vampSystem.json");
// Num_Text("Vampire system/Vamp Sys 601-700", "json/NL_vampSystem.json");
// Named_Text("json/NL_vampSystem.json", "txt/Vampire system/Vamp Sys 501-600_numbered.txt");
// Named_Text("json/NL_vampSystem.json", "txt/Vampire system/Vamp Sys 601-700_numbered.txt");


echo "<pre>";
echo "server";
echo "<br><br>";
print_r($_SERVER);
echo "<br><br><hr><br><br>";
echo "get";
echo "<br><br>";
print_r($_GET);
echo "<br><br><hr><br><br>";
echo "post";
echo "<br><br>";
print_r($_POST);
echo "<br><br><hr><br><br>";
echo "files";
echo "<br><br>";
print_r($_FILES);
echo "<br><br><hr><br><br>";