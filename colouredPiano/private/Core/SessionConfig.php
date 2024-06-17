<?php

session_set_cookie_params([
    'lifetime' => 3600, // 60 minute
    'domain' => '', //the domain is deleted on purpose, if you use this code, then you just need to fill them with your own domain
    'path' => '/',
    'httponly' =>true
]);
session_start();

$sessionActiveTime = 300; //5 minute
if(!isset($_SESSION['lastSessionUpdate'])){
   regenerateSessionID();
}
else{
    if(time() - $_SESSION['lastSessionUpdate'] >= $sessionActiveTime){
       regenerateSessionID();
    }
}
function regenerateSessionID(){
   session_regenerate_id(true);
   $_SESSION['lastSessionUpdate'] = time();
}






