@extends('mobile.layouts.master')

@section('title', __('Tea'))
@section('header')
<!-- Header -->
<header class="header">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    {{-- <a href="javascript:void(0);" class="back-btn">
                        <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                        </svg>
                    </a> --}}
                    <h5 class="title mb-0 text-nowrap">Order</h5>
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
    <div class="container">
        <div class="dz-tab style-4">
            <div class="tab-slide-effect mx-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="tab-active-indicator" style="width: 108.391px; transform: translateX(177.625px);"></li>
                    <li class="nav-item active" role="presentation">
                        <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button" role="tab" aria-controls="order-tab-pane" aria-selected="false" tabindex="-1">New Orders</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="order2-tab" data-bs-toggle="tab" data-bs-target="#order2-tab-pane" type="button" role="tab" aria-controls="order2-tab-pane" aria-selected="false" tabindex="-1">Ongoing Orders</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="order3-tab" data-bs-toggle="tab" data-bs-target="#order3-tab-pane" type="button" role="tab" aria-controls="order3-tab-pane" aria-selected="false" tabindex="-1">Past Orders</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content px-0" id="myTabContent1">
                <div class="tab-pane fade active show" id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab" tabindex="0">
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/3.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x9</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">CREATED</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/4.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">CREATED</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="order2-tab-pane" role="tabpanel" aria-labelledby="order2-tab" tabindex="0">
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/3.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">ONGOING</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/4.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x2</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">ONGOING</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/5.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x2</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">ONGOING</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/6.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x2</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x2</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">ONGOING</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/7.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x2</span>
                                            </li>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">ONGOING</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/8.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x9</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">ONGOING</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="order3-tab-pane" role="tabpanel" aria-labelledby="order3-tab" tabindex="0">
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/3.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x9</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">DELIVERD</div>
                            </a>
                        </div>
                    </div>
                    <div class="card order-box">
                        <div class="card-body">
                            <a href="{{route('frontend.vendor_order_detail')}}">
                                <div class="order-content">
                                    <div class="media media-70 rounded me-3">
                                        <img src="{{asset('mobile/assets/images/categorie/4.png')}}" alt="image">
                                    </div>
                                    <div class="right-content">
                                        <h6 class="order-number">ORDER # 277</h6>
                                        <ul>
                                            <li>
                                                <p class="order-name">Apple Royal Gal... - 1kg - $10.0</p>
                                                <span class="order-quantity">x1</span>
                                            </li>
                                            <li>
                                                <h6 class="order-time">Monday, February 13,2023 6:53pm</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="badge badge-md badge-primary float-end rounded-sm">DELIVERD</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('footer')
