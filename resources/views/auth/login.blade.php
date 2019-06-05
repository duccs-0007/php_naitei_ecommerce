@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.login')</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'routes' => 'login']) !!}
                        @include('common.errors')

                        <div class="form-group row">
                            {!! Form::label('email', trans('auth.email'), [
                                'class' => 'col-md-4 col-form-label text-md-right'
                            ]) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'autocomplete' => 'email',
                                    'autofocus' => 'autofocus'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('auth.password')) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'name'  => 'password',
                                    'required' => 'required',
                                    'autocomplete' => 'current-password',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('remember', old('remember'), [
                                        'class' => 'form-check-input',
                                        'id'    => 'remember',
                                    ]) !!}

                                    {!! Form::label('remember', trans('auth.remem_me'), [
                                        'class'=> 'form-check-label'
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(trans('auth.login'), [
                                    'class' => 'btn btn-primary'
                                ]) !!}

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ ('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
