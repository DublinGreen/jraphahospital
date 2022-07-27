<?php

class Mailer {

    public function __construct($to = "greendublin007@gmail.com", $subject = "From Site", $message = "Testing 123", $header = "From : greendublin007@gmail.com") {
        mail($to, $subject, $message, $additional_headers);
    }

}

?>
