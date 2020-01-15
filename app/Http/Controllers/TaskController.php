<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth'); //bắt buộc khi sử dụng phải đăng nhập
    }

    public function index(Request $request)
    {
        dd('here');
        return response()->json(Task::all());
    }
    public function store(Request $request)
    {
        if ($request->user()->can('create-tasks')) {
            $task = new Task();
            $task->content = $request->input('content');
            $task->save();

            return response()->json($task);
        }

        return response([
            'status' => false,
            'message' => 'You don\'t have permission to create task!'
        ], 200);
    }
    public function destroy(Request $request, $id)
    {
        if ($request->user()->can('delete-tasks')) {
            $task = Task::find($id);
            $task->delete();
            return response([
                'status' => true,
            ], 200);
        }

        return response([
            'status' => false,
            'message' => 'You don\'t have permission to delete task!'
        ], 200);
    }
}