<?php 
//for checking and debugging purposes
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//calls the Router class static method which returns the given url path and checks if its equal with the given param
// and if its true then adds the styling or css stylesheet or js file on the footer and head 
function isUrlName ($name){
    return Router::getUrlPath($_SERVER['REQUEST_URI']) == $name;
}