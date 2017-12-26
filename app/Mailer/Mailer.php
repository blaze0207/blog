<?php

namespace App\Mailer;

use Naux\Mail\SendCloudTemplate;
use Illuminate\Support\Facades\Mail;

class Mailer
{
    protected function sendTo($template, $email, $data = [])
    {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message) use ($email) {
            $message->from('hahntest@usedwebtest.com', '有人關注您!!!');
            $message->to($email);
        });
    }
}
