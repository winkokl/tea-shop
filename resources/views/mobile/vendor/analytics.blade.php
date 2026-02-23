@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('after-styles-end')
<link href="{{asset('mobile/assets/vendor/apexcharts/dist/apexcharts.css')}}" rel="stylesheet">
@endsection
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
						<h5 class="title mb-0 text-nowrap">Analytics</h5>
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
        <div class="title-bar mt-0">
            <h6 class="title mb-0 font-18">Deliverd Orders</h6>
        </div>
        <div class="card bg-secondary">
            <div class="card-body">
                <ul class="order-detail-box">
                    <li>
                        <div class="d-flex align-items-center">
                            <span>Today Order</span>
                            <span class="ms-auto">30 Order</span>
                        </div>
                        <p class="mb-0">$125.00</p>
                    </li>
                    <li>
                        <div class="d-flex align-items-center">
                            <span>This Week 25 March</span>
                            <span class="ms-auto">30 Order</span>
                        </div>
                        <p class="mb-0">$125.00</p>
                    </li>
                    <li>
                        <div class="d-flex align-items-center">
                            <span>This Month 31 March</span>
                            <span class="ms-auto">30 Order</span>
                        </div>
                        <p class="mb-0">$125.00</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card feature-card bg-gradient">
            <div class="card-body">
                <h6 class="title-head">Get more orders from </h6>
                <p>At face value,  stores don’t feel overwhelmingly competitive. After all, they sell products that are essential to everyone. With price and quality serving as the only obvious factors separating one chain from another, one thing remains overlooked—customer loyalty.</p>
                <div class="icon">
                    <svg height="512" viewBox="0 0 511.728 511.728" width="512"><path d="M147.925 379.116c-22.357-1.142-21.936-32.588-.001-33.68l290.132.103c17.535 0 32.537-11.933 36.481-29.017l36.404-157.641a30.14 30.14 0 0 0-5.771-25.629c-5.752-7.261-14.363-11.484-23.626-11.484-25.791 0-244.716-.991-356.849-1.438L106.92 54.377c-4.267-15.761-18.65-26.768-34.978-26.768H15c-8.284 0-15 6.716-15 15s6.716 15 15 15h56.942c2.811 0 5.286 1.895 6.017 4.592l68.265 253.276c-12.003.436-23.183 5.318-31.661 13.92-8.908 9.04-13.692 21.006-13.471 33.695.442 25.377 21.451 46.023 46.833 46.023h21.872a52.18 52.18 0 0 0-5.076 22.501c0 28.95 23.552 52.502 52.502 52.502s52.502-23.552 52.502-52.502c0-8.049-1.826-15.677-5.077-22.501h94.716c-3.248 6.822-5.073 14.447-5.073 22.493 0 28.95 23.553 52.502 52.502 52.502s52.503-23.553 52.503-52.502c0-8.359-1.974-16.263-5.464-23.285 5.936-1.999 10.216-7.598 10.216-14.207 0-8.284-6.716-15-15-15zm91.799 52.501c0 12.408-10.094 22.502-22.502 22.502s-22.502-10.094-22.502-22.502c0-12.401 10.084-22.491 22.483-22.501h.038c12.399.01 22.483 10.1 22.483 22.501zm167.07 22.494c-12.407 0-22.502-10.095-22.502-22.502 0-12.285 9.898-22.296 22.137-22.493h.731c12.24.197 22.138 10.208 22.138 22.493-.001 12.407-10.096 22.502-22.504 22.502zm74.86-302.233c.089.112.076.165.057.251l-15.339 66.425H414.43l8.845-67.023 58.149.234c.089.002.142.002.23.113zm-154.645 163.66v-66.984h53.202l-8.84 66.984zm-74.382 0l-8.912-66.984h53.294v66.984zm-69.053 0h-.047a8.13 8.13 0 0 1-7.828-5.98l-16.442-61.004h54.193l8.912 66.984zm56.149-96.983l-9.021-67.799 66.306.267v67.532zm87.286 0v-67.411l66.022.266-8.861 67.145zm-126.588-67.922l9.037 67.921h-58.287l-18.38-68.194zm237.635 164.905H401.63l8.84-66.984h48.973l-14.137 61.217c-.784 3.396-3.765 5.767-7.25 5.767z"/></svg>
                </div>
            </div>
        </div>
        <div class="title-bar d-block">
             <h6 class="title mb-0 d-block font-18">Rejected Orders</h6>
             <p class="d-block mb-0 fst-italic">Lorem Ipsum is simply dummy</p>
        </div>
        <div class="card">
            <div class="card-body">
                <ul class="order-detail-box style-2">
                    <li>
                        <div class="d-flex align-items-center">
                            <span>Today Order</span>
                            <span class="ms-auto order-count">30 Order</span>
                        </div>
                        <p class="mb-0">$125.00</p>
                    </li>
                    <li>
                        <div class="d-flex align-items-center">
                            <span>This Week 25 March</span>
                            <span class="ms-auto order-count">30 Order</span>
                        </div>
                        <p class="mb-0">$125.00</p>
                    </li>
                    <li>
                        <div class="d-flex align-items-center">
                            <span>This Month 31 March</span>
                            <span class="ms-auto order-count">30 Order</span>
                        </div>
                        <p class="mb-0">$125.00</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card reward">
            <div class="card-body">
                <h4 class="title-head d-inline text-secondary">Great Work</h4>
                <div class="icon">
                    <img src="{{asset('mobile/assets/images/trophy.svg')}}" alt="icon-image">
                </div>
            </div>
        </div>
        <div class="card revenue-card">
            <div class="card-header border-0">
                <h6 class="mb-0 font-14">Revenue</h6>
                <ul class="nav nav-pills dz-nav revenue-chart" id="pills-tab1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-series="month" id="pills-month-tab1" data-bs-toggle="pill" data-bs-target="#pills-month1" type="button" role="tab" aria-selected="true">Monthly</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-week-tab1" data-series="week" data-bs-toggle="pill" data-bs-target="#pills-week1" type="button" role="tab" aria-selected="false" tabindex="-1">Weekly</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-today-tab1" data-series="today" data-bs-toggle="pill" data-bs-target="#pills-today1" type="button" role="tab" aria-selected="false" tabindex="-1">Today</button>
                      </li>
                </ul>
            </div>
            <div class="card-body p-0">
                <div id="revenueChart"></div>
            </div>
        </div>
        <div class="title-bar d-block">
             <h6 class="title mb-0 d-block font-18">Top Items in your menu</h6>
             <p class="d-block mb-0 fst-italic">Lorem Ipsum is simply dummy</p>
        </div>
        <ul>
            <li class="d-flex align-items-center pb-2 mb-2 border-bottom justify-content-between">
                <span class="font-16">Menu Items</span>
                <span class="font-16">Quantity Sold</span>
            </li>
            <li class="d-flex align-items-center pb-1 justify-content-between">
                <span>This is tested coconut ju..</span>
                <span>2</span>
            </li>
            <li class="d-flex align-items-center pb-1 justify-content-between">
                <span>Apple Royal Gala 4 pcs..</span>
                <span>1</span>
            </li>
            <li class="d-flex align-items-center pb-1 justify-content-between">
                <span>Handmade Neem Wood Anti..</span>
                <span>1</span>
            </li>
            <li class="d-flex align-items-center pb-1 justify-content-between">
                <span>Apple Royal Gala 4 pcs</span>
                <span>1</span>
            </li>
            <li class="d-flex align-items-center pb-1 justify-content-between">
                <span>Abgoosht</span>
                <span>1</span>
            </li>
            <li class="d-flex align-items-center justify-content-between">
                <span>Delicious Grapes</span>
                <span>1</span>
            </li>
        </ul>
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
        <a href="{{route('frontend.vendor_orders')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M386.689 304.403c-35.587 0-64.538 28.951-64.538 64.538s28.951 64.538 64.538 64.538c35.593 0 64.538-28.951 64.538-64.538s-28.951-64.538-64.538-64.538zm0 96.807c-17.796 0-32.269-14.473-32.269-32.269s14.473-32.269 32.269-32.269 32.269 14.473 32.269 32.269-14.473 32.269-32.269 32.269zm-220.504-96.807c-35.587 0-64.538 28.951-64.538 64.538s28.951 64.538 64.538 64.538 64.538-28.951 64.538-64.538-28.951-64.538-64.538-64.538zm0 96.807c-17.796 0-32.269-14.473-32.269-32.269s14.473-32.269 32.269-32.269 32.269 14.473 32.269 32.269-14.473 32.269-32.269 32.269zM430.15 119.675c-2.743-5.448-8.32-8.885-14.419-8.885h-84.975v32.269h75.025l43.934 87.384 28.838-14.5-48.403-96.268z"/><path d="M216.202 353.345h122.084v32.269H216.202zm-98.421 0H61.849c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h55.933c8.912 0 16.134-7.223 16.134-16.134s-7.223-16.134-16.135-16.134zm390.831-98.636l-31.736-40.874c-3.049-3.937-7.755-6.239-12.741-6.239H346.891V94.655c0-8.912-7.223-16.134-16.134-16.134H61.849c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h252.773V223.73c0 8.912 7.223 16.134 16.134 16.134h125.478l23.497 30.268v83.211h-44.639c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h60.773c8.912 0 16.134-7.223 16.135-16.134V264.605c0-3.582-1.194-7.067-3.388-9.896zm-391.906 16.888H42.487c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h74.218c8.912 0 16.134-7.223 16.134-16.134s-7.222-16.134-16.133-16.134zm37.109-63.463H16.134C7.223 208.134 0 215.357 0 224.269s7.223 16.134 16.134 16.134h137.681c8.912 0 16.134-7.223 16.134-16.134s-7.222-16.135-16.134-16.135zm26.353-63.462H42.487c-8.912 0-16.134 7.223-16.134 16.134s7.223 16.134 16.134 16.134h137.681c8.912 0 16.134-7.223 16.134-16.134s-7.222-16.134-16.134-16.134z"/></svg>
            <span>Order</span>
        </a>
        <a href="{{route('frontend.vendor_analytics')}}" class="nav-link active">
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
@section('after-scripts-end')
<script src="{{ asset('mobile/assets/js/dashboard/dashboard-2.js')}}"></script>
@endsection
