<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::with([
            'items' => function ($query) use ($request) {
                //Filter todo items - Administrators can see deleted items
                if ($request->user()->is_admin) {
                    $query->withTrashed();
                }
            },
            'user',
        ]);
        
        //Filter todos - Administrators can see all users to-do items and deleted todos
        if ($request->user()->is_admin) {
            $todos->withTrashed();
        } else {
            $todos->where('user_id', $request->user()->id);
        }
        
        //Order todos
        $todos->orderBy('deleted_at')->latest();

        return view('todos', [
            'todos' => $todos->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        //Store todo related with the current user
        $todo = Auth::user()->todos()->create($data);

        return redirect()->back()->withSuccess('Great! To-do stored!');
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        if (! $todo->belongsToUser()) {
            abort(403, 'Forbidden');
        }

        $todo = $todo->update($data);

        return redirect()->back()->withSuccess('To-do updated!');
    }

    public function delete(Request $request, Todo $todo)
    {
        if (! $todo->belongsToUser()) {
            abort(403, 'Forbidden');
        }

        $todo->delete();

        return redirect()->back()->withSuccess('To-do deleted!');
    }
}
