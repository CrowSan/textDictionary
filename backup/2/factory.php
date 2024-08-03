<?php 
include_once 'functions.php';

/*function names: 
remove_persian($mixNames),
make_Array_list_en($names,$fileName)
make_Array_list_fa($names,$fileName)
add_Number($text, $namesList),
make_numbered_text($rawFileName,$finalFileName,$enJsonName)
replace_number($text, $perList)
make_named_text($faNameList
$textFile,$finalOutputName)*/

#to list names and get numbers
// $dumpin = file_get_contents("json/En_Demonic-names.json");
// $dumpin_decode = json_decode($dumpin, true);
// var_dump($dumpin_decode);

// make_Array_list_fa("txt/name_Fa.txt","Demonic-names");
// make_numbered_text("txt/birth-1601-1700.txt","Demonic-numbered","json/En_Demonic-names.json");
// make_named_text("json/Fa_Demonic-names.json","txt/Demonic_number_translate.txt","Demonic_transled_new_style");


// $enNamesString = "noah,great builder";
// $faNamesString = "noah - نوآ,great builder - سازنده بزرگ";

// $enNamesArray = explode("," ,$enNamesString);
// $faNamesArray = explode("," , $faNamesString);

// $nameList = array_combine($enNamesArray, $faNamesArray);


/*
try {
    $data = json_encode($nameList, JSON_UNESCAPED_UNICODE);
    $utf8Data = mb_convert_encoding($data, 'UTF-8');
    file_put_contents("json/{$fileName}.json", $utf8Data | LOCK_EX);
} catch (Exception $e) {
    echo "Error saving data: " . $e->getMessage();
}
$nameList = json_decode(file_get_contents("json/{$fileName}.json"), true);
*/




// echo "<pre>";
// var_dump($nameList);
// var_dump($nameList);

?>
