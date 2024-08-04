<?php
#validate method
if (!$_SERVER['REQUEST_METHOD'] == 'post' ) {
    echo "wrong REQUEST METHOD";
    return false;
}

#validate file extentions
if (!strpos($_POST['frmS1Text'], '.json') && !strpos($_POST['frmS1Json'], '.json')) {
    echo "wrong format";
    return false;
}

var_dump($_FILES);

####sending data to classes so it can work on them
// echo "all right";
