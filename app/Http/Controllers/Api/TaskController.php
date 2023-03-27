<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{   
    public function index(Request $request, $userId)
    {
        $tasks = Task::where('assignee', $userId);

        // search keyword with title or description in task
        if ($request->has('search')) {
            $search = $request->query('search');
            $tasks->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }

        // fill follow status in task
        if ($request->has('status')) {
            $status = $request->query('status');
            $tasks->where('status', $status);
        }

        // fill fllow type in task
        if ($request->has('type')) {
            $type = $request->query('type');
            $tasks->where('type', $type);
        }

       
        $tasks = $tasks->get();

        return response()->json([
            'tasks' => $tasks,
        ]);
    }
}
