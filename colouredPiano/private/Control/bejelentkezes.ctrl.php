<?php 

if(!isset($_SESSION['loggedin'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['csrfToken']) && $_POST['csrfToken'] == $_SESSION['CSRF_Token']){
        $validator = new validator($_POST['username'],'',$_POST['pwd']);
        $result = $validator->checkLoginInput(); //checks if the given username and pwd are correct
        if($result){
            $_SESSION['CSRF_Token'] = bin2hex(random_bytes(14));
            regenerateSessionID();
            header('Location: /');
         }
         else{
            header('Location: /bejelentkezes');
        }
        }
       else{
          header('Location: /error?code=400');
       }
    }
    else{
        //interface display
        $title = 'Bejelentkezés'; 
        $_SESSION['CSRF_Token'] = bin2hex(random_bytes(14));
        require('../private/View/login.view.php');
        // unsetting the error session variables
        unset($_SESSION['loginUnameError']);
        unset($_SESSION['loginPwdError']);
        unset($_SESSION['deletedAccount']);
    }
}
else{
    header('Location: /');
}