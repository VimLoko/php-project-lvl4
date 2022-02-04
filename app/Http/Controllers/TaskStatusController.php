<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Auth\Access\AuthorizationException;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $task_statuses = TaskStatus::paginate(10);
        return view('task_statuses.index', compact('task_statuses'));
    }

    public function create()
    {
        $task_status = new TaskStatus();
        return view('task_statuses.create', compact('task_status'));
    }

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

    public function edit(TaskStatus $taskStatus)
    {
        return view('task_statuses.edit', compact('taskStatus'));
    }

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

    public function destroy(TaskStatus $taskStatus)
    {
        try {
            $this->authorize('delete', $taskStatus);
            $taskStatus->delete();
            flash(__('ui.messages.delete_status_form_success'))->success();
        } catch (AuthorizationException $e) {
            flash(__('ui.messages.delete_status_form_error'))->error();
        } finally {
            return redirect()->route('task_statuses.index');
        }
    }
}
