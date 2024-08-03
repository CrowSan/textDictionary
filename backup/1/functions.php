<?php



//array_key(enName) & array_value(en-persian)
function remove_persian($mixNames){
    $cleaned_text = preg_replace('/\\p{Arabic}+/u', "<br>", $mixNames);
    return $cleaned_text;
};

function make_Array_list_en($names,$fileName){
    $arrayNames = explode("+",$names);
    // $uniNames = array_unique($arrayNames);
    $json_names = json_encode($arrayNames);
    file_put_contents("json/En_{$fileName}.json", $json_names);
};

function make_Array_list_fa($names,$fileName){
    $arrayNames = explode("+",$names);
    // $uniNames = array_unique($arrayNames);
    $json_names = json_encode($arrayNames);
    file_put_contents("json/Fa_{$fileName}.json", $json_names);
};


function add_Number($text, $namesList){
    foreach ($namesList as $index => $name) {
        $text = str_replace($name, $name . "[$index]", $text);
      }
      return $text;
};

function make_numbered_text($rawFileName,$finalFileName,$enJsonName){
    $chapter = file_get_contents("txt/{$rawFileName}.txt");
    $json_en_List = file_get_contents("json/{$enJsonName}.json");
    $enList = json_decode($json_en_List, true);
    $adding_number_to_text = add_Number($chapter, $enList);
    file_put_contents("txt/{$finalFileName}.txt", $adding_number_to_text);
};

function replace_number($text, $perList) {
    $pattern = '/\[(\d+)\]/';

    // Replace each index placeholder with the corresponding value enclosed in brackets
    $updated_text = preg_replace_callback($pattern, function ($matches) use ($perList) {
        $index = intval($matches[1]);
        if (isset($perList[$index])) {
            return "[" . $perList[$index] . "]";
        } else {
            return $matches[0]; // Keep the original match
        }
    }, $text);

    // Add <br> tags for line breaks
    $updated_text = str_replace("\n", "<br>", $updated_text);

    return $updated_text;
}

function make_named_text($faNameList,$textFile,$finalOutputName) {
    $json_fa = file_get_contents("json/{$faNameList}.json");
    $faList = json_decode($json_fa, true);
    $text_after_tranlate = file_get_contents("txt/{$textFile}.txt");
    $updated_text = replace_number($text_after_tranlate, $faList);
    file_put_contents("txt/{$finalOutputName}.txt", $updated_text); 
};



/*function replace_number($text, $perList) {
        $pattern = '/\[(\d+)\]/';
    
        // Replace each index placeholder with the corresponding value enclosed in brackets
        $updated_text = preg_replace_callback($pattern, function ($matches) use ($perList) {
            $index = intval($matches[1]);
            if (isset($perList[$index])) {
                return "[" . $perList[$index] . "]";
            } else {
                return $matches[0]; // Keep the original match
            }
        }, $text);
    
        return $updated_text;
}; */

  