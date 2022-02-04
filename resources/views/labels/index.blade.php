@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('flash::message')
                <h1 class="mb-5">{{ __('ui.pages.labels.name_page') }}</h1>
                @auth
                    <a href="{{ route('labels.create') }}" class="btn btn-primary">{{ __('ui.pages.labels.btn_create') }}</a>
                @endif
                <table class="table mt-2">
                    <thead>
                    <tr>
                        <th>{{ __('ui.pages.labels.id') }}</th>
                        <th>{{ __('ui.pages.labels.name') }}</th>
                        <th>{{ __('ui.pages.labels.description') }}</th>
                        @auth
                            <th>{{ __('ui.pages.labels.actions') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($labels as $label)
                            <tr>
                                <td>{{ $label->id }}</td>
                                <td>{{ $label->name }}</td>
                                <td>{{ $label->description }}</td>
                                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                                <td>
                                    @auth
                                        <a class="text-danger text-decoration-none"
                                           href="{{ route('labels.destroy', $label) }}"
                                           data-confirm="{{ __('ui.messages.delete_question')  }}"
                                           data-method="delete">
                                            {{ __('ui.pages.labels.link_delete') }}</a>
                                        <a class="text-decoration-none"
                                           href="{{ route('labels.edit', $label->id) }}">
                                            {{ __('ui.pages.labels.link_edit') }}</a>
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!!  $labels->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
