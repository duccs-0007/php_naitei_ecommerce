@extends('layouts.app')

@section('title', trans('header.login'))

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>@lang('header.login')</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">@lang('header.home')<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('login') }}">@lang('header.login')</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
        <!-- End Banner Area -->

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>@lang('content.newuser?')</h4>
                            <p>@lang('content.advances')</p>
                            <a class="primary-btn" href="{{ route('register')}}">@lang('content.create_account')</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>@lang('content.login_now')</h3>
                        {!! Form::open(['method' => 'POST', 'route' => 'login', 'id' => 'contactForm', 'novalidate' => 'novalidate', 'class' => 'row login_form']) !!}
                            <div class="col-md-12 form-group">
                                @include('common.errors')
                            </div>
                            
                            <div class="col-md-12 form-group">
                                {!! Form::email('email', old('email'), [
                                    'id' => 'email', 
                                    'placeholder' => trans('auth.email'), 
                                    'required' => 'required', 
                                    'autocomplete' => 'email', 
                                    'class' => 'form-control'
                                ]) !!}
                            </div>

                            <div class="col-md-12 form-group">
                                {!! Form::password('password', [
                                    'id' => 'password', 
                                    'placeholder' => trans('auth.password'), 
                                    'required' => 'required', 
                                    'autocomplete' => 'current-password', 
                                    'class' => 'form-control'
                                ]) !!}
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    {!! Form::checkbox('remember', old('remember'), ['id' => 'remember', 'class' => 'form-check-input']) !!}
                                    {!! Form::label('remember', trans('auth.remem_me'), ['class' => 'form-check-label']) !!}
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                {!! Form::submit(trans('auth.login'), ['class' => 'primary-btn']) !!}
                                
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('auth.forgot_password')
                                    </a>
                                @endif
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
