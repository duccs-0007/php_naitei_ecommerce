@extends('layouts.app')

@section('title', trans('content.all_products'))

@section('content')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">			
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <h1>@lang('content.all_products')</h1>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Product Table -->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    @if ($products->isEmpty())
                    <p>@lang('There is no products.')</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>@lang('content.id')</th>
                                <th>@lang('content.name')</th>
                                <th>@lang('content.price')</th>
                                <th>@lang('content.quantity')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{!! $product->id !!} </td>
                                <td>{!! $product->name !!}</td>
                                <td>${!! $product->price !!}</td>
                                <td>{!! $product->quantity !!}</td>
                                <td>
                                    <a href="{{ action('ProductsController@edit', ['slug' => $product->slug]) }}" class="genric-btn success circle">
                                        <i class="far fa-edit"></i>@lang('content.edit')
                                    </a>
                                    <a href="#" class="genric-btn danger circle">
                                        <i class="fas fa-trash"></i>@lang('content.delete')
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Table -->
@endsection
