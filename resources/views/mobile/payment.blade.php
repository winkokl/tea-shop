@extends('mobile.layouts.master')

@section('title', __('Tea'))
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
                    <h5 class="title mb-0 text-nowrap">Payment</h5>
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
        <div class="title-bar">
            <h6 class="mb-0">Select Payment mode</h6>
        </div>
        <div class="card payment-service">
            <div class="card-header border-0 pb-0">
                <h5 class="card-title sub-title">Cards</h5>
                <div class="active-style"></div>
            </div>
            <div class="card-body">
                <ul class="card-list">
                    <li>
                        <a href="javascript:void(0);" class="card-key" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <i class="fa-solid fa-credit-card me-2 icon-bx"></i>
                            Add Credit, Debit & ATM Cards
                            <svg class="ms-auto" width="10" height="14" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.25005 17.25C1.05823 17.25 0.866234 17.1767 0.719797 17.0303C0.426734 16.7372 0.426734 16.2626 0.719797 15.9698L7.68955 9.00001L0.719797 2.03026C0.426734 1.7372 0.426734 1.26263 0.719797 0.969757C1.01286 0.676882 1.48742 0.676695 1.7803 0.969757L9.2803 8.46976C9.57336 8.76283 9.57336 9.23739 9.2803 9.53027L1.7803 17.0303C1.63386 17.1767 1.44186 17.25 1.25005 17.25Z" fill="#000"/>
                            </svg>
                        </a>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title">ADD CARD</h5>
                                        <button class="btn-close" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <div class="form-item">
                                                <label class="form-label">Card holder Name</label>
                                                <input type="text" class="form-control" autocomplete="off" required>
                                            </div>
                                            <div class="form-item">
                                                <label class="form-label">Card Number</label>
                                                <input type="number" class="form-control" autocomplete="off" placeholder="**** **** **** ****" required>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="form-item me-2">
                                                    <label class="form-label">Expiry Date</label>
                                                    <input type="text" class="form-control" autocomplete="off" placeholder="MM / YY" required>
                                                </div>
                                                <div class="form-item">
                                                    <label class="form-label">Security Code</label>
                                                    <input type="password" class="form-control" autocomplete="off" placeholder="..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-primary d-block" data-bs-dismiss="modal">Added</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card payment-service">
            <div class="card-header border-0 pb-0">
                <h5 class="card-title sub-title">UPI</h5>
                <div class="active-style"></div>
            </div>
            <div class="card-body">
                <ul class="card-list">
                    <li>
                        <div class="accordion style-2" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        <i class="fa-solid fa-money-check icon-bx me-2"></i>
                                        Pay via UPI
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form">
                                            <div class="form-item">
                                                <label class="form-label">Link via UPI</label>
                                                <input type="number" class="form-control" placeholder="Enter your UPI ID" autocomplete="off" required>
                                            </div>
                                            <a href="javascrpit:void(0);" class="btn btn-primary btn-block">Continue</a>
                                            <div class="d-flex align-items-center mt-3">
                                                <i class="fa-solid fa-shield me-2"></i>
                                                <p class="info-line">Your UPI ID Will be encrypted and is 100% safe with us.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card payment-service">
            <div class="card-header border-0 pb-0">
                <h5 class="card-title sub-title">Wallet</h5>
                <div class="active-style"></div>
            </div>
            <div class="card-body">
                <ul class="card-list">
                    <li>
                        <div class="accordion style-2" id="accordionExample1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <i class="fa-solid fa-wallet icon-bx me-2"></i>
                                        Wallet
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body pt-0">
                                        <div class="form">
                                            <label class="form-label">Link Your Wallet</label>
                                                <div class="input-group form-item">
                                                <span class="input-group-text py-0">
                                                    <a href="javascript:void(0);">
                                                        <img src="assets/images/india-flag-icon.svg" alt="">
                                                        91
                                                    </a>
                                                </span>
                                                <input type="number" class="form-control bs-0" autocomplete="off" required>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-primary btn-block">Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card payment-service">
            <div class="card-header border-0 pb-0">
                <h5 class="card-title sub-title">Netbanking</h5>
                <div class="active-style"></div>
            </div>
            <div class="card-body">
                <ul class="card-list">
                    <li>
                        <div class="accordion style-2" id="accordionExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        <i class="fa-solid fa-building-columns icon-bx me-2"></i>
                                        Netbanking
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Netbannking</button>
                                    </div>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                        <div class="offcanvas-body">
                                            <h2 class="dz-title text-dark mb-3">Tanam</h2>
                                            <div class="form border-bottom">
                                                <div class="input-group form-item">
                                                    <span class="input-group-text">
                                                        <a href="javascript:void(0);">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="#B9B9B9"></path>
                                                            </svg>
                                                        </a>
                                                    </span>
                                                    <input type="Search" class="form-control bs-0" autocomplete="off" required placeholder="Search By Bank Name">
                                                </div>
                                            </div>
                                            <h5 class="title-bar">All Banks</h5>
                                            <ul class="item-list">
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Bank Of india
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Bank Of Maharasthra
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Canara Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        HDFC Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        IDFC Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Catholic Syrian Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Catholic Syrian Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Central Bank of India
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        City Union Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Corporation Bank
                                                    </a>
                                                </li>
                                                <li class="list">
                                                    <a href="javascript:void(0);">
                                                        Cosmos Bank
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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

