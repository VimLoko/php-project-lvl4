@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
                @include('flash::message')
                <h1 class="mb-5">{{ __('ui.pages.tasks.name_page') }}</h1>
                <div>
                    {!! Form::open(['url' => route('tasks.index'), 'method' => 'get']) !!}
                    <div class="row g-1">
                        <div class="col">
                            {{old('filter[status_id]')}}
                        {!! Form::select('filter[status_id]', $statuses, $filter['status_id'] ?? null, ['class' => 'form-select me-2', 'placeholder' => __('ui.pages.tasks.status')]) !!}
                        </div>
                        <div class="col">
                            {!! Form::select('filter[created_by_id]', $users, $filter['created_by_id'] ?? null, ['class' => 'form-select me-2', 'placeholder' => __('ui.pages.tasks.author')]) !!}
                        </div>
                        <div class="col">
                            {!! Form::select('filter[assigned_to_id]', $users, $filter['assigned_to_id'] ?? null, ['class' => 'form-select me-2', 'placeholder' => __('ui.pages.tasks.assigned_to')]) !!}
                        </div>
                        <div class="col">
                            {!! Form::submit(__('ui.pages.tasks.btn_apply'), ['class' => 'btn btn-outline-primary me-2']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                @auth
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">{{ __('ui.pages.tasks.btn_create') }}</a>
                @endif
                <table class="table mt-2">
                    <thead>
                    <tr>
                        <th>{{ __('ui.pages.tasks.id') }}</th>
                        <th>{{ __('ui.pages.tasks.status') }}</th>
                        <th>{{ __('ui.pages.tasks.name') }}</th>
                        <th>{{ __('ui.pages.tasks.author') }}</th>
                        <th>{{ __('ui.pages.tasks.assigned_to') }}</th>
                        <th>{{ __('ui.pages.tasks.created_at') }}</th>
                        @auth
                            <th>{{ __('ui.pages.task_statuses.actions') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->status->name }}</td>
                                <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                                <td>{{ $task->createdBy->name }}</td>
                                <td>{{ $task->assignedTo->name }}</td>
                                <td>{{ $task->created_at->format('d.m.Y') }}</td>
                                <td>
                                    @can('delete', $task)
                                        <a class="text-danger text-decoration-none"
                                           href="{{ route('tasks.destroy', $task) }}"
                                           data-confirm="{{ __('ui.messages.delete_question')  }}"
                                           data-method="delete">
                                            {{ __('ui.pages.tasks.link_delete') }}</a>
                                    @endcan
                                    @auth
                                        <a class="text-decoration-none"
                                           href="{{ route('tasks.edit', $task->id) }}">
                                            {{ __('ui.pages.tasks.link_edit') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!!  $tasks->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
