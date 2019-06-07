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

<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2> @lang('user.all_users') </h2>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($users->isEmpty())
            <p> @lang('user.no_users') </p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>@lang('user.id')</th>
                        <th>@lang('user.name')</th>
                        <th>@lang('user.email')</th>
                        <th>@lang('user.joined_at')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{ $users->link() }}
    </div>
</div>
@endsection