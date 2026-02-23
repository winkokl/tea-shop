@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('header')
    @include('mobile.includes.header')
@endsection
@section('sidebar')
    @include('mobile.includes.sidebar')
@endsection
@section('banner')
    @include('mobile.includes.banner')
@endsection
@section('content')
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container p-b30">
            <!-- Search -->
            <div class="search-box mb-4">
                <div class="mb-3 input-group input-radius">
                    <span class="input-group-text">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.9395 1.9313C5.98074 1.9313 1.94141 5.97063 1.94141 10.9294C1.94141 15.8881 5.98074 19.9353 10.9395 19.9353C13.0575 19.9353 15.0054 19.193 16.5449 17.9606L20.293 21.7067C20.4821 21.888 20.7347 21.988 20.9967 21.9854C21.2587 21.9827 21.5093 21.8775 21.6947 21.6924C21.8801 21.5073 21.9856 21.2569 21.9886 20.9949C21.9917 20.7329 21.892 20.4802 21.7109 20.2908L17.9629 16.5427C19.1963 15.0008 19.9395 13.0498 19.9395 10.9294C19.9395 5.97063 15.8982 1.9313 10.9395 1.9313ZM10.9395 3.93134C14.8173 3.93134 17.9375 7.05153 17.9375 10.9294C17.9375 14.8072 14.8173 17.9352 10.9395 17.9352C7.06162 17.9352 3.94141 14.8072 3.94141 10.9294C3.94141 7.05153 7.06162 3.93134 10.9395 3.93134Z" fill="#7D8FAB"/>
                        </svg>
                    </span>
                    <input type="text" placeholder="Search Here" class="form-control main-in ps-0 bs-0">
                </div>
            </div>
            <!-- Search -->

            <!-- Dashboard Area -->
            <div class="dashboard-area">
                <!-- Recent -->
                <div class="m-b10">
                    <div class="swiper-btn-center-lr">
                        <div class="swiper tag-group mt-4 recomand-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card add-banner" style="background-image: url({{asset('mobile/assets/images/background/bg2.png')}});">
                                        <div class="circle-1"></div>
                                        <div class="circle-2"></div>
                                        <div class="card-body">
                                            <div class="card-info">
                                                <span class="font-12 font-w500 text-dark">Happy Weekend</span>
                                                <h1 data-text="20% OFF" class="title mb-2">20% OFF</h1>
                                                <small>*for All Menus</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card add-banner" style="background-image: url({{asset('mobile/assets/images/background/bg3.png')}});">
                                        <div class="circle-1"></div>
                                        <div class="circle-2"></div>
                                        <div class="card-body">
                                            <div class="card-info">
                                                <span class="font-12 font-w500 text-dark">Happy Weekend</span>
                                                <h1 data-text="25% OFF" class="title mb-2">25% OFF</h1>
                                                <small>*for All Menus</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card add-banner" style="background-image: url({{asset('mobile/assets/images/background/bg4.png')}});">
                                        <div class="circle-1"></div>
                                        <div class="circle-2"></div>
                                        <div class="card-body">
                                            <div class="card-info">
                                                <span class="font-12 font-w500 text-dark">Happy Weekend</span >
                                                <h1 data-text="15% OFF" class="title mb-2">15% OFF</h1>
                                                <small>*for All Menus</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent -->
                <div class="swiper-btn-center-lr1 my-0 mb-3">
                    <div class="swiper custom-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('mobile/assets/images/fav150x150.png')}}" class="bnr-img" alt="bg-image" style="padding-left:10px;width:120px;height:100px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('mobile/assets/images/fav150x150.png')}}" class="bnr-img" alt="bg-image" style="padding-left:10px;width:120px;height:100px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('mobile/assets/images/fav150x150.png')}}" class="bnr-img" alt="bg-image" style="padding-left:10px;width:120px;height:100px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('mobile/assets/images/fav150x150.png')}}" class="bnr-img" alt="bg-image" style="padding-left:10px;width:120px;height:100px;">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Categorie -->
                <div class="title-bar mt-0">
                    <span class="title mb-0 font-18">Categories</span>
                    <a class="btn-link" href="{{route('frontend.product_categories')}}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.25005 20.25C8.05823 20.25 7.86623 20.1767 7.7198 20.0303C7.42673 19.7372 7.42673 19.2626 7.7198 18.9698L14.6895 12L7.7198 5.03025C7.42673 4.73719 7.42673 4.26263 7.7198 3.96975C8.01286 3.67688 8.48742 3.67669 8.7803 3.96975L16.2803 11.4698C16.5734 11.7628 16.5734 12.2374 16.2803 12.5303L8.7803 20.0303C8.63386 20.1767 8.44186 20.25 8.25005 20.25Z" fill="var(--title)"/>
                        </svg>
                    </a>
                </div>

                <div class="categories-box">
                    <div class="swiper-btn-center-lr" style="margin-left:0px;margin-right:0px;">
                        <div class="swiper " style="margin-left:-11px;">
                            <div class="swiper-wrapper">
                                <div style="width:auto;margin-left:10px;">
                                    <a href="{{route('frontend.product')}}">
                                        <div class="categore-box bg-1" style="background-image:url({{asset('mobile/assets/images/background/small/bg1.png')}});width:115px!important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 12l-4-4-4 4M12 16V9"/></svg>

                                            <h6 class="font-14 text-white mb-0">LPG Gas</h6>
                                            <span class="text-white">Go LPG</span>
                                        </div>
                                    </a>
                                </div>
                                <div style="width:auto;margin-left:10px;">
                                    <a href="{{route('frontend.product')}}">
                                        <div class="categore-box bg-2" style="background-image:url({{asset('mobile/assets/images/background/small/bg2.png')}});width:115px!important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V6l-3-4H6zM3.8 6h16.4M16 10a4 4 0 1 1-8 0"/></svg>

                                            <h6 class="font-14 text-white mb-0">ECommerce</h6>
                                            <span class="text-white">All you Need</span>
                                        </div>
                                    </a>
                                </div>
                                <div style="width:auto;margin-left:10px;">
                                    <a href="{{route('frontend.product')}}">
                                        <div class="categore-box bg-3" style="background-image: url({{asset('mobile/assets/images/background/small/bg3.png')}});width:115px!important;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                                            <h6 class="font-14 text-white mb-0">Service</h6>
                                            <span class="text-white">Best Service</span>
                                        </div>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categorie End -->

                <!-- Recomended Start -->
                <div class="title-bar">
                    <span class="title mb-0 font-18">Popular Deals</span>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <div class="card-item style-1">
                            <div class="dz-media">
                                <img src="{{asset('mobile/assets/images/eff/eff1.png')}}" alt="image">
                                <a href="javascript:void(0);" class="r-btn">
                                    <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                </a>
                                <div class="label">5% OFF</div>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-3"><a href="{{route('frontend.product')}}">1Kg Cylinder</a></h6>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="price text-accent">MMK 4000</li>
                                        <li class="review">
                                            <span class="text-soft font-10">(2)</span>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-primary add-btn light" href="javascript:void(0);">Add to cart</a>
                                    <div class="dz-stepper border-1 rounded-stepper stepper-fill">
                                        <input class="stepper" type="text" name="demo3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-item style-1">
                            <div class="dz-media">
                                <img src="{{asset('mobile/assets/images/eff/eff2.png')}}" alt="image">
                                <a href="javascript:void(0);" class="r-btn">
                                    <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                </a>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-3"><a href="{{route('frontend.product')}}">5Kg Cylinder</a></h6>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="price text-accent">MMK 30000</li>
                                        <li class="review">
                                            <span class="text-soft font-10">(23)</span>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-primary add-btn light" href="javascript:void(0);">Add to cart</a>
                                    <div class="dz-stepper border-1 rounded-stepper stepper-fill">
                                        <input class="stepper" type="text" name="demo3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-item style-1">
                            <div class="dz-media">
                                <img src="{{asset('mobile/assets/images/eff/eff2.png')}}" alt="image">
                                <a href="javascript:void(0);" class="r-btn">
                                    <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                </a>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-3"><a href="{{route('frontend.product')}}">10Kg Cylinder</a></h6>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="price text-accent">MMK 50000</li>
                                        <li class="review">
                                            <span class="text-soft font-10">(21)</span>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-primary add-btn light" href="javascript:void(0);">Add to cart</a>
                                    <div class="dz-stepper border-1 rounded-stepper stepper-fill">
                                        <input class="stepper" type="text" name="demo3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-item style-1">
                            <div class="dz-media">
                                <img src="{{asset('mobile/assets/images/eff/eff2.png')}}" alt="image">
                                <a href="javascript:void(0);" class="r-btn">
                                    <div class="like-button active"><i class="fa-regular fa-heart"></i></div>
                                </a>
                                <div class="label">5% OFF</div>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-3"><a href="{{route('frontend.product')}}">15Kg Cylinder</a></h6>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="price text-accent">MMK 70000</li>
                                        <li class="review">
                                            <span class="text-soft font-10">(13)</span>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-primary add-btn light" href="javascript:void(0);">Add to cart</a>
                                    <div class="dz-stepper border-1 rounded-stepper stepper-fill">
                                        <input class="stepper" type="text" name="demo3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-item style-1">
                            <div class="dz-media">
                                <img src="{{asset('mobile/assets/images/eff/eff2.png')}}" alt="image">
                                <a href="javascript:void(0);" class="r-btn">
                                    <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                </a>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-3"><a href="{{route('frontend.product')}}">20Kg Cylinder</a></h6>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="price text-accent">MMK 90000</li>
                                        <li class="review">
                                            <span class="text-soft font-10">(3)</span>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-primary add-btn light" href="javascript:void(0);">Add to cart</a>
                                    <div class="dz-stepper border-1 rounded-stepper stepper-fill">
                                        <input class="stepper" type="text" name="demo3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-item style-1">
                            <div class="dz-media">
                                <img src="{{asset('mobile/assets/images/eff/eff2.png')}}" alt="image">
                                <a href="javascript:void(0);" class="r-btn">
                                    <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                </a>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-3"><a href="{{route('frontend.product')}}">20Kg Cylinder</a></h6>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="price text-accent">MMK 100000</li>
                                        <li class="review">
                                            <span class="text-soft font-10">(0)</span>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-primary add-btn light" href="javascript:void(0);">Add to cart</a>
                                    <div class="dz-stepper border-1 rounded-stepper stepper-fill">
                                        <input class="stepper" type="text" name="demo3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recomended Start -->
            </div>
            <!-- Other Package -->
                <h6 class="title-head mb-3">Other Login package</h6>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="package-box box-1">
                            <div class="media media-70">
                                <img src="{{asset('mobile/assets/images/package/shop.svg')}}" alt="image">
                            </div>
                            <h6 class="title-head">Pick Up at the Shop</h6>
                            <p class="sub-title">Continue With Vendor</p>
                            <a href="{{route('frontend.vendor_onboarding')}}" class="btn package-btn">Click Now
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="package-box box-2">
                            <div class="media media-70">
                                <img src="{{asset('mobile/assets/images/package/boy.svg')}}" alt="image">
                            </div>
                            <h6 class="title-head">Pick Up with Driver</h6>
                            <p class="sub-title">Continue With Driver</p>
                            <a href="{{route('frontend.driver_onboarding')}}" class="btn package-btn">Click Now
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <!-- Other Package -->
        </div>
    </div>
