<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$footer__btn = $_POST['footer__btn'];


// Формирование самого письма
$title = "Новое обращение Best Tour Plan";
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'tourplantestmessage@gmail.com'; // Логин на почте
    $mail->Password   = 'tourplan'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('tourplantestmessage@gmail.com', 'Даниил Михайлов', '$footer__btn'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('daniyanii@yandex.ru');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
Header('Location: thankyou.html');


 


$email = $_POST['email'];
$news__btn = $_POST['news__btn'];
$to = 'tourplantestmessage@gmail.com'; // адрес получателя

$news__title = "Новое обращение Best Tour Plan";
$news__body = "
<h2>Новое обращение</h2>
<b>Почта:</b> $email<br><br>
";


$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'tourplantestmessage@gmail.com'; // Логин на почте
    $mail->Password   = 'tourplan'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('tourplantestmessage@gmail.com', 'Даниил Михайлов', '$footer__btn'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('tourplantestmessage@gmail.com'); 

$mail->isHTML(true);
$mail->Subject = $news__title;
$mail->Body = $news__body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
Header('Location: thankyou.html');