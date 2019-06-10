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
                    <a href="category.html">@lang('auth.register')</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="login_form_inner">
                    <h3>@lang('content.edit_profile')</h3>
                    {!! Form::open(['method' => 'PATCH', 'route' => ['users.update', $user], 'class' => 'row
                    login_form'])
                    !!}

                    <div class="col-md-12 form-group">
                        @include('common.errors')
                    </div>

                    <div class="col-md-12 form-group">
                        {!! Form::text('name', $user->name, [
                        'id' => 'name',
                        'placeholder' => trans('auth.name'),
                        'class' => 'form-control',
                        'required' => 'required',
                        'autocomplete' => 'name',
                        'autofocus' => 'autofocus'
                        ]) !!}
                    </div>

                    <div class="col-md-12 form-group">
                        {!! Form::email('email', $user->email, [
                        'id' => 'email',
                        'placeholder' => trans('auth.email'),
                        'required' => 'required',
                        'autocomplete' => 'email',
                        'class' => 'form-control'
                        ]) !!}
                    </div>

                    <div class="col-md-12 form-group">
                        {!! Form::text('address', $user->address, [
                        'class' => 'form-control',
                        'id' => 'address',
                        'placeholder' => trans('user.address')
                        ]) !!}
                    </div>

                    <div class="col-md-12 form-group">
                        {!! Form::password('password',[
                        'class' => 'form-control',
                        'placeholder' => trans('auth.password'),
                        ]) !!}
                    </div>

                    <div class="col-md-12 form-group">
                        {!! Form::password('password_confirmation', [
                        'class' => 'form-control',
                        'placeholder' => trans('auth.confirm_pass'),
                        ]) !!}
                    </div>

                    <div class="col-md-12 form-group"></div>

                    <div class="col-md-12 form-group">
                        {!! Form::submit(trans('user.submit'), ['class' => 'primary-btn']) !!}
                    </div>

                    <div class="col-md-12 form-group"></div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="{!! $user->image !!}" alt="sieunhan">
                        <h4>{!! $user->name !!}</h4>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <span>{!! $user->desc !!}</span>
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