</div>
@endsection
@section('footer')
   <!-- Menubar -->
    <div class="menubar-area style-2 footer-fixed rounded-0"  style="border-top:1px solid var(--title);">
        <div class="toolbar-inner menubar-nav">
            <a href="{{route('frontend.index')}}" class="nav-link active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="#130F26"></path>
                </svg>
            </a>
            <a href="{{route('frontend.orders')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" >
                    <path d="M23.561 6.622L19.5 10.683c-.293.293-.677.439-1.061.439s-.768-.146-1.061-.439a1.5 1.5 0 0 1 0-2.121l1.5-1.5H3.153a1.5 1.5 0 1 1 0-3h15.726l-1.5-1.5a1.5 1.5 0 0 1 0-2.121 1.5 1.5 0 0 1 2.121 0l4.061 4.061a1.5 1.5 0 0 1 0 2.121zm-3.533 10.317H5.122l1.5-1.5a1.5 1.5 0 0 0-2.121-2.121L.44 17.378a1.5 1.5 0 0 0 0 2.121l4.061 4.061c.293.293.677.439 1.061.439s.768-.146 1.061-.439a1.5 1.5 0 0 0 0-2.121l-1.5-1.5h14.906a1.5 1.5 0 1 0 0-3z" fill="#7d8fab"/>
                </svg>
            </a>
            <a href="{{route('frontend.shopping_cart')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 456.569 456.569"><path d="M345.805 339.465c-29.323-.028-53.117 23.72-53.146 53.043s23.72 53.117 53.043 53.146 53.117-23.72 53.146-53.043v-.051c-.028-29.292-23.752-53.038-53.043-53.095zm94.171-254.244a20.44 20.44 0 0 0-3.855-.373H112.845l-5.12-34.253c-3.19-22.748-22.648-39.673-45.619-39.68H20.48C9.169 10.915 0 20.084 0 31.395s9.169 20.48 20.48 20.48h41.677a5.12 5.12 0 0 1 5.12 4.506l31.539 216.166c4.324 27.468 27.951 47.732 55.757 47.821h213.043c26.771.035 49.866-18.78 55.245-45.005l33.331-166.144c2.149-11.105-5.111-21.849-16.216-23.998zM215.737 390.286c-1.247-28.463-24.737-50.869-53.228-50.77h0c-29.299 1.184-52.091 25.896-50.907 55.195 1.136 28.113 24.005 50.458 52.136 50.943h1.28c29.295-1.284 52.002-26.073 50.719-55.368z"/></svg>
            </a>
            <a href="{{route('frontend.favourite')}}" class="nav-link">
                <svg enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m256.001 477.407c-2.59 0-5.179-.669-7.499-2.009-2.52-1.454-62.391-36.216-123.121-88.594-35.994-31.043-64.726-61.833-85.396-91.513-26.748-38.406-40.199-75.348-39.982-109.801.254-40.09 14.613-77.792 40.435-106.162 26.258-28.848 61.3-44.734 98.673-44.734 47.897 0 91.688 26.83 116.891 69.332 25.203-42.501 68.994-69.332 116.891-69.332 35.308 0 68.995 14.334 94.859 40.362 28.384 28.563 44.511 68.921 44.247 110.724-.218 34.393-13.921 71.279-40.728 109.632-20.734 29.665-49.426 60.441-85.279 91.475-60.508 52.373-119.949 87.134-122.45 88.588-2.331 1.354-4.937 2.032-7.541 2.032z"/></svg>
            </a>
            {{-- <a href="{{route('frontend.profile')}}" class="nav-link">
                <div class="media media-25 rounded-circle mx-auto">
                    <img src="{{asset('mobile/assets/images/avatar/9.jpg')}}" alt="/">
                </div>
            </a> --}}
        </div>
    </div>
    <!--End Menubar -->
    <!-- Theme Color Settings  -->
    {{-- @include('mobile.includes.theme-color-settings') --}}
     <!-- Theme Color Settings End -->
    <!-- PWA Offcanvas -->
    <div class="offcanvas offcanvas-bottom pwa-offcanvas">
        <div class="container">
            <div class="offcanvas-body small">
                <img class="logo" src="{{asset('mobile/assets/images/icon.png')}}" alt="">
                <h6 class="title font-w600">Tea on Your Home Screen</h6>
                <p class="pwa-text">Install Padesr Mobile App Template to your home screen for easy access, just like any other app</p>
                <button type="button" class="btn btn-sm btn-primary pwa-btn">Add to Home Screen</button>
                <button type="button" class="btn btn-sm pwa-close btn-secondary ms-2 text-white">Maybe later</button>
            </div>
        </div>
    </div>
    <div class="offcanvas-backdrop pwa-backdrop"></div>
    <!-- PWA Offcanvas End -->

@endsection
@section('after-scripts-end')
    <script src="{{ asset('mobile/index.js')}}"></script>
@endsection
