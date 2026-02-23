@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('page-wraper')
<div class="page-wraper">

    <!-- splash -->
	<div class="loader-screen" id="splashscreen">
		<div class="main-screen">
			<div class="loader">
			    <span style="--dz_item:1;"></span>
			    <span style="--dz_item:2;"></span>
			    <span style="--dz_item:3;"></span>
			    <span style="--dz_item:4;"></span>
			    <span style="--dz_item:5;"></span>
			    <span style="--dz_item:6;"></span>
			    <span style="--dz_item:7;"></span>
			    <span style="--dz_item:8;"></span>
			    <span style="--dz_item:9;"></span>
			    <span style="--dz_item:10;"></span>
			    <span style="--dz_item:11"></span>
			    <span style="--dz_item:12;"></span>
			    <span style="--dz_item:13;"></span>
			    <span style="--dz_item:14;"></span>
			    <span style="--dz_item:15;"></span>
			    <span style="--dz_item:16;"></span>
			    <span style="--dz_item:17;"></span>
			    <span style="--dz_item:18;"></span>
			    <span style="--dz_item:19;"></span>
			    <span style="--dz_item:20;"></span>
			</div>
			<svg class="icon" height="50" viewBox="0 0 32 32" width="50" xmlns="http://www.w3.org/2000/svg"><g id="Mall_Shop" data-name="Mall/Shop"><path d="m10 20h13.438a3 3 0 0 0 2.911-2.272l2.311-9.244a2 2 0 0 0 -1.941-2.484h-19l-.319-.949a3 3 0 0 0 -2.841-2.051h-1.559a1 1 0 0 0 0 2h1.559a1 1 0 0 1 .949.684l4.112 12.34a2.993 2.993 0 0 0 -.651 5.782 3 3 0 1 0 4.251.194h7.56a3 3 0 1 0 4.44 0h.48a1 1 0 0 0 0-2h-15.7a1 1 0 0 1 0-2zm9.153-2h-2.306l-.333-2h2.972zm.667-4h-3.64l-.333-2h4.306zm3.027-6h3.873l-.5 2h-3.706zm-.667 4h3.54l-.5 2h-3.373zm-.666 4h3.206l-.311 1.242a1 1 0 0 1 -.971.758h-2.258zm-.694-8-.334 2h-4.972l-.334-2zm-6 10h-3.1l-.666-2h3.432zm-.667-4h-3.766l-.667-2h4.1zm-1-6 .333 2h-4.432l-.667-2zm9.847 19a1 1 0 1 1 1-1 1 1 0 0 1 -1 1zm-12 0a1 1 0 1 1 1-1 1 1 0 0 1 -1 1z" fill="#ffffff"/></g></svg>
		</div>
	</div>
	<!-- splash-->

    <!-- Welcome Start -->
	<div class="content-body">
		<div class="welcome-area">
			<div class="join-area">
				<div class="swiper get-started">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="slide-info container">
								<div class="dz-media">
									<img src="{{asset('mobile/assets/images/food/food1.png')}}" alt="">
								</div>
								<div class="started">
									<h3 class="title font-w700">Welcome to<br>Tea Application</h3>
									<p>Our products are always kept fresh. They are 100% natural, delicious, nutritions, healty and safe for consumption.</p>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="slide-info container">
								<div class="dz-media">
									<img src="{{asset('mobile/assets/images/food/food2.png')}}" alt="">
								</div>
								<div class="started">
									<h3 class="title font-w700">Best Quality Tea <br>at your doorstep!</h3>
									<p>Furits provide the body with essential nutrition that helps maintain and improve overall health for you and your family.</p>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="slide-info container">
								<div class="dz-media">
									<img src="{{asset('mobile/assets/images/food/food1.png')}}" alt="">
								</div>
								<div class="started">
									<h3 class="title font-w700">Welcome to Tanam!<br>Tea Application</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="slide-info container">
								<div class="dz-media">
									<img src="{{asset('mobile/assets/images/food/food2.png')}}" alt="">
								</div>
								<div class="started">
									<h3 class="title font-w700">Best Quality Tea <br>at your doorstep!</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-btn">
						<div class="swiper-pagination style-1 flex-1"></div>
					</div>
				</div>
				<div class="bottom-btn container">
					<a href="{{route('frontend.auth.login')}}" class="btn btn-primary btn-block">NEXT</a>
				</div>
			</div>
		</div>
	</div>
    <!-- Welcome End -->

</div>
@endsection
