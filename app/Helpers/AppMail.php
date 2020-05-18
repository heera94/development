<?php

namespace App\Helpers;
use App\Jobs\MailServices;

class AppMail 
{


    public static function sendMail($mailData, $delay = '')
    {
        $dispatch = dispatch(new MailServices([

            'mailClass' => $mailData['mailClass'],
            'mailTo' => $mailData['mailTo'],
            'mailData' => $mailData['mailData']

        ]));

        if($delay) {
            $dispatch->delay(now()->addMinutes($delay));
        }
    }


}



?>