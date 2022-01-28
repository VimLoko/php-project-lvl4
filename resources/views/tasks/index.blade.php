@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('flash::message')
                <h1 class="mb-5">{{ __('ui.pages.tasks.name_page') }}</h1>
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
