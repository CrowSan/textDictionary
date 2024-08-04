<?php
#validate method
if (!$_SERVER['REQUEST_METHOD'] == 'post' ) {
    echo "wrong REQUEST METHOD";
    return false;
}

#validate file extention
if (!strpos($_FILES['frmS1Text']['name'], '.txt') && !strpos($_FILES['frmS1Json']['name'], '.json')) {
    echo "wrong format";
    return false;
}

#validate json file
$jsonFile = file_get_contents($_FILES['frmS1Json']['tmp_name']);
if (json_decode($jsonFile) === null || json_last_error() !== JSON_ERROR_NONE ) {
    echo "your Json file is not right or have internal error";
    return false;
} 

#move files to a location
foreach ($_FILES as $key => $value) {
    move_uploaded_file($value['tmp_name'], "upload/".$value['name']);
}


