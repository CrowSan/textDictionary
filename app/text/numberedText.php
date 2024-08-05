<?php
namespace app\text;

class TextNumberer {
    private $FilePath;
    private $chapter;
    private $nameList;

    public function __construct(string $enTextFile, string $jsonNameList) {
        $this->FilePath = $enTextFile;
        $this->chapter = strtolower(file_get_contents("$enTextFile"));
        $this->nameList = json_decode(file_get_contents($jsonNameList), true);
    }

    public function numberText(): void {
        $nameListIndexes = $this->buildNameListIndexes();

        // Replace placeholders in the text with indexed names
        $transformedChapter = $this->replaceNamesInText($nameListIndexes);

        // Save the modified text to a file
        file_put_contents("{$this->FilePath}_numbered.txt", $transformedChapter);
    }

    private function buildNameListIndexes(): array {
        $nameListIndexes = [];
        foreach ($this->nameList as $index => $name) {
            $nameListIndexes[$index] = $name[1];
        }
        return $nameListIndexes;
    }

    private function replaceNamesInText(array $nameListIndexes): string {
        foreach ($nameListIndexes as $index => $name) {
            $this->chapter = str_replace($index, $index . "[$name]", $this->chapter);
        }
        return $this->chapter;
    }
}

// Usage example:
$textNumberer = new TextNumberer("your_text_file", "your_name_list.json");
$textNumberer->numberText();
