<?php

if(!isset($_SESSION['loggedin'])){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['csrfToken']) && $_POST['csrfToken'] == $_SESSION['CSRF_Token']){
      $validator = new validator($_POST['username'],$_POST['email'],$_POST['pwd'],$_POST['pwdrepeat']);
      // checking the username, email, pwd
      $uChecked = $validator->checkUserName();
      $eChecked = $validator->checkEmail();
      $pChecked = $validator->checkPwd();
      $pmChecked = $validator->checkPwdsMatch();
      
      if($uChecked == true && $eChecked == true && $pChecked == true && $pmChecked == true ){ 
        // if no error occured, then next steps are the vkey generating, password hashing, expirydate generating and the new user creating in the db
          $vkey= md5(bin2hex(random_bytes(32)).$_POST['username']);
          $options = [ 'cost' => 12];
          $hashedPwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT, $options);
          $expiry_date = date("Y/m/d",time() + 172800); // 2 days
          $validator->Create('users','username, password, email, vkey, expiry_date','?, ?, ?, ?, ?',[
              strtolower($_POST['username']),$hashedPwd,$_POST['email'],$vkey,$expiry_date
          ]);
          $_SESSION['success']=true;
          Mailer::sendVMail($_POST['email'],$vkey);
      }
      header('Location: /regisztracio');
    }
    else{
      header('Location: /error?code=400');
    }
  }
else{
  //page display
$title = 'Regisztráció';
$_SESSION['CSRF_Token'] = bin2hex(random_bytes(14));
require('../private/View/registration.view.php');
unset($_SESSION['unameError']);
unset($_SESSION['emailError']);
unset($_SESSION['pwdError']);
unset($_SESSION['pwdErrorMatch']);
unset($_SESSION['success']);
}
}
else{
  header('Location: /');
}