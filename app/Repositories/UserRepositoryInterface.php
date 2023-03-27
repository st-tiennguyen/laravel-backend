<?php

namespace App\Repositories;

use App\Models\User;
use App\Http\Requests\UserRequest;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data): User;
    public function update(User $user, array $data): bool;
    public function delete(User $user):bool;
    public function findUserWithTasks($id):?User;
}
