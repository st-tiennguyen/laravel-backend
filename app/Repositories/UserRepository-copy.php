<?php

namespace App\Repositories;

use App\Models\User;

// class UserRepository implements UserRepositoryInterface
// {
//     protected $model;

//     public function __construct(User $model)
//     {
//         $this->model = $model;
//     }

//     public function getAll()
//     {
//         return $this->model->all();
//     }

//     public function getById($id)
//     {
//         return $this->model->findOrFail($id);
//     }

//     public function create(array $attributes)
//     {
    
//         return $this->model->create($attributes);
//     }

//     public function update($id, array $attributes)
//     {
//         echo($attributes);
//         dd($attributes);
//         $user = $this->getById($id);
//         $user->fill($attributes);
//         $user->save();
//         return $user;
//     }

//     public function delete($id)
//     {
//         //$user = $this->getById($id);
//         $user=$this->model->find($id);
       
//         if($user){
//             $user->delete();
//             return json([
//                 'status' => 'success',
//                 'message' => 'User deleted successfully'
//             ]);
//         }
//             return json([
//                 'status' => 'error',
//                 'message' => 'User not found'
//             ], 404);   
//     }
// }
