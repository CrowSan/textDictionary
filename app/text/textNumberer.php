<?php
namespace app\text;

class textNumberer {
    private $fileName;
    private $chapter;
    private $nameList;

    public function __construct(string $enTextFile, string $jsonNameList, string $fileName) {
        $this->fileName = basename($fileName, ".txt");
        $this->chapter = strtolower(file_get_contents($enTextFile));
        $this->nameList = json_decode(file_get_contents($jsonNameList), true);
    }

    public function numberText(): void {
        $nameListIndexes = $this->buildNameListIndexes();

        // Replace placeholders in the text with indexed names
        $transformedChapter = $this->replaceNamesInText($nameListIndexes);

        // Save the modified text to a file
        file_put_contents("upload/{$this->fileName}_numbered.txt", $transformedChapter);
        echo "<a href='upload/{$this->fileName}_numbered.txt' style='border: 1px solid #0000ff30; border-radius: 3px; padding: 5px; margin: 20px; text-decoration: none; color: blue; background: aliceblue; box-shadow: 2px 2px 7px 0px #0075ff26;'>" . "{$this->fileName}_numbered.txt" . "</a>";
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
