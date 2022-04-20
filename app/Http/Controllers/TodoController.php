<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    // No need for table name ($table), Laravel automatically supports it through the Controller name and Model. 
    // No need for primary key ($primaryKey), Laravel will automatically generate it. 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        // Log::debug("listing todos", ["log" -> $todos.toArray()]);
        return $todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function create($todo)
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Could add validation for the data. Ex.- $request->has('title')
        // Log::debug("creating new resource", ["log" -> $request->toArray()]);
        $newTodo = new Todo();
        $newTodo->title = $request->input('title');
        $newTodo->description = $request->input('description');
        $newTodo->save();
        return $newTodo;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todoId 
     * @return \Illuminate\Http\Response
     */
    public function show(string $todoId)
    {
        $todo = Todo::find($todoId);
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // This should probably spread fillable data.
        $todo = Todo::find($todo->id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->completed = $request->completed;
        $todo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo = Todo::find($todo->id);
        $todo->delete();
        // Can also call Todo::destroy($todo->id); or Todo::destroy($todoId);
    }
}
