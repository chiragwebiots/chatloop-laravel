<?php

namespace App\Policies;

use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialLinkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->can('admin.social-links.index')) {

            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SocialLink $socialLink)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('admin.social-links.create')) {

            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SocialLink $socialLink)
    {
        if ($user->can('admin.social-links.edit') && 

            $user->id == $socialLink->created_by) {

            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SocialLink $socialLink)
    {
        if ($user->can('admin.social-links.destroy') && 

        $user->id == $socialLink->created_by) {
            
        return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SocialLink $socialLink)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SocialLink $socialLink)
    {
        //
    }
}
