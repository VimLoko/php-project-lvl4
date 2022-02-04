<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        $statuses = TaskStatus::all()->pluck('name','id');
        $users = User::all()->pluck('name','id');
        $labels = Label::all()->pluck('name','id');
        return view('tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            $validatedData = $request->only([
                'name',
                'description',
                'status_id',
                'created_by_id',
                'assigned_to_id',
                'labels'
            ]);
            $task = new Task();
            $task->fill($validatedData);
            $task->save();
            $labels = Label::find($validatedData['labels']);
            $task->labels()->attach($labels);
            flash(__('ui.messages.add_task_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.add_task_form_error'))->error();
        } finally {
            return redirect()->route('tasks.index');
        }

//        if ($task->save()) {
//            flash(__('ui.messages.add_task_form_success'))->success();
//        } else {
//            flash(__('ui.messages.add_task_form_error'))->error();
//        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $statuses = TaskStatus::all()->pluck('name','id');
        $users = User::all()->pluck('name','id');
        $labels = Label::all()->pluck('name','id');
        return view('tasks.edit', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        try {
            $validatedData = $request->only([
                'name',
                'description',
                'status_id',
                'created_by_id',
                'assigned_to_id',
                'labels'
            ]);
            $task->fill($validatedData);
            $task->save();
            $labels = Label::find($validatedData['labels']);
            $task->labels()->sync($labels);
            flash(__('ui.messages.edit_task_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.edit_task_form_error'))->error();
        } finally {
            return redirect()->route('tasks.index');
        }

//        $task->fill($validatedData);
//        if ($task->save()) {
//            flash(__('ui.messages.edit_task_form_success'))->success();
//        } else {
//            flash(__('ui.messages.edit_task_form_error'))->error();
//        }
//        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        try {
            $task->delete();
            $task->labels()->detach();
            flash(__('ui.messages.delete_task_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.delete_task_form_error'))->success();
        } finally {
            return redirect()->route('tasks.index');
        }

    }
}
