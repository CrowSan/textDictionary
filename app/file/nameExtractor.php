<?php


class nameExtractor{
    private $text;
    private $nameList;
    private $extractFileName;


    public function __construct(string $txtFile, string $jsonFile, string $fileName)
    {
        $this->text = strtolower(file_get_contents("$txtFile")); 
        $this->nameList = json_decode(file_get_contents("$jsonFile"), true);
        $this->extractFileName = $fileName;
    }

    public function extract(){
        $pattern = "/\w+'?s?/"; // Case-insensitive pattern
        $words = preg_match_all($pattern, $this->text, $wordArray);
        $lowercaseWords = array_map('strtolower', $wordArray[0]);
        $uniqueWords = array_unique($lowercaseWords);

        $NL = $this->nameList;

        $filteredWords = array_filter($uniqueWords, function ($word) use ($NL) {
            return !isset($NL[$word]);
        });
        // echo "<pre>";
        // print_r($filteredWords);

        file_put_contents("upload/{$this->extractFileName}_Extracted.txt", implode("\n" , $filteredWords));
        header("location:index.php?dlLink=". "upload/{$this->extractFileName}_Extracted.txt" ."&fileName=" . "{$this->extractFileName}_Extracted.txt");
    }

}

