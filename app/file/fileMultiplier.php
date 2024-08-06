<?php

// "Chapter 101((.|\n)*)chapter 105"

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

    private function seperator(){
        while ($this->start <= $this->end) {
            echo $this->start . " - n1<br>";
            $n2 = $this->start + 5;
            echo $n2 . " - n2<br>";
            $this->start +=5;
        }

    }

}



