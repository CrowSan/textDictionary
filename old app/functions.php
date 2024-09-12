<?php

//array_key(enName) & array_value(en-persian)
function remove_persian($mixNames){

    $cleaned_text = preg_replace('/\\p{Arabic}+/u', "", $mixNames);
    return $cleaned_text;
};



function new_NL_byOne($nameLisfile, $fileName){
    // Assuming $numberedNL is the new data you want to append
    $nameStr = strtolower(file_get_contents($nameLisfile));
    
    //make array from string of data
    $valueNamesArray = explode("\n" ,$nameStr);
    $nopersian = remove_persian($nameStr);
    $keyNamesArray = explode("--" ,$nopersian);

    //make a combined array for NL
    $newNames = array_combine($keyNamesArray, $valueNamesArray);
    $noEmptyValue = array_filter($newNames);

    //add number as second value of each key
    $twoDIMArray = [];
    $i = 0;
    foreach ($noEmptyValue as $key => $value) {
        // Increment the ID for the new entry
        $twoDIMArray[$key] = [$value, $i];
        $i++;
    }

    // Encode the merged array as JSON
    $data = json_encode($twoDIMArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $utf8Data = mb_convert_encoding($data, 'UTF-8');
    
    // Matches \r\n and remove them
    $replace_NewLines = str_replace(['\r\n', '\r'], "", $utf8Data);
    $replace_Dividers = str_replace("--", "_", $replace_NewLines);

    // Matches one or more whitespace characters at the beginning of the string
    $pattern = '/(?<=")\s+/'; 
    $replace_Spaces = preg_replace($pattern, "", $replace_Dividers);

    // adds a white space to begining of the keys to make them find better
    $pattern_to_addSpace = '/"([^"]+)"/'; 
    $enhancedNameList = preg_replace($pattern_to_addSpace, '" $1"', $replace_Spaces);


    file_put_contents("json/NL_{$fileName}.json", $enhancedNameList);
    echo "json/NL_{$fileName}.json";
};




function add2NL($new_list_of_names, $jsonFileName){
    // Read existing JSON data from the file
    $existingData = file_get_contents("{$jsonFileName}");
    $NL = json_decode($existingData, true);

    // Read new names from file 
    $enNamStr = strtolower(file_get_contents("{$new_list_of_names}"));
    
    //make array from string of data
    $valueNamesArray = explode("\n" ,$enNamStr);
    // $nopersian = remove_persian($enNamStr);
    $nopersian = remove_persian($enNamStr);
    $keyNamesArray = explode("--" ,$nopersian);

    //make a combined array for NL(NameList)
    $newNames = array_combine($keyNamesArray, $valueNamesArray);
    $noEmptyValue = array_filter($newNames);
    // Get the last ID from the existing array
    $lastId = end($NL)[1];
    
    foreach ($noEmptyValue as $key => $value) {
        // Increment the ID for the new entry
        $lastId++;
        $NL[$key] = [$value, $lastId];
    }
    
    // Encode the merged array as JSON
    $data = json_encode($NL, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $utf8Data = mb_convert_encoding($data, 'UTF-8');
    
    // Matches \r\n and remove them
    $replace_NewLines = str_replace(['\r\n', '\r'], "", $utf8Data);
    $replace_Dividers = str_replace("++", "_", $replace_NewLines);
    // Matches one or more whitespace characters at the beginning of the string
    $pattern = '/(?<=")\s+/'; 
    $replace_Spaces = preg_replace($pattern, "", $replace_Dividers);
    // adds a white space to begining of the keys to make them find better
    $pattern_to_addSpace = '/"([^"]+)"/'; 
    $add_Space = preg_replace($pattern_to_addSpace, '" $1"', $replace_Spaces);
    // Confirm success or handle any errors
    // echo  "<pre>" . "انجام شد✔" . PHP_EOL;
    // print_r($add_Space);
    file_put_contents("{$jsonFileName}", $add_Space);
    echo "$jsonFileName";
    
};


function Num_Text($enTextFile, $jsonNL) {
    $chapter = strtolower(file_get_contents("txt/{$enTextFile}.txt"));;
    $json_en_List = file_get_contents("{$jsonNL}");
    $NL = json_decode($json_en_List, true);

    // Create an associative array to store index numbers from the name list
    $NLIndexes = [];
    foreach ($NL as $index => $name) {
        $NLIndexes[$index] = $name[1];
    }

    // Replace placeholders in the text with indexed names
    foreach ($NLIndexes as $index => $name) {
        $chapter = str_replace($index, $index . "[$name]", $chapter);
    }

    // Save the modified text to a file
    file_put_contents("txt/{$enTextFile}_numbered.txt", $chapter);
    // echo $chapter;
}

function Named_Text($jsonNL, $TextFile) {
    // Read the JSON name list
    $json_fa = file_get_contents("{$jsonNL}");
    $NL = json_decode($json_fa, true);
    $NLNames = [];
    foreach ($NL as $name) {
        $NLNames[$name[1]] = $name[0];
    }
    // Read the original text
    $text_after_translate = file_get_contents("{$TextFile}");

    // Replace index placeholders with corresponding values
    $pattern = '/\[(\d+)\]/';
    $updated_text = preg_replace_callback($pattern, function ($matches) use ($NLNames) {
        $index = intval($matches[1]);
        if (isset($NLNames[$index])) {
            return "[" . $NLNames[$index] . "]";
        } else {
            return $matches[0]; // Keep the original match
        }
    }, $text_after_translate);

    // Add <br> tags for line breaks
    $updated_text = str_replace("\n", "<br>", $updated_text);

    // Save the modified text to a file
    file_put_contents("{$TextFile}", $updated_text);
    // echo $updated_text;
}

function NL_From_Text($textFile){
    // Your original code to extract unique words
    $text = strtolower(file_get_contents("{$textFile}"));
    $pattern = "/\w+'?s?/"; // Case-insensitive pattern
    $wordArray = [];
    $replaceSymbol = preg_match_all($pattern, $text, $wordArray);

    // Convert all words to lowercase for case-insensitive comparison
    $lowercaseWords = array_map('strtolower', $wordArray[0]);
    $uniqueWords = array_unique($lowercaseWords);
    return $uniqueWords;
        
}


function NL_ByText($textFile,$mixedNL){
    // Your original code to extract unique words
    $text = strtolower(file_get_contents("{$textFile}"));
    $pattern = "/\w+'?s?/"; // Case-insensitive pattern
    $wordArray = [];
    $replaceSymbol = preg_match_all($pattern, $text, $wordArray);

    // Convert all words to lowercase for case-insensitive comparison
    $lowercaseWords = array_map('strtolower', $wordArray[0]);
    $uniqueWords = array_unique($lowercaseWords);

    // Assume the JSON name list is provided as a string
    $NLJson = file_get_contents("{$mixedNL}");
    $NL = json_decode($NLJson, true);

    // Filter out words that exist in the name list keys
    $filteredWords = array_filter($uniqueWords, function ($word) use ($NL) {
    return !isset($NL[$word]);
    });
    // echo "<pre>";
    // print_r($filteredWords);
    return $filteredWords;
        
}


function NL_Merger ($firstNL,$newListOfNames,$newNLName){
    // Create a new array by combining filtered words with the existing name list
    $getJsonNL = file_get_contents("{$firstNL}");
    $TrueNL = json_decode($getJsonNL, true);
    $newNL = array_merge($TrueNL, array_flip($newListOfNames));
    
    // Save the new name list to a JSON file
    $data = json_encode($newNL, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $utf8Data = mb_convert_encoding($data, 'UTF-8');
    file_put_contents("json/{$newNLName}.json",$utf8Data);
    echo "New name list has been saved to newNL.json!";
};






