<?php

if(!isset( $_SESSION['loggedin'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['csrfToken']) && $_POST['csrfToken'] == $_SESSION['CSRF_Token']){
            $resetEmail = $_POST["resetEmail"];
            $model = new Model();
            $validator = random_bytes(24); // token
            $expiryDate = date("Y/m/d H:i",time() + 600); // 10 minutes, the deadline for the pwd change
            $resultUsers = $model->Read("*", "users", "where email = ?", [$resetEmail])->fetch();
            if($resultUsers){
                $model->DeletePwdReset("resetpassword","where ResetPwdEmail	 = ?", [$resultUsers['email']]);
                // hashing the token for the storage
                $options = [ 'cost' => 12];
                $model->Create('resetpassword', 'ResetPwdEmail, ResetPwdToken, ResetPwdExpDate', '?, ?, ?', [
                    $resetEmail, password_hash($validator, PASSWORD_BCRYPT, $options) , $expiryDate
                ]);
                //getting the new pwd change request from the given email address for the authentication
                $identifier = $model->Read("ResetPwdID", "resetpassword", "where ResetPwdEmail = ?", [$resultUsers['email']])->fetch();
                // sends the email
                Mailer::sendRMail($resetEmail,$identifier["ResetPwdID"], bin2hex($validator));
                header('Location: /jelszokeres?error=none');
            }
            else{
                header('Location: /jelszokeres?error=hibasEmail');
            }
        }
        else{
            header('Location: /error?code=400');
        }
    }
    //Page display
    $hibasEmail = false;
    $successEmail = false;
    //page display after the first one, after an already madde request
    // checks if it was successful or failed and shows the correct msg on the display
    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['error']) == true){
        $urlQuery = Router::getUrlQuery($_SERVER['REQUEST_URI']);
        $urlQueryExp = explode('=',$urlQuery);
        if($urlQueryExp[1] == 'hibasEmail'){
            $hibasEmail = true;
        }
        else if($urlQueryExp[1] == 'none'){
            $successEmail = true;
        }
    }
    //first timepage display 
    $title = 'Jelszókérés';
    $_SESSION['CSRF_Token'] = bin2hex(random_bytes(14));
    require('../private/View/jelszo_keres.view.php');
}
else{
    header('Location: /');
}

