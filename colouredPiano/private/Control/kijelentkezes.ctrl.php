<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['csrfToken']) && $_POST['csrfToken'] == $_SESSION['CSRF_Token']){
        session_unset();
        session_destroy();
        header('Location: /');
    }
   else{
       header('Location: /error?code=400');
   }
}
else{
    header('Location: /');
}