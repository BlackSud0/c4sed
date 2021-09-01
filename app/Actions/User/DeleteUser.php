<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\DB;
use App\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{

    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        DB::transaction(function () use ($user) {
            $user->forceDelete();
        });
    }

}
