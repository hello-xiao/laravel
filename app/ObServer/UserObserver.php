<?php


namespace App\ObServer;



use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user)
    {
        $user->email_token = Str::random(10);
        $user->email_active = false;

    }
}
