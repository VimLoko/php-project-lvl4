<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;

class TaskStatusController extends Controller
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
        $task_statuses = TaskStatus::paginate(5);
        return view('task_statuses.index', compact('task_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task_status = new TaskStatus();
        return view('task_statuses.create', compact('task_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskStatusRequest $request)
    {
        $validatedData = $request->only(['name']);

        $task_status = new TaskStatus();
        $task_status->fill($validatedData);
        if ($task_status->save()) {
            flash(__('ui.messages.add_status_form_success'))->success();
        } else {
            flash(__('ui.messages.add_status_form_error'))->error();
        }

        return redirect()->route('task_statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TaskStatus $taskStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_statuses.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskStatusRequest  $request
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $validatedData = $request->only(['name']);
        $taskStatus->fill($validatedData);
        if ($taskStatus->save()) {
            flash(__('ui.messages.edit_status_form_success'))->success();
        } else {
            flash(__('ui.messages.edit_status_form_error'))->error();
        }
        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->delete()) {
            flash(__('ui.messages.delete_status_form_success'))->success();
        } else {
            flash(__('ui.messages.delete_status_form_error'))->error();
        }
        return redirect()->route('task_statuses.index');
    }
}
