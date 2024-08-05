// "Chapter 101((.|\n)*)chapter 105"
#this regex select everything that is between two chpters. 
#chapter names need to be selected dynamically.
#rememeber the chpater names need to be exact with upper and lowercase

//code snipper tried
<!-- $text = "this text start from chapter 101: here.
and then goes on
and on 
and on
to reach chapter 105.";

$strStart = strpos($text,'chapter 101');
$strEnd = strpos($text, 'chapter 105');

$textExtract = substr($text, $strStart, $strEnd - $strStart);
echo $textExtract; -->