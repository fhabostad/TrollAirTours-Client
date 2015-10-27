<?php
require 'vendor/autoload.php';

$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 4;

$m->HOST = 'smtp.gmail.com';
$m->Username = 'trollairtours@gmail.com';
$m->Password = 'Hallo1234';
$m->SMTPSecure = 'ssl';
$m->Port = 465;

$m->From = 'trollairtours@gmail.com';
$m->FromName = 'Booking';
$m->Password = 'Hallo1234';
$m->addReplyTo('no_reply@trollairtours.no', 'No reply');
$m->addAddress('fhabostad@gmail.com', 'Fredrik');

$m->Subject = 'Confirmation';
$m->Body = 'This is body';
$m->AltBody = 'Alt body';

var_dump($m->send());