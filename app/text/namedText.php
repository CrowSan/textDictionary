<?php

class TextTransformer
{
    private $NLNames = [];
    private $jsonNL;
    private $textFile;
    private $fileName;


    public function __construct($jsonNL, $textFile, $fileName)
    {
        $this->fileName = basename($fileName, "_numbered.txt");
        $this->jsonNL = $jsonNL;
        $this->textFile = $textFile;
        $this->loadNameList();
    }

    private function loadNameList()
    {
        if (file_exists($this->jsonNL)) {
            $json_fa = file_get_contents($this->jsonNL);
            $NL = json_decode($json_fa, true);
            foreach ($NL as $name) {
                $this->NLNames[$name[1]] = $name[0];
            }
        } else {
            throw new Exception("JSON name list not found.");
        }
    }

    public function transformText()
    {
        if (!file_exists($this->textFile)) {
            throw new Exception("Text file not found.");
        }

        // Read the original text
        $text_after_translate = file_get_contents($this->textFile);

        // Replace index placeholders with corresponding values
        $updated_text = preg_replace_callback('/\[(\d+)\]/', function ($matches) {
            $index = intval($matches[1]);
            if (isset($this->NLNames[$index])) {
                return "[" . $this->NLNames[$index] . "]";
            } else {
                return $matches[0]; // Keep the original match
            }
        }, $text_after_translate);

        // Save the modified text to a file
        file_put_contents("upload/{$this->fileName}_Named.txt", $updated_text);
        echo "<a href='upload/{$this->fileName}_Named.txt' style='border: 1px solid #0000ff30; border-radius: 3px; padding: 5px; margin: 20px; text-decoration: none; color: blue; background: aliceblue; box-shadow: 2px 2px 7px 0px #0075ff26;'>" . "{$this->fileName}_Named.txt" . "</a>";

    }
}
