<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ApartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny($user)
    {
        return Gate::any(['viewApartment', 'manageApartment'], $user);
    }

    public function view($user, $post)
    {
        return Gate::any(['viewApartment', 'manageApartment'], $user, $post);
    }

    public function create($user)
    {
        return $user->can('manageApartment');
    }

    public function update($user, $post)
    {
        return $user->can('manageApartment', $post);
    }

    public function delete($user, $post)
    {
        return $user->can('manageApartment', $post);
    }

    public function restore($user, $post)
    {
        return $user->can('manageApartment', $post);
    }

    public function forceDelete($user, $post)
    {
        return $user->can('manageApartment', $post);
    }
}
