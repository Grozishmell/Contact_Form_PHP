<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    if(!empty($email) && !empty($message)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $receiver = "grozishmelloww@yandex.ru";
            $subject = "From: $name <$email>";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage: $message\n\nRegards,\n$name";
            $sender = "From: no-reply@yourdomain.com"; // Укажите почту вашего домена
            
            if(mail($receiver, $subject, $body, $sender)){
                echo "Your message has been sent";
            } else {
                error_log("Mail function failed to execute."); // Логирование ошибки
                echo "Sorry, failed to send your message!";
            }
        } else {
            echo "Enter a valid email address!";
        }
    } else {
        echo "Email and message fields are required!";
    }
?>
