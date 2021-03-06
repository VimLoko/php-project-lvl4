<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }


    public function index(Request $request)
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            ])
            ->orderBy('created_at', 'ASC')
            ->paginate(10);
        $filter = $request->filter ?? null;
        $statuses = TaskStatus::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        return view('tasks.index', compact('tasks', 'statuses', 'users', 'filter'));
    }

    public function create()
    {
        $task = new Task();
        $statuses = TaskStatus::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $labels = Label::pluck('name', 'id')->all();
        return view('tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            $validatedData = $request->only([
                'name',
                'description',
                'status_id',
                'assigned_to_id',
                'labels'
            ]);
            $task = Auth::user()->taskAuthor()->make();
            $task->fill($validatedData);
            $task->save();
            if (array_key_exists('labels', $validatedData)) {
                $labels = Label::find($validatedData['labels']);
                $task->labels()->attach($labels);
            }
            flash(__('ui.messages.add_task_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.add_task_form_error'))->error();
        } finally {
            return redirect()->route('tasks.index');
        }
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $statuses = TaskStatus::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $labels = Label::pluck('name', 'id')->all();
        return view('tasks.edit', compact('task', 'statuses', 'users', 'labels'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        try {
            $validatedData = $request->only([
                'name',
                'description',
                'status_id',
                'assigned_to_id',
                'labels'
            ]);
            $task->fill($validatedData);
            $task->save();
            if (array_key_exists('labels', $validatedData)) {
                $labels = Label::find($validatedData['labels']);
                $task->labels()->sync($labels);
            }
            flash(__('ui.messages.edit_task_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.edit_task_form_error'))->error();
        } finally {
            return redirect()->route('tasks.index');
        }
    }

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
