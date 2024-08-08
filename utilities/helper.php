<?php

function validator($textFile, $jsonFile){
    #validate file extention
    if (!strpos($textFile['name'], '.txt') && !strpos($jsonFile['name'], '.json')) {
        echo "wrong format! <br>";
        return false;
    }

    #validate json file
    $jsonFile = file_get_contents($jsonFile['tmp_name']);
    if (json_decode($jsonFile) === null || json_last_error() !== JSON_ERROR_NONE ) {
        echo "your Json file is not right or have internal error!<br>";
        return false;
    } 

    return true;
}

function jsonValidator($jsonFile){
    #validate file extention
    if (!strpos($jsonFile['name'], '.json')) {
        return false;
    }

    #validate json file
    $jsonFile = file_get_contents($jsonFile['tmp_name']);
    if (json_decode($jsonFile) === null || json_last_error() !== JSON_ERROR_NONE ) {
        echo "your Json file is not right or have internal error!<br>";
        return false;
    } 

    return true;
}