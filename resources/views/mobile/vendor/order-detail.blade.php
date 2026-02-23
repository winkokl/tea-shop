@extends('mobile.layouts.master')

@section('title', __('Tea'))
@section('header')
<!-- Header -->
<header class="header">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{route('frontend.vendor_orders')}}" class="back-btn">
                        <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"></path><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"></path>
                        </svg>
                    </a>
                    <h5 class="title mb-0 text-nowrap">Order Detail</h5>
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
        <h5 class="title border-bottom pb-1 font-w600">Orders</h5>
        <div class="order-summery">
            <ul class="summery-list mb-4">
                <li>
                    <p class="order-name">Apple Royal Gala 4pcs - 1kg - $10.0</p>
                    <span class="order-quantity">x1</span>
                </li>
                <li>
                    <h6 class="mb-0 font-12">Order item Total</h6>
                    <span class="font-12 font-w600 text-dark">$157.32</span>
                </li>
                <li>
                    <h6 class="mb-0 font-12">Order Delivery Charge</h6>
                    <span class="font-12 font-w600 text-dark">$15.35</span>
                </li>
                <li>
                    <h6 class="mb-0 font-12">Split Order Tax</h6>
                    <span class="font-12 font-w600 text-dark">$1.0</span>
                </li>
                <li>
                    <h6 class="mb-0 font-12">Split Order Discount</h6>
                    <span class="font-12 font-w600 text-dark">$0.0</span>
                </li>
                <li>
                    <h6 class="mb-0 font-12">Split Order Wallet Discount</h6>
                    <span class="font-12 font-w600 text-dark">$0.0</span>
                </li>
                <li>
                    <h6 class="mb-0 font-14 text-primary">AMMOUNT TO COLLECT</h6>
                    <span class="font-14 font-w600 text-primary">$352.17</span>
                </li>
            </ul>
            <div class="deliver-location mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="font-w600 flex-1">Deliver to</span>
                    <span class="font-w800">HOME</span>
                </div>
                <h6 class="address font-14">
                    ABC 132, Mahaveer Nagar Ext. Near Mh-Park Kota, rajasthan
                </h6>
            </div>
            <h5 class="title border-bottom pb-2 mb-2 font-w600">Basic Detail</h5>
            <div class="view-title mb-4">
                <ul>
                    <li>
                        <span>Order ID</span>
                        <span class="text-dark">277</span>
                    </li>
                    <li>
                        <span>Payment Method</span>
                        <span class="text-dark">COD</span>
                    </li>
                    <li>
                        <span>Delivery On</span>
                        <span class="text-dark">Monday, February 13,2023 6:53pm</span>
                    </li>
                </ul>
            </div>
            <h5 class="title border-bottom pb-2 mb-2 font-w600">Order Tracking</h5>
            <ul class="dz-timeline style-2 mb-5">
                <li class="timeline-item active">
                    <h6 class="timeline-tilte">Order Created</h6>
                    <p class="timeline-date">Feb 8,2023-12:20pm</p>
                </li>
                <li class="timeline-item process">
                    <h6 class="timeline-tilte">Order Recived</h6>
                    <p class="timeline-date">Feb 8,2023-12:20pm</p>
                </li>
                <li class="timeline-item">
                    <h6 class="timeline-tilte">Order Confirmed</h6>
                    <p class="timeline-date">Feb 8,2023-12:20pm</p>
                </li>
                <li class="timeline-item">
                    <h6 class="timeline-tilte">Order Processed</h6>
                    <p class="timeline-date">Feb 8,2023-12:20pm</p>
                </li>
                <li class="timeline-item">
                    <h6 class="timeline-tilte">Order Delivered</h6>
                    <p class="timeline-date">Feb 8,2023-12:20pm</p>
                </li>
            </ul>
            <h5 class="title border-bottom pb-2 mb-2 font-w600">User Information</h5>
            <div class="item-list style-6 m-b30">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-65">
                                <img src="{{asset('mobile/assets/images/avatar/1.jpg')}}" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title mb-1 sub-title"><a href="javascript:void(0);">Mutahi Muturi</a></h6>
                                    <span class="info"><i class="fa-solid me-1 fa-envelope"></i>test@gmail.com</span>
                                    <span class="info"><i class="fa-solid me-1 fa-phone"></i>1234567890</span>
                                </div>
                            </div>
                            <div class="deliver-icon">
                                <svg  height="24" viewBox="0 0 548.244 548.244" width="24" xmlns="http://www.w3.org/2000/svg"><g><g><path clip-rule="evenodd" d="m392.19 156.054-180.922 125.613-189.236-63.087c-13.209-4.412-22.108-16.805-22.032-30.728.077-13.923 9.078-26.24 22.338-30.498l483.812-155.805c11.5-3.697 24.123-.663 32.666 7.88 8.542 8.543 11.577 21.165 7.879 32.666l-155.805 483.811c-4.258 13.26-16.575 22.261-30.498 22.338-13.923.076-26.316-8.823-30.728-22.032l-63.393-190.153z" fill-rule="evenodd"/></g></g></svg>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <h5 class="title border-bottom pb-2 mb-2 font-w600">Store Information</h5>
            <div class="item-list style-6">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-65">
                                <img src="{{asset('mobile/assets/images/store/store1.jpg')}}" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h6 class="item-title mb-1 sub-title"><a href="javascript:void(0);">Fresh Market</a></h6>
                                    <span class="info"><i class="fa-solid me-1 fa-envelope"></i>test@gmail.com</span>
                                    <span class="info"><i class="fa-solid me-1 fa-phone"></i>1234567890</span>
                                </div>
                            </div>
                            <div class="deliver-icon">
                                <svg  height="24" viewBox="0 0 548.244 548.244" width="24" xmlns="http://www.w3.org/2000/svg"><g><g><path clip-rule="evenodd" d="m392.19 156.054-180.922 125.613-189.236-63.087c-13.209-4.412-22.108-16.805-22.032-30.728.077-13.923 9.078-26.24 22.338-30.498l483.812-155.805c11.5-3.697 24.123-.663 32.666 7.88 8.542 8.543 11.577 21.165 7.879 32.666l-155.805 483.811c-4.258 13.26-16.575 22.261-30.498 22.338-13.923.076-26.316-8.823-30.728-22.032l-63.393-190.153z" fill-rule="evenodd"/></g></g></svg>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('footer')
<div class="footer fixed">
    <div class="container p-2">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-block btn-md btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Choose Status</button>
            <a href="{{route("frontend.vendor_orders")}}" class="btn btn-md btn-primary btn-block">Update Status</a>
        </div>
    </div>
</div>

<!-- MODAL BODY -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Choose Status</h5>
            </div>
            <div class="modal-body">
                <div class="radio circle-radio">
                    <label class="radio-label" data-bs-dismiss="modal">Ongoing
                        <input type="radio" name="radio2">
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-label" data-bs-dismiss="modal">Delivered
                        <input type="radio" name="radio2">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

