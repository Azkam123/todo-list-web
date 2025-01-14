<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = TodoList::all();
        return view('welcome', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => 'required|string|max:50'
        ]);

        TodoList::create([
            'note' => $data['note'],
        ]);
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoList $todoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = TodoList::findOrFail($id);
        return view('edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'note' => 'required|string|max:50'
        ]);

        $note = $request->only(['note']);
        $todoList = TodoList::findOrFail($id);
        $todoList->update($note);

        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoList $todoList, string $id)
    {
        $note = $todoList->findOrFail($id);
        $note->delete();
        return redirect()->route('todo.index');
    }
}
