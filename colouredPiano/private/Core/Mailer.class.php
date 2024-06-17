<?php

Class Mailer{
    //the values are deleted on purpose, if you use this code, then you just need to fill them with your own values
    static function sendVMail($email, $vkey){
        $subject= 'Email megerősítés';
        $message= "<p>Az alábbi linkre kattintva erősítheti meg a fiókját, amennyiben ez 2 napon belül nem történik meg a fiókja törlésre kerül! </p>";
        $message.= "<a href='http://localhost/megerosites?vkey={$vkey}'>Email megerősítő link </a>";
        $headers="MIME-Version: 1.0" ."\r\n";
        $headers.="Content-type:text/html;charset=UTF-8"."\r\n";
        $headers.="From: <>"."\r\n"; /*<mail to send from> */
        mail($email, $subject, $message, $headers);
    }

    static function sendRMail($email,$identifier, $token){
        $subject= 'Jelszó csere kérés';
        $message= "<p>Amennyiben ezt nem Ön kérvényezte, nyugodtan hagyja figyelmen kívül ezt az emailt!</p>";
        $message.= "<p>Abban az esetben ha Ön kérvényezte az alábbi linkre kattintva megváltoztathatja a jelszavát.</p>";
        $message.= "<a href='http://localhost/jelszovaltas?identifier={$identifier}&validator={$token}'>Jelszó váltásért kattintson ide!</a>";
        $headers="MIME-Version: 1.0" ."\r\n";
        $headers.="Content-type:text/html;charset=UTF-8"."\r\n";
        $headers.="From: <>"."\r\n";/*<mail to send from> */
        mail($email, $subject, $message, $headers);
    }
    static function sendDMail($email, $key){
        $subject= 'Inaktív fiók törlése';
        $message= "<p>Mivel nem erősítette meg fiókját az emailben kapott megerősítő linken keresztül, az adott idő alatt, kénytelenek voltunk 
        törölni a fiókját.</p>";
        $message.= "<p>Abban az esetben ha visszaszeretné állítani és új megerősítő linket kérne, kattintson az alábbi linkre !</p>";
        $message.= "<a href='http://localhost/fiokujraaktivalas?key={$key}'>Fiók újraaktiválás</a>";
        $headers="MIME-Version: 1.0" ."\r\n";
        $headers.="Content-type:text/html;charset=UTF-8"."\r\n";
        $headers.="From: <>"."\r\n";/*<mail to send from> */
        mail($email, $subject, $message, $headers);
    }
}