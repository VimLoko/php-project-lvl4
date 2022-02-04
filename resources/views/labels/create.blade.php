@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-5">{{ __('ui.forms.add_label_form.form_name') }}</h1>
                {{ Form::model($label, ['route' => 'labels.store']) }}
                    <div class="form-group mb-3">
                        {{ Form::label('name', __('ui.forms.add_label_form.name'))  }}
                        @error('name')
                            {{ Form::text('name', '', ['class' => 'form-control mb-3 is-invalid']) }}
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @else
                            {{ Form::text('name', '', ['class' => 'form-control mb-3']) }}
                        @enderror

                        {{ Form::label('description', __('ui.forms.add_label_form.description'))  }}
                        {{ Form::textarea('description', '', ['class' => 'form-control mb-3', 'rows' => 10, 'cols' => 50]) }}
                    </div>
                    {{ Form::submit(__('ui.forms.add_label_form.btn_create'), ['class' => 'btn btn-primary mt-3']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
