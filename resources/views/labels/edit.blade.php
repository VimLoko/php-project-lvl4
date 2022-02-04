@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-5">{{ __('ui.forms.edit_label_form.form_name') }}</h1>
                {{ Form::model($label, ['route' => ['labels.update', $label], 'method' => 'PATCH']) }}
                    <div class="form-group mb-3">
                        {{ Form::label('name', __('ui.forms.edit_label_form.name'))  }}
                        @error('name')
                            {{ Form::text('name', $label->name, ['class' => 'form-control is-invalid mb-3']) }}
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @else
                            {{ Form::text('name', $label->name, ['class' => 'form-control mb-3']) }}
                        @enderror
                            {{ Form::label('description', __('ui.forms.edit_label_form.description'))  }}
                            {{ Form::textarea('description', $label->description, ['class' => 'form-control mb-3', 'rows' => 10, 'cols' => 50]) }}
                    </div>
                    {{ Form::submit(__('ui.forms.edit_label_form.btn_update'), ['class' => 'btn btn-primary mt-3']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
