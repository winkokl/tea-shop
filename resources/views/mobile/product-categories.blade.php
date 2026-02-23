@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('header')
   <!-- Header -->
   <header class="header">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{route('frontend.index')}}" class="back-btn">
                        <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                        </svg>
                    </a>
                    <h5 class="title mb-0 text-nowrap">Categories</h5>
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
    <div class="container">
        <div class="dz-list style-2">
            <ul class="categore-list">
                <li>
                    <a href="{{route('frontend.product')}}" class="categore-box box-lg" style="background-image: url({{asset('mobile/assets/images/categorie/1.png')}});">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 12l-4-4-4 4M12 16V9"/></svg>
                        <h5 class="text-white mb-0">LPG Gas</h5>
                        <span class="font-18 text-white">45 Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.product')}}" class="categore-box box-lg bg-5" style="background-image: url({{asset('mobile/assets/images/categorie/2.png')}});">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V6l-3-4H6zM3.8 6h16.4M16 10a4 4 0 1 1-8 0"/></svg>
                        <h5 class="text-white mb-0">ECommerce</h5>
                        <span class="font-18 text-white">45 Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.product')}}" class="categore-box box-lg bg-6" style="background-image: url({{asset('mobile/assets/images/categorie/3.png')}});">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <h5 class="text-white mb-0">Service</h5>
                        <span class="font-18 text-white">45 Items</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('after-scripts-end')
<script src="{{ asset('mobile/assets/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/wnumb/wNumb.js')}}"></script>
<script src="{{ asset('mobile/assets/js/noui-slider.init.js')}}"></script>
<script>
    $(".stepper").TouchSpin();
</script>
@endsection
