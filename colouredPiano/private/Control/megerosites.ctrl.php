<?php

if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];
    $model = new Model();
    $result = $model->Read('verified, vkey','users','where vkey = ? and verified = 0 and deleted = 0 LIMIT 1',[$vkey])->fetch();
    if($result){
        $model->Update('users', 'verified=1', "where vkey = ?",[$vkey]);
        $valid = true;
        $title="Sikeres fiók megerősítés";
    }
    else{
        $valid = false;
        $title="Sikertelen fiók megerősítés";
    }
    require('../private/View/verify.view.php');
}

else{
    header('Location: /');
}