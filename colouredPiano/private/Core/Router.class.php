<?php

Class Router{
    
    //Its job is to require the right controller depending on the url
    static function routingTo($fullUrl){
        //calls the getUrlPath function which parses the path and saves it in $path variable
        $path = Router::getUrlPath($fullUrl);
        //checks if this files controller exists if does then requires it
        if(file_exists('../private/Control/'.$path.'.ctrl.php')){
            require('../private/Control/'.$path .'.ctrl.php');
        }
        // if not than checks if its the index page and requires it if it is, if not than requires the error page ctrl
        else{
            $path == '/' ? require('../private/Control/index.ctrl.php') : header('Location: /error?code=404');  
        }
    }
    //parses the path out of the current url
    static function getUrlPath($url){
        $page =parse_url($url);
        return $page['path'];
    }
    //parses the query out of the current url
    //using it with the error codes
    static function getUrlQuery($url){
        $page =parse_url($url);
        return $page['query'];
    }
    
}

