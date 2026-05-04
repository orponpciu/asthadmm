<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    // Allows only admins to see the "Users" menu in the sidebar
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin'; 
    }

    // Allows only admins to view a specific user's details
    public function view(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    // Allows only admins to create a new user
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Automatically hides the `EditAction` in your UsersTable for non-admins
    public function update(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    // Automatically hides the `DeleteBulkAction` in your UsersTable for non-admins
    public function delete(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }
}