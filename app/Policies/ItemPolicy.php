<?php

namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

//    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function destroy(User $user, Item $item)
    {
        return $user->id === $item->user_id;
    }
}
