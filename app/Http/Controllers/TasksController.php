<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->has('image')){
            $image = $request->file('image');
            $name = mt_rand(1, 1000000) . mt_rand(1, 1000000) . mt_rand(1, 1000000) . '.' . $image->getClientOriginalExtension();
            $image->move('images', $name);
}

        $slug = Str::slug($request->title);
        try{
            $task = Task::create(['title' => $request->title, 'slug' => $slug, 'description' => $request->description, 'image' => $request->image]);
        } catch(Exception $exception){
            return redirect('tasks')->with('error', 'Utworzenie zadania nie powiodło się');
        }
        return redirect('tasks')->with('success', 'Zadanie dodano');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $task = Task::where('slug',$slug)->firstOrFail();
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            $task->update($request->all());
        } catch(Exception $exception){
echo $exception->message;
        }
        return redirect('tasks')->with('success', 'Edycja zakończona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
