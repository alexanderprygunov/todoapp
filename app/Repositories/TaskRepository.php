<?php

namespace App\Repositories;

use App\User;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getTasksList(User $user)
    {
        return $user->tasks()

            ->orderBy('completed', 'asc')
            ->orderBy('duedate', 'asc')
            ->get();
    }
    /**
     * Get a single task for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getSingleTask(User $user, $id)
    {
        return $user->tasks()
            ->findOrFail($id);
    }

}