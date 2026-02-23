@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('header')
<header class="header">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{route('frontend.index')}}" class="back-btn">
                        <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                        </svg>
                    </a>
                    <h5 class="title mb-0 text-nowrap">Profile</h5>
                </div>
                <div class="mid-content">
                </div>
                {{-- <div class="right-content">
                    <a href="javascript:void(0);" class="menu-toggler">
                        <svg class="text-dark" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><path d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z"></path></svg>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</header>
@endsection
@section('sidebar')
   <!-- Sidebar -->
    <div class="dark-overlay"></div>
    <div class="sidebar style-2">
        <a href="{{route('frontend.index')}}" class="side-menu-logo">
            <img src="{{asset('mobile/assets/images/tea-light-green-logo.png')}}" alt="logo">
        </a>
        <ul class="nav navbar-nav">
            <li class="nav-label">Main Menu</li>
            <li>
                <a class="nav-link" href="{{route('frontend.index')}}">
                    <span class="dz-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/>
                        </svg>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <!--<li>
                <a class="nav-link" href="package.html">
                    <span class="dz-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M12.6 18.06c-.36.28-.87.28-1.23 0l-6.15-4.78c-.36-.28-.86-.28-1.22 0-.51.4-.51 1.17 0 1.57l6.76 5.26c.72.56 1.73.56 2.46 0l6.76-5.26c.51-.4.51-1.17 0-1.57l-.01-.01c-.36-.28-.86-.28-1.22 0l-6.15 4.79zm.63-3.02l6.76-5.26c.51-.4.51-1.18 0-1.58l-6.76-5.26c-.72-.56-1.73-.56-2.46 0L4.01 8.21c-.51.4-.51 1.18 0 1.58l6.76 5.26c.72.56 1.74.56 2.46-.01z"/></svg>
                    </span>
                    <span>Package</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="pages.html">
                    <span class="dz-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M12.6 18.06c-.36.28-.87.28-1.23 0l-6.15-4.78c-.36-.28-.86-.28-1.22 0-.51.4-.51 1.17 0 1.57l6.76 5.26c.72.56 1.73.56 2.46 0l6.76-5.26c.51-.4.51-1.17 0-1.57l-.01-.01c-.36-.28-.86-.28-1.22 0l-6.15 4.79zm.63-3.02l6.76-5.26c.51-.4.51-1.18 0-1.58l-6.76-5.26c-.72-.56-1.73-.56-2.46 0L4.01 8.21c-.51.4-.51 1.18 0 1.58l6.76 5.26c.72.56 1.74.56 2.46-.01z"/></svg>
                    </span>
                    <span>Pages</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="ui-components.html">
                    <span class="dz-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/></svg>
                    </span>
                    <span>Components</span>
                </a>
            </li>-->
            <li>
                <a class="nav-link" href="{{route('frontend.profile')}}">
                    <span class="dz-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-1c0-2.66-5.33-4-8-4z"/></svg>
                    </span>
                    <span>Profile</span>
                </a>
            </li>
            <!--<li>
                <a class="nav-link" href="chat.html">
                    <span class="dz-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM7 9h10c.55 0 1 .45 1 1s-.45 1-1 1H7c-.55 0-1-.45-1-1s.45-1 1-1zm6 5H7c-.55 0-1-.45-1-1s.45-1 1-1h6c.55 0 1 .45 1 1s-.45 1-1 1zm4-6H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1z"/></svg>
                    </span>
                    <span>Chat</span>
                    <span class="badge badge-circle badge-info">5</span>
                </a>
            </li>-->
            <li><a class="nav-link" href="{{route('frontend.index')}}">
                <span class="dz-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g></g><g><g><path d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z"/><path d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z"/></g></g></svg>
                </span>
                <span>Logout</span>
            </a></li>
            <li class="nav-label">Settings</li>
            <!--<li class="nav-color" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                <a href="javascript:void(0);" class="nav-link">
                    <span class="dz-icon">
                        <svg class="color-plate" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000">
                            <path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                        </svg>
                    </span>
                    <span>Color Theme</span>
                </a>
            </li>-->
            <li>
                <div class="mode">
                    <span class="dz-icon">
                        <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g></g><g><g><g><path d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z"/></g></g></g>
                        </svg>
                    </span>
                    <span class="text-dark">Dark Mode</span>
                    <div class="custom-switch">
                        <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
                        <label class="custom-switch-label" for="toggle-dark-menu"></label>
                    </div>
                </div>
            </li>
        </ul>
        <!--<a href="javascript:void(0);" onclick="deleteAllCookie()" class="btn btn-primary btn-sm cookie-btn">Delete Cookie</a>-->
        <div class="sidebar-bottom d-none">
            <h6 class="name">Tea</h6>
            <span class="ver-info">App Version 1.0</span>
        </div>
        <div class="author-box mt-auto mb-0">
            <div class="dz-media">
                <img src="{{asset('mobile/assets/images/avatar/5.jpg')}}" alt="author-image">
            </div>
            <div class="dz-info">
                <h5 class="name">Thura Tun</h5>
                <span>thura@.com</span>
            </div>
        </div>
    </div>
   <!-- Sidebar End -->
@endsection
@section('content')
<!-- Page Content -->
<div class="page-content bottom-content ">
    <div class="container profile-area">
        <div class="profile">
            <div class="d-flex align-items-center mb-3">
                <div class="media media-70 me-3">
                    <img src="{{ $logged_in_user->avatar }}" alt="/">
                </div>
                <div class="about-profile">
                    <h5 class="sub-title mb-0">{{ $logged_in_user->name }}</h5>
                    <h6 class="sub-title fade-text mb-1 font-w500">{{ $logged_in_user->email }}</h6>
                    <h6 class="sub-title fade-text mb-0 font-w500">{{ $logged_in_user->mobile }}</h6>
                </div>
                <a href="{{route('frontend.profile.edit')}}" class="edit-profile">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </div>
            <div class="location-box">
                <i class="location fa-solid fa-location-dot"></i>
                <div class="flex-1">
                    
                </div>
                {{-- <a href="javascript:void(0);" class="change-btn">Change</a> --}}
            </div>
        </div>
        <div class="profile-content border-0">
            <ul>
                <li>
                    {{-- <a href="{{route('frontend.orders')}}"> --}}
                    <a href="#">
                        <i class="fa-solid fa-clock"></i>
                        My Orders
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-credit-card"></i>
                        Payments & Wallet
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-star"></i>
                        Ratings & Review
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-bell"></i>
                        Notification
                        <span class="badge badge-circle align-items-center badge-danger ms-auto me-3">1</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        <i class="fa-solid fa-location-dot"></i>
                        Delivery Address
                    </a>
                </li>

                <li class="border-0">
                    <x-utils.link
                    :text="__('Logout')"
                    class="nav-link"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <x-slot name="text">
                        <i class="fa-solid fa-power-off"></i>
                        @lang('Logout')
                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                    </x-slot>
                    </x-utils.link>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('footer')
    <!-- Menubar -->
	{{-- <div class="menubar-area style-2 footer-fixed border-top rounded-0">
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
			<a href="{{route('frontend.shopping-cart')}}" class="nav-link">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 456.569 456.569"><path d="M345.805 339.465c-29.323-.028-53.117 23.72-53.146 53.043s23.72 53.117 53.043 53.146 53.117-23.72 53.146-53.043v-.051c-.028-29.292-23.752-53.038-53.043-53.095zm94.171-254.244a20.44 20.44 0 0 0-3.855-.373H112.845l-5.12-34.253c-3.19-22.748-22.648-39.673-45.619-39.68H20.48C9.169 10.915 0 20.084 0 31.395s9.169 20.48 20.48 20.48h41.677a5.12 5.12 0 0 1 5.12 4.506l31.539 216.166c4.324 27.468 27.951 47.732 55.757 47.821h213.043c26.771.035 49.866-18.78 55.245-45.005l33.331-166.144c2.149-11.105-5.111-21.849-16.216-23.998zM215.737 390.286c-1.247-28.463-24.737-50.869-53.228-50.77h0c-29.299 1.184-52.091 25.896-50.907 55.195 1.136 28.113 24.005 50.458 52.136 50.943h1.28c29.295-1.284 52.002-26.073 50.719-55.368z"/></svg>
			</a>
			<a href="{{route('frontend.favourite')}}" class="nav-link">
				<svg enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m256.001 477.407c-2.59 0-5.179-.669-7.499-2.009-2.52-1.454-62.391-36.216-123.121-88.594-35.994-31.043-64.726-61.833-85.396-91.513-26.748-38.406-40.199-75.348-39.982-109.801.254-40.09 14.613-77.792 40.435-106.162 26.258-28.848 61.3-44.734 98.673-44.734 47.897 0 91.688 26.83 116.891 69.332 25.203-42.501 68.994-69.332 116.891-69.332 35.308 0 68.995 14.334 94.859 40.362 28.384 28.563 44.511 68.921 44.247 110.724-.218 34.393-13.921 71.279-40.728 109.632-20.734 29.665-49.426 60.441-85.279 91.475-60.508 52.373-119.949 87.134-122.45 88.588-2.331 1.354-4.937 2.032-7.541 2.032z"/></svg>
			</a>
			<a href="{{route('frontend.profile')}}" class="nav-link">
				<div class="media media-25 rounded-circle mx-auto">
					<img src="{{asset('mobile/assets/images/avatar/9.jpg')}}" alt="/">
				</div>
			</a>
		</div>
	</div> --}}
	<!-- Menubar -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Select a location</h5>
					<button class="btn-close" data-bs-dismiss="modal">
						<i class="fa-solid fa-xmark"></i>
					</button>
				</div>
				<div class="modal-body">
					<!-- <input type="text" class="form-control" placeholder="Search for area, street name.."> -->
					<div class="input-group input-radius mb-0">
						<span class="input-group-text">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.9395 1.9313C5.98074 1.9313 1.94141 5.97063 1.94141 10.9294C1.94141 15.8881 5.98074 19.9353 10.9395 19.9353C13.0575 19.9353 15.0054 19.193 16.5449 17.9606L20.293 21.7067C20.4821 21.888 20.7347 21.988 20.9967 21.9854C21.2587 21.9827 21.5093 21.8775 21.6947 21.6924C21.8801 21.5073 21.9856 21.2569 21.9886 20.9949C21.9917 20.7329 21.892 20.4802 21.7109 20.2908L17.9629 16.5427C19.1963 15.0008 19.9395 13.0498 19.9395 10.9294C19.9395 5.97063 15.8982 1.9313 10.9395 1.9313ZM10.9395 3.93134C14.8173 3.93134 17.9375 7.05153 17.9375 10.9294C17.9375 14.8072 14.8173 17.9352 10.9395 17.9352C7.06162 17.9352 3.94141 14.8072 3.94141 10.9294C3.94141 7.05153 7.06162 3.93134 10.9395 3.93134Z" fill="#7D8FAB"></path>
							</svg>
						</span>
						<input type="text" placeholder="Search for area, street name.." class="form-control main-in ps-0 bs-0">
					</div>
				</div>
				<div class="modal-footer pt-0">
					<a href="javascript:void(0);" class="btn btn-primary light btn-block" data-bs-dismiss="modal">Add</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Theme Color Settings  -->
    {{-- @include('mobile.includes.theme-color-settings') --}}
     <!-- Theme Color Settings End -->

@endsection
