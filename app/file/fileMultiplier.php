<?php


class fileMultiplier{
    private $text;
    private $start;
    private $end;
    
    
    public function __construct($text, $start, $end)
    {
        $this->text = file_get_contents($text);
        $this->start = $start;
        $this->end = $end;
    }
    
    public function seperator(){

        while ($this->start <= $this->end) {
            $chEnd = $this->start + 5;

            //finding starting chapter position and the Last chapter
            $startPos = strpos($this->text, $this->start);
            $endPos = strpos($this->text, $chEnd);
            
            //extracting chapters based on numbers
            if ($startPos !== false && $endPos !== false) {
                $chExtracted = substr($this->text, $startPos, $endPos - $startPos);
                $fileName = "ch{$this->start} - ch{$chEnd}";
                file_put_contents("upload/$fileName.txt", $chExtracted);
                // header("location:index.php?dlLink=". "upload/{$fileName}.txt" ."&fileName=" . "{$fileName}.txt");

            }

            // add 5 to starting chapter to start the loop again
            $this->start +=5;
        }

    }

}



