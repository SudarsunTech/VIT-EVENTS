<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT Chennai Events</title>
    <?php require 'utils/styles.php'; ?>
    <style>
        hr.blueline {
        border: 10px solid black;
        border-radius: 5px;
        }
        .done{
            color: green;
        }
        .not{
            color: red;
        }
    </style>
</head>
<body>
<?php require 'utils/header.php'; ?>
  <hr class="blueline">
  <div>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once __DIR__ . '/PHPMailer/src/Exception.php';
    require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
    require_once __DIR__ . '/PHPMailer/src/SMTP.php';

    if(isset($_POST['submit'])){

        $mail = new PHPMailer(true);
        $email = $_POST['mail'];
        $reg = $_POST['reg'];
        $message = $_POST['sugg'];

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = 'vitevents.feedback@gmail.com';
            $mail->Password = 'xvbgvdbjqvznruqh';

            $mail->setFrom('vitevents.feedback@gmail.com', 'VIT EVENTS');
            $mail->addAddress('vitevents.feedback@gmail.com', 'Friend 1');
            
            $mail->IsHTML(true);
            $mail->Subject = "Feedback or Suggestion";
            $mail->Body = "Email: $email<br>RegNo: $reg<br>Message Received: $message<br>";
            
            $mail->send();
            echo "<center><h1 class='done'>Thank You for Feedback/Suggestion.</h1></center>";
        } catch (Exception $e) {
            echo "<center><h2 class='not'>Couldn't Send Your Message :( Try Again";
        }
    }
    ?>
</div>
<hr class="blueline">
</body>

 <?php require 'utils/footer.php'; ?>
</html>
