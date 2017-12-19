<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Naux\Mail\SendCloudTemplate;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'avatar', 'confirmation_token'];
    protected $hidden = ['password', 'remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $data = ['url' => url('password/reset', $token)];
        $template = new SendCloudTemplate('reset_password', $data);

        Mail::raw($template, function ($message) {
            $message->from('hahntest@usedwebtest.com', 'Reset your password!!!');
            $message->to($this->email);
        });
    }
}
