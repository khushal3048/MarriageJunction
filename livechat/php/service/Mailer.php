<?php

class Mailer extends Service
{
    public function sendMessage($from, $to, $subject, $body)
    {
        $headers = "From: $from\r\nReply-To: $from\r\n";
        
        @mail($to, $subject, $body, $headers);
    }
}

?>
