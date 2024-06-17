<?php
if(isset($_GET["key"])){
    $key = $_GET['key'] ;
    $model = new Model();
    $result = $model->Read('*', "users", "where vkey = ?", [$key])->fetch();
    if($result){
        $vkey= md5(bin2hex(random_bytes(32)).$result['username']);
        $expiry_date = date("Y/m/d",time() + 172800);
        $model->Update("users", "deleted = 0, vkey = ?, expiry_date = ?", "where username = ?", [$vkey, $expiry_date, $result['username']]);
        Mailer::sendVMail($result['email'],$vkey);
    }
    else{
        header('Location: /error?code=400');
        exit();
    }
}
header('Location: /');
exit();
