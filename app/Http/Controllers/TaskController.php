<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
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
        return view('tasks.index', [
            'tasks' => $this->tasks->getTasksList($request->user()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tasks.create', [
            'tasks' => $this->tasks->getTasksList($request->user()),
        ]);
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
            'desc' => 'required|min:10|max:2000',
            'duedate' => 'required',
        ]);
        $request->user()->tasks()->create([
            'name' => $request->name,
            'desc' => $request->desc,
            'duedate' => $request->duedate
        ]);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return view('tasks.show', [
            'task' => $this->tasks->getSingleTask($request->user(), $id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view('tasks.edit', [
            'task' => $this->tasks->getSingleTask($request->user(), $id),
        ]);
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
            'desc' => 'required|min:10|max:2000',
            'duedate' => 'required',
        ]);
        $this->tasks->getSingleTask($request->user(), $id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'duedate' => $request->duedate,
            'completed' => $request->completed
        ]);
        return redirect()->route('tasks.index');
    }

    /**
     * Change the resource's status.
     */
    public function completed(Request $request, $id)
    {
        $task = $this->tasks->getSingleTask($request->user(), $id);

        if ($task->completed == false)
        {
            $task->completed = true;
        }
        else
        {
            $task->completed = false;
        }


        $task->update(['completed' => $task->completed]);
        return redirect()->route('tasks.index')->with('success', 'Статус задачи изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
