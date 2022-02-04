@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-5">{{ __('ui.forms.edit_task_form.form_name') }}</h1>
                {{ Form::model($task, ['route' => ['tasks.update', $task], 'method' => 'PATCH']) }}
                <div class="form-group mb-3">
                    {{ Form::label('name', __('ui.forms.edit_task_form.name'))  }}
                    @error('name')
                    {{ Form::text('name', $task->name, ['class' => 'form-control mb-3 is-invalid']) }}
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @else
                        {{ Form::text('name', $task->name, ['class' => 'form-control mb-3']) }}
                    @enderror

                    {{ Form::label('description', __('ui.forms.edit_task_form.description'))  }}
                    {{ Form::textarea('description', $task->description, ['class' => 'form-control mb-3', 'rows' => 10, 'cols' => 50]) }}

                    {{ Form::label('status_id', __('ui.forms.edit_task_form.status'))  }}
                    @error('status_id')
                        {{ Form::select('status_id', $statuses, $task->status_id, ['class' => 'form-control mb-3 is-invalid']) }}
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        {{ Form::select('status_id', $statuses, $task->status_id, ['class' => 'form-control mb-3']) }}
                    @enderror

                    {{ Form::label('assigned_to_id', __('ui.forms.edit_task_form.assigned_to'))  }}
                    @error('assigned_to_id')
                        {{ Form::select('assigned_to_id', $users, $task->assigned_to_id, ['class' => 'form-control mb-3 is-invalid']) }}
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        {{ Form::select('assigned_to_id', $users, $task->assigned_to_id, ['class' => 'form-control mb-3']) }}
                    @enderror

                    {{ Form::label('labels', __('ui.forms.add_task_form.labels'))  }}
                    @error('assigned_to_id')
                        {{ Form::select('labels[]', $labels, $task->labels, ['class' => 'form-control mb-3 is-invalid', 'placeholder' => '', 'multiple']) }}
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        {{ Form::select('labels[]', $labels, $task->labels, ['class' => 'form-control mb-3', 'placeholder' => '', 'multiple']) }}
                    @enderror
                </div>
                {{ Form::submit(__('ui.forms.edit_task_form.btn_update'), ['class' => 'btn btn-primary mt-3']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
