<?php
$title = 'Zongora oldal';
$model = new Model();
$result;
if(isset($_SESSION['loggedin'])){
    //getting the current user for the verified check
    $result = $model->Read('*', 'users', "where username = ?", [$_SESSION['userName']])->fetch();
    if($result["verified"] == 1){
        $_SESSION['verified'] = true;
        // if the user sent an GET request with the prev or next song button
        if(isset($_GET['dal_id'])){
            $dalID = $_GET['dal_id'];
            //checking if there is a song in db with the given song id and fetching it
            $result = $model->Read('*', 'songs', "where song_id= ?", [$dalID])->fetch();
            if($result){
                // if exists then updates the current song id colummn for the user
                $model->Update('users', "song_id= ?", "where id= {$_SESSION['userId']}", [$dalID]);
                // sending back the data from the song
                echo json_encode($result);
                exit();
            }
            else{
                // error respond if not
                http_response_code(404);
            }
        }
        // fetching and saving the current song data for the first display
        $songID = $model->Read('song_id', 'users', "where id= ?", [$_SESSION["userId"]])->fetch();
        $songDataResults = $model->Read('*', 'songs', "where song_id= ?", [$songID["song_id"]])->fetch();
        $_SESSION["songId"] = $songDataResults["song_id"];
        $_SESSION["songTitle"] = $songDataResults["song_title"];
        $_SESSION["songSheetPath"] = $songDataResults["song_sheet_path"];
        $_SESSION["songFilePath"] = $songDataResults["song_file_path"];
    }
    else{
        // session variable for the not verified display
        $_SESSION['verified'] = false;
    }
    // if the user clicked on the "resend the verification mail"
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $vkey=$result['vkey'];
        Mailer::sendVMail($result['email'],$vkey);
        //for the successful resend display
        $_SESSION['success']=true;
    }
}

require('../private/View/zongora.view.php');
unset($_SESSION['success']);