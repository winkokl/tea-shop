@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('after-scripts-start')
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@endsection

@section('header')
    <!-- Header -->
    <header class="header">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="javascript:void(0);" class="back-btn">
                            <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                            </svg>
                        </a>
                        <h5 class="title mb-0 text-nowrap">Location</h5>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->
@endsection
@section('content')
    <!-- Page Content -->
    <div class="page-content bottom-content">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24950.439623011247!2d-90.18174039782508!3d38.584339184052645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1679052627749!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="bottom-wrapper">
            <div class="container pb-0">
                <div class="track-content">
                    <div class="map-dir">
                        <p class="mb-0">Estimated Time</p>
                        <h4 class="mb-0">5-10 min</h4>
                    </div>
                </div>
                <div class="delivery-man">
                    <div class="d-flex align-items-center">
                        <div class="media-50 me-3">
                            <img class="rounded-circle" src="{{asset('mobile/assets/images/message/pic6.jpg')}}" alt="">
                        </div>
                        <div class="dz-content">
                            <h6 class="font-w600 mb-0 text-white">Mr. Shandy</h6>
                            <span class="text-white font-12">Delivery boy</span>
                        </div>
                        <div class="d-flex align-items-center ms-auto">
                            <a href="javascript:void(0);" class="icon-cell ms-0">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                            <a href="javascript:void(0)" class="icon-cell">
                                <i class="fa-solid fa-comment"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="fixed-content">
                    <ul class="track-list">
                        <li>
                            <div class="icon-box me-2">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="info">
                                <span>Address</span>
                                <p class="mb-0">427 Duke street, M54lmn</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-box me-2">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="info">
                                <span>Delivery Time</span>
                                <p class="mb-0">20-30 minutes</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-box me-2">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <div class="info">
                                <span>Order #</span>
                                <p class="mb-0">15462</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->
@endsection
