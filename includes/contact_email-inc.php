<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "database-inc.php";
require_once "functions-inc.php";

require "..\PHPmailer\PHPMailer-master\src\Exception.php";
require "..\PHPmailer\PHPMailer-master\src\PHPMailer.php";
require "..\PHPmailer\PHPMailer-master\src\SMTP.php";


if (isset($_POST["sendMail"]) && $_SESSION["userId"]) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $currentUserId = $_SESSION["userId"];

    $mailPhp = new PHPMailer(true);
    $mailPhp->isSMTP();
    $mailPhp->Host = "smtp.gmail.com";
    $mailPhp->SMTPAuth = true;
    $mailPhp->SMTPSecure = "tls";
    $mailPhp->Port = 587;
    $mailPhp->Username = "mr.porcino71a@gmail.com";
    $mailPhp->Password = "gxnl mteg hdcc pimo";
    $mailPhp->FromName = "Luka";

    $mailPhp->setFrom("mr.porcino71a@gmail.com", $name);

    $mailPhp->addAddress("mr.porcino71a@gmail.com");

    $mailPhp->isHTML(true);

    $mailPhp->Subject = "WebSite Contact Us";
    $mailPhp->Body = $message . "\r\n" . $email;

    $mailPhp->send();


    header("location: ../prva_stran.php?error=MailSent");
    exit();

    
}
else {
    header("location: ../prva_stran.php");
    exit();
}
