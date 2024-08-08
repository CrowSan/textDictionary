<?php

class NameList{
    private $text;
    private $name;

    public function __construct($text, $name)
    {
        $this->text = strtolower(file_get_contents($text));
        $this->name =$name;
    }

    //removes persian words from a list of names
    private function persianWordRemover($text){
        $cleaned_text = preg_replace('/\\p{Arabic}+/u', "", $this->text);
        return $cleaned_text;
    }

    private function enAndPerCombiner($text){
        //make array from string of data
        $fullNameArray = explode("\n", $text);
        $noPersianStr = $this->persianWordRemover($text);
        $enNameArray = explode("--", $noPersianStr);

        //make a combined array for NameList
        $combinedArray = array_combine($enNameArray, $fullNameArray);
        $checkEmptyValue = array_filter($combinedArray);

        //add number as second value of each key
        $indexedCombinedArray = [];
        $i = 0;
        foreach ($checkEmptyValue as $key => $value) {
            // Increment the ID for the new entry
            $indexedCombinedArray[$key] = [$value, $i];
            $i++;
        }
        return $indexedCombinedArray;
    }

    public function NameListCreator(){
        $text = $this->enAndPerCombiner($this->text);
        
        // Encode the merged array as JSON
        $data = json_encode($text, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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

        file_put_contents("upload/{$this->name}_NameList.json", $enhancedNameList);
        header("location:index.php?dlLink=". "upload/{$this->name}_NameList.json" ."&fileName=" . "{$this->name}_NameList.json");

    }

    
}
