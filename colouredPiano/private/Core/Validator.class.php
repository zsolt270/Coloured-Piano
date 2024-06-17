<?php

Class Validator extends Model {

    private $username;
    private $email;
    private $pwd;
    private $pwdrepeat;

    function __construct($username="", $email="", $pwd="", $pwdrepeat=""){
        parent::__construct();
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
    }

    function checkLoginInput(){
        $isvalid = true;
        if(empty($this->username)){
            $_SESSION['loginUnameError'] = "Ne hagyja üresen a mezőt!";
            $isvalid = false;
        }
        if(empty($this->pwd)){
            $_SESSION['loginPwdError'] = "Ne hagyja üresen a mezőt!";
            $isvalid = false;
        }
        if($isvalid){
            $result = $this->Read('*','users','where username = ?',[strtolower($this->username)])->fetch();
            if($result){
                if(password_verify($this->pwd, $result['password']) && $result['deleted'] == 0){
                    $_SESSION['loggedin'] = true;
                    $_SESSION["userId"] = $result["id"];
                    $_SESSION["userName"] = htmlspecialchars($result["username"]);
                    return $result;
                }
            }
            $_SESSION['loginUnameError'] = "A felhasználó név vagy jelszó hibás.";
            $_SESSION['loginPwdError'] = "A felhasználó név vagy jelszó hibás.";
        }
    }

    function checkUserName(){
        if(empty($this->username)){
            $_SESSION['unameError'] = "Ne hagyja üresen a mezőt!";
            return false;
        }
        else if($this->Read('username','users','where username = ?',[strtolower($this->username)])->fetch() !== false){
            $_SESSION['unameError'] = "Nem megfelelő felhasználónév!";
            return false;
        }
        return true;
    }

    function checkEmail(){ 
        if(empty($this->email)){
            $_SESSION['emailError']= "Ne hagyja üresen a mezőt!";
            return false;
        }
        else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailError']= "Nem megfelelő email formátum!";
            return false;
        }
        else if($this->Read('email','users','where email=?',[$this->email])->fetch() !== false){
            $_SESSION['emailError'] = "Ez az email már használatban van";
            return false;
        }
        return true;
    }
    
    function checkPwd(){
        if(empty($this->pwd)){
            $_SESSION['pwdError']= "Ne hagyja üresen a mezőt!";
            return false;
        }

        else if(!(strlen($this->pwd) >= 8 && strlen($this->pwd) < 64)){
            $_SESSION['pwdError']= "Nem megfelelő jelsző hossz!";
            return false;
        }
        else if(!(preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])((?=.*\W)|(?=.*_))^[^ ]+$/',$this->pwd))){
            $_SESSION['pwdError']= "Nem megfelelő jelszó formátum!";
            return false;
        }
        return true;
    }

    function checkPwdsMatch(){
        if($this->pwd !== $this->pwdrepeat){
            $_SESSION['pwdErrorMatch'] = "A két jelszó nem egyezik!";
            return false;
        }
        return true;
    }

}