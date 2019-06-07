@extends('layouts.app')

@section('title', $product->name)

@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<h1>{{ $product->name }}</h1>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						@foreach ($product->images as $image)
						<div class="single-prd-item">
							<img class="img-fluid" src={{ asset($image) }} alt="">
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{ $product->name }}</h3>
						<h2>${{ $product->price }}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>{{ $product->category->name }}</span> :
									@lang('content.household')</a></li>
							<li>
								<a href="#">
									<span>@lang('content.available')</span> :
									{{ ($product->quantity > 0)?$product->quantity:trans('content.outstock') }}
								</a></li>
						</ul>
						<p>{{ $product->description }}</p>
						<div class="product_count">
							<label for="qty">@lang('content.quantity')</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
								class="input-text qty">
							<button
								onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++; return false;"
								class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button
								onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--; return false;"
								class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="#">@lang('content.add_to_cart')</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
@endsection
