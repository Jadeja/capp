<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Contact;

class ContactPolicy
{
    use HandlesAuthorization;



    public function destroy(User $user, Contact $ct)
    {
        return $user->id === $ct->user_id;
    }    
}
