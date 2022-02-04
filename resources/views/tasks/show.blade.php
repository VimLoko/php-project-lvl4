@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-5">
                    {{ __('ui.forms.view_task_form.form_name') }}: {{ $task->name }}
                    @auth
                        <a href="{{ route('tasks.edit', $task) }}">⚙</a>
                    @endauth
                </h1>
                <p>{{ __('ui.forms.view_task_form.name') }}: {{ $task->name }}</p>
                <p>{{ __('ui.forms.view_task_form.status') }}: {{ $task->status->name }}</p>
                <p>{{ __('ui.forms.view_task_form.description') }}: {{ $task->description }}</p>
                @if($task->labels->count() > 0)

                    <p>
                        {{ __('ui.forms.view_task_form.labels') }}:
                        <ul>
                        @foreach($task->labels as $label)
                            <li>{{$label->name}}</li>
                        @endforeach
                        </ul>
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
