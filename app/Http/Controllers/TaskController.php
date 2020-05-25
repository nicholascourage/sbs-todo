<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;
use App\Notifications\TaskNotification;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $tasks;


    public function __construct( TaskRepository $tasks ){

        $this->middleware('auth');

        $this->tasks = $tasks;

    }

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user())->where('status', 'doing'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
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
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            
            'name' => $request->name,
            'description'=> $request->description,
            'status' => $request->status
        
        ]);
        
        $details = [
            'subject'=>'A new task has been created',
            'body' => 'A new task "' . $request->name . '" has been created',
        ];

        Auth::user()->notify(new TaskNotification($details));

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $task = Task::find($id);

        $task->name = $request->name;

        $task->description = $request->description;

        $task->status = $request->status;

        $task->save();

        if($task->status == 'completed'){

            $details = [
                'subject'=>'A task has been completed',
                'body' => 'Task "' . $request->name . '" has been completed',
            ];
    
            Auth::user()->notify(new TaskNotification($details));

        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
