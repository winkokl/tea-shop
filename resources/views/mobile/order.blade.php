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
                    <h5 class="title mb-0 text-nowrap">My Orders</h5>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<div class="page-content">
    <!-- Page Content -->
    <div class="container pb">
        <div class="default-tab style-1">
            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab3" data-bs-toggle="tab" data-bs-target="#home-tab-pane3" type="button" role="tab" aria-controls="home-tab-pane3" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link d-flex align-items-center" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#profile-tab-pane3" type="button" role="tab" aria-controls="profile-tab-pane3" aria-selected="false">
                    <svg class="me-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="8" cy="8" r="7" fill="#FFA902" stroke="var(--bg-white)" stroke-width="2"/>
                    </svg>
                    On Delivery
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link d-flex align-items-center" id="contact-tab3" data-bs-toggle="tab" data-bs-target="#contact-tab-pane3" type="button" role="tab" aria-controls="contact-tab-pane3" aria-selected="false">
                    <svg class="me-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="8" cy="8" r="7" fill="var(--primary)" stroke="(--bg-white)" stroke-width="2"/>
                    </svg>
                    Completed
                </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent3">
                <div class="tab-pane fade show active" id="home-tab-pane3" role="tabpanel" aria-labelledby="home-tab-pane3" tabindex="0">
                    <div class="accordion style-3" id="accordionExample">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading1">
                                <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="#FFA902"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="#FFA902"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading2">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading3">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-danger me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading4">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane3" role="tabpanel" aria-labelledby="profile-tab-pane3" tabindex="0">
                    <div class="accordion style-3" id="accordionExample2">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading5">
                                <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="#FFA902"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="#FFA902"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse5" class="accordion-collapse collapse show" aria-labelledby="heading5" data-bs-parent="#accordionExample2">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading6">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample2">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading7">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-danger me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample2">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading8">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample2">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane3" role="tabpanel" aria-labelledby="contact-tab-pane3" tabindex="0">
                    <div class="accordion style-3" id="accordionExample3">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading9">
                                <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="#FFA902"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="#FFA902"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse9" class="accordion-collapse collapse show" aria-labelledby="heading9" data-bs-parent="#accordionExample3">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading10">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample3">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading11">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-danger me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample3">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading12">
                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="true" aria-controls="collapse12">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.929 1.628C20.8546 1.44247 20.7264 1.28347 20.5608 1.17153C20.3952 1.05959 20.1999 0.999847 20 1H4C3.80012 0.999847 3.60479 1.05959 3.43919 1.17153C3.2736 1.28347 3.14535 1.44247 3.071 1.628L1.071 6.628C1.02414 6.74643 1.00005 6.87264 1 7V22C1 22.2652 1.10536 22.5196 1.29289 22.7071C1.48043 22.8946 1.73478 23 2 23H22C22.2652 23 22.5196 22.8946 22.7071 22.7071C22.8946 22.5196 23 22.2652 23 22V7C23 6.87264 22.9759 6.74643 22.929 6.628L20.929 1.628ZM4.677 3H19.323L20.523 6H3.477L4.677 3ZM3 21V8H21V21H3Z" fill="var(--primary)"/>
                                                <path d="M10 17H6C5.73478 17 5.48043 17.1054 5.29289 17.2929C5.10536 17.4804 5 17.7348 5 18C5 18.2652 5.10536 18.5196 5.29289 18.7071C5.48043 18.8947 5.73478 19 6 19H10C10.2652 19 10.5196 18.8947 10.7071 18.7071C10.8946 18.5196 11 18.2652 11 18C11 17.7348 10.8946 17.4804 10.7071 17.2929C10.5196 17.1054 10.2652 17 10 17Z" fill="var(--primary)"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="sub-title">Order ID #0012345</h6>
                                            <ul class="item-status d-flex align-items-center">
                                                <li class="me-2 text-soft">12 Items</li>
                                                <li class="text-soft">On Delivery</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample3">
                                <div class="accordion-body pb-0">
                                    <ul class="p-2">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Placed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Order Confirmed</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="var(--primary)"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1">Your Order On Delivery by Courir</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="me-3">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#7D8FAB"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6 class="sub-title mb-1 text-soft">Order Delivered</h6>
                                                <span class="text-soft">January 19th, 12 : 02 AM</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
	<!-- Footer -->
	<div class="footer fixed">
		<div class="container">
			<a href="#" class="btn btn-primary text-start w-100">
				TRACK ORDER
			</a>
		</div>
	<!-- Footer -->
	</div>
@endsection

