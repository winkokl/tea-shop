@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('content')
<!-- Page Content -->
<div class="page-content">
    <div class="welcome-area">
        <div class="join-area">
            <div class="swiper get-started driver-onboarding" style="background-image: none;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-info container">
                            <div class="dz-media mb-4">
                                <img width="200" src="{{asset('mobile/assets/images/onboarding/delivery-1.png')}}" alt="">
                            </div>
                            <div class="started">
                                <h3 class="title font-w600">Delivery of any Order</h3>
                                <p>Our products are always kept fresh. They are 100% natural, delicious, nutritions, healty and safe for consumption.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-info container">
                            <div class="dz-media mb-4">
                                <img width="200" src="{{asset('mobile/assets/images/onboarding/delivery-2.png')}}" alt="">
                            </div>
                            <div class="started">
                                <h3 class="title font-w600">Delivery With Care</h3>
                                <p>Furits provide the body with essential nutrition that helps maintain and improve overall health for you and your family.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-info container">
                            <div class="dz-media mb-4">
                                <img width="200" src="{{asset('mobile/assets/images/onboarding/delivery-3.png')}}" alt="">
                            </div>
                            <div class="started">
                                <h3 class="title font-w600">Pick Up Delivery</h3>
                                <p>Order Food and get delivery with in a few minutes to your door. Order Food and get delivery with in a few minutes.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-btn">
                    <div class="swiper-pagination style-1 flex-1"></div>
                </div>
            </div>
            <div class="bottom-btn container d-flex align-items-center">
                <a href="{{route('frontend.auth.login')}}" class="btn-link flex-1">Skip</a>
                <a href="{{route('frontend.auth.login')}}" class="btn btn-primary btn-sm">NEXT</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
