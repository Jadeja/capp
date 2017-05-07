<?php

namespace App\Repositories;

use App\User;
use App\Contact;

class ContactsRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Contact::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
