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
                    <h5 class="title mb-0 text-nowrap">Favourite</h5>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
@endsection
@section('content')
   <!-- Page Content -->
   <div class="page-content">

        <div class="content-inner pt-0">
            <div class="container p-b30">
                <!-- Search -->
                <div>
                    <div class="mb-3 input-group input-radius">
                        <span class="input-group-text">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.9395 1.9313C5.98074 1.9313 1.94141 5.97063 1.94141 10.9294C1.94141 15.8881 5.98074 19.9353 10.9395 19.9353C13.0575 19.9353 15.0054 19.193 16.5449 17.9606L20.293 21.7067C20.4821 21.888 20.7347 21.988 20.9967 21.9854C21.2587 21.9827 21.5093 21.8775 21.6947 21.6924C21.8801 21.5073 21.9856 21.2569 21.9886 20.9949C21.9917 20.7329 21.892 20.4802 21.7109 20.2908L17.9629 16.5427C19.1963 15.0008 19.9395 13.0498 19.9395 10.9294C19.9395 5.97063 15.8982 1.9313 10.9395 1.9313ZM10.9395 3.93134C14.8173 3.93134 17.9375 7.05153 17.9375 10.9294C17.9375 14.8072 14.8173 17.9352 10.9395 17.9352C7.06162 17.9352 3.94141 14.8072 3.94141 10.9294C3.94141 7.05153 7.06162 3.93134 10.9395 3.93134Z" fill="#7D8FAB"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search here!" class="form-control main-in ps-0 bs-0">
                    </div>
                </div>

                <div class="dashboard-area">
                    <div class="title-bar">
                        <span class="title mb-0 font-18">Popular Deals</span>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="card-item style-1">
                                <div class="dz-media">
                                    <img src="{{asset('mobile/assets/images/food/food8.png')}}" alt="image">
                                    <a href="javascript:void(0);" class="r-btn">
                                        <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                    </a>
                                    <div class="label">5% OFF</div>
                                </div>
                                <div class="dz-content">
                                    <h6 class="title mb-3"><a href="{{route('frontend.product')}}">1KG Cylinder</a></h6>
                                    <div class="dz-meta">
                                        <ul>
                                            <li class="price text-accent">MMK 10000</li>
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
                                    <img src="{{asset('mobile/assets/images/food/food4.png')}}" alt="image">
                                    <a href="javascript:void(0);" class="r-btn">
                                        <div class="like-button"><i class="fa-regular fa-heart"></i></div>
                                    </a>
                                </div>
                                <div class="dz-content">
                                    <h6 class="title mb-3"><a href="{{route('frontend.product')}}">5KG Cylinder</a></h6>
                                    <div class="dz-meta">
                                        <ul>
                                            <li class="price text-accent">MMK 30000</li>
                                            <li class="review">
                                                <span class="text-soft font-10">(243)</span>
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
                </div>
            </div>
        </div>

    </div>
<!-- Page Content End-->
@endsection
@section('footer')
    <!-- Menubar -->
    <div class="menubar-area style-2 footer-fixed rounded-0" style="border-top:1px solid var(--title);">
        <div class="toolbar-inner menubar-nav">
            <a href="{{route('frontend.index')}}" class="nav-link">
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
            <a href="{{route('frontend.favourite')}}" class="nav-link active">
                <svg enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m256.001 477.407c-2.59 0-5.179-.669-7.499-2.009-2.52-1.454-62.391-36.216-123.121-88.594-35.994-31.043-64.726-61.833-85.396-91.513-26.748-38.406-40.199-75.348-39.982-109.801.254-40.09 14.613-77.792 40.435-106.162 26.258-28.848 61.3-44.734 98.673-44.734 47.897 0 91.688 26.83 116.891 69.332 25.203-42.501 68.994-69.332 116.891-69.332 35.308 0 68.995 14.334 94.859 40.362 28.384 28.563 44.511 68.921 44.247 110.724-.218 34.393-13.921 71.279-40.728 109.632-20.734 29.665-49.426 60.441-85.279 91.475-60.508 52.373-119.949 87.134-122.45 88.588-2.331 1.354-4.937 2.032-7.541 2.032z"/></svg>
            </a>
            {{-- <a href="{{route('frontend.profile')}}" class="nav-link">
                <div class="media media-25 rounded-circle mx-auto">
                    <img src="{{asset('mobile/assets/images/avatar/9.jpg')}}" alt="/">
                </div>
            </a> --}}
        </div>
    </div>
    <!-- Menubar -->
@endsection
@section('after-scripts-end')
    <script>
        $(".stepper").TouchSpin({
            initval: 1
        });
    </script>
@endsection
