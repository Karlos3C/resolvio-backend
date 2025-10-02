<?php

namespace App\Policies\Ticket;

use App\Models\User;
use App\Models\Ticket\ReplyComment;
use Illuminate\Auth\Access\Response;

class ReplyCommentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view replies');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReplyComment $replyComment): bool
    {
        return $user->hasPermissionTo('view replies');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create replies');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReplyComment $replyComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReplyComment $replyComment): bool
    {
        return $user->hasPermissionTo('delete replies') || $user->id === $replyComment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ReplyComment $replyComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ReplyComment $replyComment): bool
    {
        return false;
    }
}
