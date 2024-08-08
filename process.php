<?php
include "utilities/helper.php";

#validate method
if (!$_SERVER['REQUEST_METHOD'] == 'post' ) {
    echo "wrong REQUEST METHOD";
    return false;
}

if (array_key_exists('nameToNum', $_POST)) {
    if (validator($_FILES['textFile'],$_FILES['jsonFile'])) {
    $textFile = $_FILES['textFile']['tmp_name'];
    $jsonFile = $_FILES['jsonFile']['tmp_name'];
    $textName = $_FILES['textFile']['name'];

    include_once "app/text/textNumberer.php";
    $numCls = new \app\text\textNumberer($textFile, $jsonFile, $textName);
    $numCls -> numberText();
    }
    echo "nameToNum Validation failed";

}

if (array_key_exists('numToName', $_POST)) {
  if (validator($_FILES['textFile'],$_FILES['jsonFile'])) {
    $textFile = $_FILES['textFile']['tmp_name'];
    $jsonFile = $_FILES['jsonFile']['tmp_name'];
    $textName = $_FILES['textFile']['name'];

    include_once "app/text/namedText.php";
    $transformer = new TextTransformer($jsonFile, $textFile, $textName);
    $transformer->transformText();
  }
  echo "numToName Validation failed";
}

if (array_key_exists('fileMulti', $_POST)) {
    $textFile = $_FILES['textFile']['tmp_name'];
    $start = $_POST['startNum'];
    $end = $_POST['endNum'];

  include "app/file/fileMultiplier.php";
  $multi = new fileMultiplier($textFile, $start, $end);
  $multi->seperator();
}

if (array_key_exists('nameList', $_POST)) {
  $textFile = $_FILES['textFile']['tmp_name'];
  $fileName = $_POST['fileName'];

  include "app/file/nameList.php";
  $nameList = new NameList($textFile, $fileName);
  $nameList->NameListCreator();
}


