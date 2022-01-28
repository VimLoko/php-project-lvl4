@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('flash::message')
                <h1 class="mb-5">{{ __('ui.pages.task_statuses.name_page') }}</h1>
                @auth
                    <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">{{ __('ui.pages.task_statuses.btn_create') }}</a>
                @endif
                <table class="table mt-2">
                    <thead>
                    <tr>
                        <th>{{ __('ui.pages.task_statuses.id') }}</th>
                        <th>{{ __('ui.pages.task_statuses.name') }}</th>
                        <th>{{ __('ui.pages.task_statuses.created_at') }}</th>
                        @auth
                            <th>{{ __('ui.pages.task_statuses.actions') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($task_statuses as $task_status)
                            <tr>
                                <td>{{ $task_status->id }}</td>
                                <td>{{ $task_status->name }}</td>
                                <td>{{ $task_status->created_at->format('d.m.Y') }}</td>
                                <td>
                                    @auth
                                        <a class="text-danger text-decoration-none"
                                           href="{{ route('task_statuses.destroy', $task_status) }}"
                                           data-confirm="{{ __('ui.messages.delete_question')  }}"
                                           data-method="delete">
                                            {{ __('ui.pages.task_statuses.link_delete') }}</a>
                                        <a class="text-decoration-none"
                                           href="{{ route('task_statuses.edit', $task_status->id) }}">
                                            {{ __('ui.pages.task_statuses.link_edit') }}</a>
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!!  $task_statuses->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
