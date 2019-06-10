@extends('layouts.app')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>@lang('auth.register')</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">@lang('header.home')<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">@lang('content.register_now')</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="col-lg-18">
                <div class="login_form_inner">
                    <h3>@lang('content.register_now')</h3>
                    {!! Form::open(['method' => 'POST', 'route' => 'register', 'class' => 'row login_form']) !!}
                        
                        <div class="col-md-12 form-group">
                            @include('common.errors')
                        </div>

                        <div class="col-md-12 form-group">
                            {!! Form::text('name', old('name'), [
                                'id' => 'name', 
                                'placeholder' => trans('auth.name'), 
                                'class' => 'form-control', 
                                'required' => 'true', 
                                'autocomplete' => 'name', 
                                'autofocus' => 'autofocus'
                            ]) !!}
                        </div>

                        <div class="col-md-12 form-group">
                            {!! Form::email('email', old('email'), [
                                'id' => 'email', 
                                'placeholder' => trans('auth.email'), 
                                'required' => 'true', 
                                'autocomplete' => 'email', 
                                'class' => 'form-control'
                            ]) !!}
                        </div>

                        <div class="col-md-12 form-group">
                            {!! Form::password('password', [
                                'id' => 'password', 
                                'placeholder' => trans('auth.password'), 
                                'required' => 'true', 
                                'autocomplete' => 'current-password', 
                                'class' => 'form-control'
                            ]) !!}
                        </div>

                        <div class="col-md-12 form-group">
                            {!! Form::password('password_confirmation', [
                                'id' => 'password-confirm', 
                                'placeholder' => trans('auth.confirm_pass'), 
                                'class' => 'form-control', 
                                'required' => 'required', 
                                'autocomplete' => 'new-password'
                            ]) !!}
                        </div>

                        <div class="col-md-12 form-group"></div>
                        
                        <div class="col-md-12 form-group">
                            {!! Form::submit(trans('auth.register'), ['class' => 'primary-btn']) !!}
                        </div>

                        <div class="col-md-12 form-group"></div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