<div class="menubar-area style-10 footer-fixed">
    <div class="toolbar-inner menubar-nav">
        <a href="{{route('frontend.vendor_home')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M506.555 208.064L263.859 30.367a13.3 13.3 0 0 0-15.716 0L5.445 208.064c-5.928 4.341-7.216 12.665-2.875 18.593a13.31 13.31 0 0 0 18.593 2.875L256 57.588l234.837 171.943c2.368 1.735 5.12 2.57 7.848 2.57 4.096 0 8.138-1.885 10.744-5.445 4.342-5.927 3.054-14.251-2.874-18.592zm-64.309 24.479c-7.346 0-13.303 5.956-13.303 13.303v211.749H322.521V342.009c0-36.68-29.842-66.52-66.52-66.52s-66.52 29.842-66.52 66.52v115.587H83.058V245.847c0-7.347-5.957-13.303-13.303-13.303s-13.303 5.956-13.303 13.303V470.9c0 7.347 5.957 13.303 13.303 13.303h133.029c6.996 0 12.721-5.405 13.251-12.267.032-.311.052-.651.052-1.036V342.01c0-22.009 17.905-39.914 39.914-39.914s39.914 17.906 39.914 39.914V470.9c0 .383.02.717.052 1.024.524 6.867 6.251 12.279 13.251 12.279h133.029c7.347 0 13.303-5.956 13.303-13.303V245.847c-.001-7.348-5.957-13.304-13.304-13.304z"/></svg>
            <span>Home</span>
        </a>
        <a href="{{route('frontend.vendor_orders')}}" class="nav-link active">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M386.689 304.403c-35.587 0-64.538 28.951-64.538 64.538s28.951 64.538 64.538 64.538c35.593 0 64.538-28.951 64.538-64.538s-28.951-64.538-64.538-64.538zm0 96.807c-17.796 0-32.269-14.473-32.269-32.269s14.473-32.269 32.269-32.269 32.269 14.473 32.269 32.269-14.473 32.269-32.269 32.269zm-220.504-96.807c-35.587 0-64.538 28.951-64.538 64.538s28.951 64.538 64.538 64.538 64.538-28.951 64.538-64.538-28.951-64.538-64.538-64.538zm0 96.807c-17.796 0-32.269-14.473-32.269-32.269s14.473-32.269 32.269-32.269 32.269 14.473 32.269 32.269-14.473 32.269-32.269 32.269zM430.15 119.675c-2.743-5.448-8.32-8.885-14.419-8.885h-84.975v32.269h75.025l43.934 87.384 28.838-14.5-48.403-96.268z"/><path d="M216.202 353.345h122.084v32.269H216.202zm-98.421 0H61.849c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h55.933c8.912 0 16.134-7.223 16.134-16.134s-7.223-16.134-16.135-16.134zm390.831-98.636l-31.736-40.874c-3.049-3.937-7.755-6.239-12.741-6.239H346.891V94.655c0-8.912-7.223-16.134-16.134-16.134H61.849c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h252.773V223.73c0 8.912 7.223 16.134 16.134 16.134h125.478l23.497 30.268v83.211h-44.639c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h60.773c8.912 0 16.134-7.223 16.135-16.134V264.605c0-3.582-1.194-7.067-3.388-9.896zm-391.906 16.888H42.487c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h74.218c8.912 0 16.134-7.223 16.134-16.134s-7.222-16.134-16.133-16.134zm37.109-63.463H16.134C7.223 208.134 0 215.357 0 224.269s7.223 16.134 16.134 16.134h137.681c8.912 0 16.134-7.223 16.134-16.134s-7.222-16.135-16.134-16.135zm26.353-63.462H42.487c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h137.681c8.912 0 16.134-7.223 16.134-16.134s-7.222-16.134-16.134-16.134z"/></svg>
            <span>Order</span>
        </a>
        <a href="{{route('frontend.vendor_analytics')}}" class="nav-link">
            <svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><path d="m1 29h30v2h-30z"/><path d="m4 26a2.99 2.99 0 0 0 2.189-5.037l5.119-8.052a2.837 2.837 0 0 0 1.977-.212l4.015 4.016a2.951 2.951 0 0 0 -.3 1.285 3 3 0 0 0 6 0 2.972 2.972 0 0 0 -.7-1.908l5.2-9.142a3.023 3.023 0 1 0 -1.746-.976l-5.176 9.085a3.015 3.015 0 0 0 -.578-.059 2.951 2.951 0 0 0 -1.285.3l-4.015-4.015a2.951 2.951 0 0 0 .3-1.285 3 3 0 0 0 -6 0 2.968 2.968 0 0 0 .632 1.82l-5.227 8.221a3 3 0 0 0 -.405-.041 3 3 0 0 0 0 6zm16-7a1 1 0 1 1 1-1 1 1 0 0 1 -1 1zm8-16a1 1 0 1 1 -1 1 1 1 0 0 1 1-1zm-16 6a1 1 0 1 1 -1 1 1 1 0 0 1 1-1zm-8 13a1 1 0 1 1 -1 1 1 1 0 0 1 1-1z"/></g></svg>
            <span>Analytics</span>
        </a>
        <a href="{{route('frontend.vendor_profile')}}" class="nav-link">
            <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><g fill="rgb(0,0,0)"><path d="m12 12.75c-3.17 0-5.75-2.58-5.75-5.75s2.58-5.75 5.75-5.75 5.75 2.58 5.75 5.75-2.58 5.75-5.75 5.75zm0-10c-2.34 0-4.25 1.91-4.25 4.25s1.91 4.25 4.25 4.25 4.25-1.91 4.25-4.25-1.91-4.25-4.25-4.25z"/><path d="m20.5901 22.75c-.41 0-.75-.34-.75-.75 0-3.45-3.5199-6.25-7.8399-6.25-4.32005 0-7.84004 2.8-7.84004 6.25 0 .41-.34.75-.75.75s-.75-.34-.75-.75c0-4.27 4.18999-7.75 9.34004-7.75 5.15 0 9.3399 3.48 9.3399 7.75 0 .41-.34.75-.75.75z"/></g></svg>
            <span>Profile</span>
        </a>
    </div>
</div>
@endsection

