@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-5">{{ __('ui.forms.edit_status_form.form_name') }}</h1>
                {{ Form::model($taskStatus, ['route' => ['task_statuses.update', $taskStatus], 'method' => 'PATCH']) }}
                    <div class="form-group mb-3">
                        {{ Form::label('name', __('ui.forms.edit_status_form.name'))  }}
                        @error('name')
                            {{ Form::text('name', $taskStatus->name, ['class' => 'form-control is-invalid']) }}
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @else
                            {{ Form::text('name', $taskStatus->name, ['class' => 'form-control']) }}
                        @enderror
                    </div>
                    {{ Form::submit(__('ui.forms.edit_status_form.btn_update'), ['class' => 'btn btn-primary mt-3']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
