@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.verify_email_add')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ trans('auth.send_verify') }}
                        </div>
                    @endif

                    {{ trans('auth.check_verify_email') }}
                    {{ trans('auth.not_vetify_email') }}, <a href="{{ route('verification.resend') }}">{{ trans('auth.another_vetify') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
