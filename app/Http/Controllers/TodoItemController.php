<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    public function store(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        if (! $todo->belongsToUser()) {
            abort(403, 'Forbidden');
        }
        
        $todo->items()->create($data);

        return redirect()->back()->withSuccess('Item stored!');
    }

    public function update(Request $request, Todo $todo, TodoItem $todo_item)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);
        
        if (! $todo->belongsToUser()) {
            abort(403, 'Forbidden');
        }

        //Check if todo_item belongs to the requested todo
        if ($todo_item->todo_id != $todo->id) {
            abort(400, 'Bad Request');
        }

        $todo_item->update($data);

        return redirect()->back()->withSuccess('Item updated!');
    }

    public function toggle(Request $request, Todo $todo, TodoItem $todo_item)
    {
        if (! $todo->belongsToUser()) {
            abort(403, 'Forbidden');
        }

        //Check if todo_item belongs to the requested todo
        if ($todo_item->todo_id != $todo->id) {
            abort(400, 'Bad Request');
        }

        $todo_item->done_at = $todo_item->done_at ? null : now();
        $todo_item->save();

        return redirect()->back()->withSuccess('Item updated!');
    }

    public function delete(Request $request, Todo $todo, TodoItem $todo_item)
    {
        
        if (! $todo->belongsToUser()) {
            abort(403, 'Forbidden');
        }

        //Check if todo_item belongs to the requested todo
        if ($todo_item->todo_id != $todo->id) {
            abort(400, 'Bad Request');
        }

        $todo_item->delete();

        return redirect()->back()->withSuccess('Item deleted!');
    }
}
