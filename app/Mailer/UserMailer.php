<?php

namespace App\Mailer;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserMailer extends Mailer
{
    public function followNotifyEmail($email)
    {
        $data = ['url' => 'http://localhost:8000', 'name' => Auth::guard('api')->user()->name];

        $this->sendTo('new_user_follow', $email, $data);
    }

    public function passwordReset($email, $token)
    {
        $data = ['url' => url('password/reset', $token)];
        $this->sendTo('reset_password', $email, $data);
    }

    public function welcome(User $user)
    {
        $data = [
          'url' => route('email.verify', ['token' => $user->confirmation_token]),
          'name' => $user->name
        ];

        $this->sendTo('verify_email', $user->email, $data);
    }
}
