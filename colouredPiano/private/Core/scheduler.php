<?php
// the file that executes the inactive account deletes, 
require('private\Model\Model.php');
require('private\Core\Mailer.class.php');

$currentDate = date("Y/m/d");
$model = new Model();
$result = $model->Read('*', "users", "where verified = 0 and ? >= expiry_date", [$currentDate])->fetchAll();
foreach($result as $row){
    $model->Update('users', "deleted = 1", "where username = ?", [$row['username']]);
    Mailer::sendDMail($row['email'], $row['vkey']);
}
