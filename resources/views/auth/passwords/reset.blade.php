@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.remem_me')</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'routes' => 'password.update']) !!}
                        @include('common.errors')
                        {!! Form::hidden('token', $token) !!}

                        <div class="form-group row">
                            {!! Form::label('email', trans('auth.email'), [
                                'class' => 'col-md-4 col-form-label text-md-right'
                            ]) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', $email ?? old('email'), [
                                    'id' => 'email',
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'autocomplete' => 'email',
                                    'autofocus'
                                ]) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('auth.password'), [
                                'class' => 'col-md-4 col-form-label text-md-right'
                            ]) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'autocomplete' => 'new-password'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password-confirm', trans('auth.comfirm_pass'), [
                                'class' => 'col-md-4 col-form-label text-md-right'
                            ]) !!}

                            <div class="col-md-6">
                                {!! Form::password('password-confirmation', [
                                    'class' => 'form-control',
                                    'id'    => 'password-confirm',
                                    'required' => 'required',
                                    'autocomplete' => 'new-password'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('auth.reset_pass'), [
                                    'class' => 'btn btn-primary'
                                ]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
