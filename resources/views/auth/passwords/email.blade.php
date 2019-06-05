@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.remem_me')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['method' => 'post', 'routes' => 'password.email']) !!}
                        <div class="form-group row">
                            {!! Form::label('email', trans('auth.email'), [
                                'class' => 'col-md-4 col-form-label text-md-right' 
                            ]) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), [
                                    'class' => 'form-control',
                                    'id'    => 'email',
                                    'required' => 'required',
                                    'autocomplete' => 'email',
                                    'autofocus' => 'autofocus'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('auth.send_pass_rs_link'), [
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
