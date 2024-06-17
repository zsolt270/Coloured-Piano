<?php

if(!isset( $_SESSION['loggedin'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['csrfToken']) && $_POST['csrfToken'] == $_SESSION['CSRF_Token']){
            $identifier = $_POST['identifier'];
            $token = $_POST['token'];
            $validator = new validator('','',$_POST['pwdreset'],$_POST['pwdreset_two']);
            $checkedPwd = $validator->checkPwd();
            $checkedPwdtwo = $validator->checkPwdsMatch();
            if($checkedPwd == true && $checkedPwdtwo == true){ //checks if the new pwd was correct
                $currentDate = strtotime(date("Y/m/d H:i")); 
                $model = new Model();
                // searching for the new pwd request with the id that is in the url
                $resetResult =  $model->Read("*", "resetpassword", "where ResetPwdID = ?", [$identifier])->fetch();
                if($resetResult && strtotime($resetResult['ResetPwdExpDate']) >= $currentDate){ //checking if there is a request in the db with the ID and if its still in the deadline
                    $tokenInBin = hex2bin($token);
                    $checkToken = password_verify($tokenInBin, $resetResult['ResetPwdToken']);
                    if($checkToken){ //checking if the url token matches with the one that is in the db
                        // searching the user with the email address that requested the change
                        $usersResult = $model->Read("*", "users", "where email = ?", [$resetResult['ResetPwdEmail']])->fetch();
                        if($usersResult){
                            // pwd change steps
                            $options = [ 'cost' => 12];
                            $hashedPwd = password_hash($_POST['pwdreset'], PASSWORD_BCRYPT, $options);
                            $model->Update("users", "password=?","where email = ?", [$hashedPwd, $resetResult['ResetPwdEmail']]);
                            $_SESSION['success'] = true;
                            header('Location: /jelszovaltas?identifier='.$identifier.'&validator='.$token);
                            exit();
                        }
                        else{
                            header('Location: /error?code=403');
                            exit();
                        }
                    }
                    else{
                        $_SESSION['failed'] = true;
                        header('Location: /jelszovaltas?identifier='.$identifier.'&validator='.$token);
                        exit();
                    }
                }
                else{
                    $_SESSION['invalidReset'] = true;
                    header('Location: /jelszovaltas?identifier='.$identifier.'&validator='.$token);
                    exit();
                }
            }
            else{
                header('Location: /jelszovaltas?identifier='.$identifier.'&validator='.$token);
                exit();
            }
        }
        else{
            header('Location: /error?code=400');
            exit();
        }

    }
    $identifier = $_GET['identifier'];
    $token = $_GET['validator'];
    // checks the url parameters ha megpróbálják elérni a urlbe beirva és akkor hibat dob
    if((empty($identifier) || empty($token)) && $_SESSION['failed'] == false){
        $identifier = "";
        $token = "";
        header('Location: /error?code=400');
        exit();
    }
    //Page display
    $title = 'Jelszóváltás';
    $_SESSION['CSRF_Token'] = bin2hex(random_bytes(14));
    require('../private/View/jelszovaltas.view.php');
    unset($_SESSION['pwdError']);
    unset($_SESSION['pwdErrorMatch']);
    unset($_SESSION['pwdErrorMatch']);
    unset($_SESSION['invalidReset']);
    unset($_SESSION['success']);
    unset($_SESSION['failed']);
}
else{
    header('Location: /');
}

