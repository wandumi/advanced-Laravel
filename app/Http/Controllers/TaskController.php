<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->user()->tasks()->orderBy('created_at','asc')->get());
        $tasks = $request->user()->tasks()->orderBy('created_at','desc')->get();
        // $tasks = $this->tasks()->forUser($request->user());

        // return view('admin.tasks.index',[
        //     'tasks' => $this->task()->forUser($request->user()),
        // ]);

          return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //dd($request->user()->tasks()->get());

        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        //Set up the relationship here
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, task $task)
    {
        //dd($task);
//        if($task->user_id !== $request->user()-id){
//            abort(401);
//        }

        //use policies
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect()->back();
    }
}
