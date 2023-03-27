<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model,Task $task)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data):User
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }

    public function update($user,array $data):bool
    {   
        $user->update($data);
        return $user->save();
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function findUserWithTasks($id): ?User
    {   
     
        $user= User::with('tasks')->find($id);
        return $user;
    }
}
