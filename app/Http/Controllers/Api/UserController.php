<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;
use App\Repositories\UserRepositoryInterface;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
    
        $this->userRepository = $userRepository;
    }
   
    public function index()
    {
        
        $users = $this->userRepository->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }

    public function show($id)
    {   
       $user=$this->userRepository->getById($id);

       if ($user) {
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'User not found'
        ], 404);
     
    }

    public function store(UserRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $user = $this->userRepository->create($data);

        return response()->json(['status' => 'success','data' => $user],201);
        
    }

    public function update(Request $request, $id)
    {   
        $user=$this->userRepository->getById($id);
        if(!$user){
            return response()->json([
            'status' => 'error',
            'message' => 'User not found'], 
            404);
        }

        $data = $request->only(['name', 'email', 'password']);
        $this->userRepository->update($user, $data);
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully']);
    }
    
    public function destroy($id)
    {
        $user=$this->userRepository->getById($id);
        if(!$user){
            return response()->json([
            'status' => 'error',
            'message' => 'User not found'], 
            404);
        }
        $this->userRepository->delete($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully']);
    }

    public function showTasks($id)
    {   
        $user = $this->userRepository->findUserWithTasks($id);

        if (!$user) {
            return response()->json([
            'status' => 'error',
            'message' => 'User not found'], 404);
        }

        return response()->json($user);
        
    }
    
    public function responseData($user):callable
    {
        if ($user) {
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        }
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
    }
}
