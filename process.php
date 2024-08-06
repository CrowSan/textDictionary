<?php

#validate method
if (!$_SERVER['REQUEST_METHOD'] == 'post' ) {
    echo "wrong REQUEST METHOD";
    return false;
}

if (array_key_exists('nameToNum', $_POST)) {
    #validate file extention
    if (!strpos($_FILES['textFile']['name'], '.txt') && !strpos($_FILES['jsonFile']['name'], '.json')) {
        echo "wrong format";
        return false;
    }

    #validate json file
    $jsonFile = file_get_contents($_FILES['jsonFile']['tmp_name']);
    if (json_decode($jsonFile) === null || json_last_error() !== JSON_ERROR_NONE ) {
        echo "your Json file is not right or have internal error";
        return false;
    } 

    $textFile = $_FILES['textFile']['tmp_name'];
    $jsonFile = $_FILES['jsonFile']['tmp_name'];
    $textName = $_FILES['textFile']['name'];

    include_once "app/text/textNumberer.php";
    $numCls = new \app\text\textNumberer($textFile, $jsonFile, $textName);
    $numCls -> numberText();
    echo "numToName";

}

if (array_key_exists('numToName', $_POST)) {
    #validate file extention
    if (!strpos($_FILES['textFile']['name'], '.txt') && !strpos($_FILES['jsonFile']['name'], '.json')) {
        echo "wrong format";
        return false;
    }

    #validate json file
    $jsonFile = file_get_contents($_FILES['jsonFile']['tmp_name']);
    if (json_decode($jsonFile) === null || json_last_error() !== JSON_ERROR_NONE ) {
        echo "your Json file is not right or have internal error";
        return false;
    } 

    $textFile = $_FILES['textFile']['tmp_name'];
    $jsonFile = $_FILES['jsonFile']['tmp_name'];
    $textName = $_FILES['textFile']['name'];
    include_once "app/text/namedText.php";
    $transformer = new TextTransformer($jsonFile, $textFile, $textName);
    $transformer->transformText();
    echo "numToName";
}

if (array_key_exists('fileMulti', $_POST)) {
    echo "<pre>";
    print_r($_POST);
    echo "<hr>";
    print_r($_FILES);

}



