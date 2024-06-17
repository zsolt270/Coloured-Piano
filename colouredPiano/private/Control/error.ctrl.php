<?php
$title = 'Hiba';
$errorCode = "";
//extracts the query from the url
$urlQuery = Router::getUrlQuery($_SERVER['REQUEST_URI']);
//separates query
$urlQueryExp = explode('=',$urlQuery);
//checks the error value and then show the correct error msg and sets the correct response code
if($urlQueryExp[1] == 400){
    http_response_code(400);
    $errorCode = 400;
}
else if($urlQueryExp[1] == 403){
    http_response_code(403);
    $errorCode = 403;
}
else if($urlQueryExp[1] == 404){
    http_response_code(404);
    $errorCode = 404;
}

require('../private/View/error.view.php');