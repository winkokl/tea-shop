@extends('mobile.layouts.master')

@section('title', __('Tea'))

@section('header')
    <!-- Header -->
    <header class="header">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="{{route('frontend.shopping_cart')}}" class="back-btn">
                            <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                            </svg>
                        </a>
                        <h5 class="title mb-0 text-nowrap">Checkout</h5>
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
    <div class="container bottom-content">
        <div id="DZWizardSteps" class="dz-wizard mb-2">
            <!-- Delivery -->
            <h3>
                <span class="box-1">
                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.8 7.91999L1.68 4.79999L0 6.47999L4.8 11.28L14.4 1.68L12.72 0L4.8 7.91999Z" fill="white"/>
                    </svg>
                </span>
                <span class="step-content">Delivery</span>
            </h3>
            <section>
                <div class="mb-3 input-group input-group-icon">
                    <div class="form-item">
                        <label class="form-label title-head" >Full Name</label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="mb-3 input-group input-group-icon">
                    <div class="form-item">
                        <label class="form-label title-head" >Email Address</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="mb-3 input-group input-group-icon">
                    <div class="form-item">
                        <label class="form-label title-head" >Phone</label>
                        <input type="number" class="form-control" placeholder="Enter your phone number">
                    </div>
                </div>
                <div class="mb-3 input-group input-group-icon">
                    <div class="form-item">
                        <label class="form-label title-head" >Address</label>
                        <input type="text" class="form-control" placeholder="Type your home address">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3 me-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >Zip Code</label>
                            <input type="number" class="form-control" placeholder="Enter here">
                        </div>
                    </div>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >City</label>
                            <input type="text" class="form-control" placeholder="Enter here">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label title-head">Country</label>
                    <select class="mb-2 dz-form-select form-select" aria-label="Default select example">
                        <option selected="" class="selected">Choose your country</option>
                        <option value="1">English</option>
                        <option value="2">hindi</option>
                        <option value="3">French</option>
                        <option value="4">Germany</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked="">
                    <label class="form-check-label title-head mb-0 mb-0" for="flexCheckChecked1">
                        Save shipping address
                    </label>
                </div>
            </section>
            <!-- Delivery -->

            <!-- Address -->
            <h3>
                <span class="box-1">
                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.8 7.91999L1.68 4.79999L0 6.47999L4.8 11.28L14.4 1.68L12.72 0L4.8 7.91999Z" fill="white"/>
                    </svg>
                </span>
                <span class="step-content">Address</span>
            </h3>
            <section>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >Full Name</label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >Email Address</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >Phone</label>
                            <input type="number" class="form-control" placeholder="Enter your phone number">
                        </div>
                    </div>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >Address</label>
                            <input type="text" class="form-control" placeholder="Type your home address">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-3 me-3 input-group input-group-icon">
                            <div class="form-item">
                                <label class="form-label title-head" >Zip Code</label>
                                <input type="number" class="form-control" placeholder="Enter here">
                            </div>
                        </div>
                        <div class="mb-3 input-group input-group-icon">
                            <div class="form-item">
                                <label class="form-label title-head" >City</label>
                                <input type="text" class="form-control" placeholder="Enter here">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label title-head">Country</label>
                        <select class="mb-2 dz-form-select form-select" aria-label="Default select example">
                            <option selected="" class="selected">Choose your country</option>
                            <option value="1">English</option>
                            <option value="2">hindi</option>
                            <option value="3">French</option>
                            <option value="4">Germany</option>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked="">
                        <label class="form-check-label title-head mb-0" for="flexCheckChecked2">
                            Save shipping address
                        </label>
                    </div>
            </section>
            <!-- Address -->

            <!-- Payment -->
            <h3>
                <span class="box-1">
                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.8 7.91999L1.68 4.79999L0 6.47999L4.8 11.28L14.4 1.68L12.72 0L4.8 7.91999Z" fill="white"/>
                    </svg>
                </span>
                <span class="step-content">Payment</span>
            </h3>
            <section>
                <div class="d-flex align-items-center mb-3">
                    <!-- Card Select -->
                    <div class="short-tag style-3" role="group" aria-label="radio toggle button">
                        <div class="clearfix">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
                            <label class="btn ms-2 mb-0 tag-btn" for="btnradio1">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8125 0C14.16 0 10.375 3.785 10.375 8.4375C10.375 13.09 14.16 16.875 18.8125 16.875C23.465 16.875 27.25 13.09 27.25 8.4375C27.25 3.785 23.465 0 18.8125 0ZM18.8125 13.125C17.8112 13.125 16.8781 12.5862 16.3769 11.7194C16.1175 11.2712 16.2706 10.6975 16.7188 10.4388C17.1669 10.1794 17.7406 10.3325 18 10.7806C18.1675 11.07 18.4788 11.25 18.8125 11.25C19.3294 11.25 19.75 10.8294 19.75 10.3125C19.75 9.79562 19.3294 9.375 18.8125 9.375C17.2619 9.375 16 8.11312 16 6.5625C16 5.01188 17.2619 3.75 18.8125 3.75C19.8138 3.75 20.7469 4.28875 21.2481 5.15562C21.5075 5.60375 21.3544 6.1775 20.9062 6.43687C20.4575 6.69562 19.8844 6.5425 19.625 6.09438C19.4575 5.805 19.1462 5.625 18.8125 5.625C18.2956 5.625 17.875 6.04562 17.875 6.5625C17.875 7.07938 18.2956 7.5 18.8125 7.5C20.3631 7.5 21.625 8.76188 21.625 10.3125C21.625 11.8631 20.3631 13.125 18.8125 13.125Z" fill="#7D8FAB"/>
                                    <path d="M1 21.6875V29.1875C1 29.7052 1.41975 30.125 1.9375 30.125H3.8125C4.33025 30.125 4.75 29.7052 4.75 29.1875V20.75H1.9375C1.41975 20.75 1 21.1697 1 21.6875Z" fill="#7D8FAB"/>
                                    <path d="M29.125 20.9137C28.6562 20.9137 28.2281 21.0856 27.8994 21.37L22.5306 26.375H16V24.5H21.3125C22.3481 24.5 23.1875 23.6606 23.1875 22.625C23.1875 21.5894 22.3481 20.75 21.3125 20.75H16.9375C15.7425 19.555 14.3837 18.875 12.6737 18.875C9.82687 18.875 10.0838 20.7313 6.625 20.75V28.55C11.5206 29.2062 13.6525 32 17.6144 32C22.9662 32 24.0338 30.0806 30.4013 24.1625C30.7694 23.82 31 23.3312 31 22.7887C31 21.7531 30.1606 20.9137 29.125 20.9137Z" fill="#7D8FAB"/>
                                </svg>
                                <span>Cash On Delivery</span>
                            </label>
                        </div>
                        <div class="clearfix">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" checked>
                            <label class="btn mb-0 tag-btn" for="btnradio2">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_364_170)">
                                    <path d="M31.9618 17.6005L29.5422 3.87805C29.3286 2.66655 28.275 1.81418 27.086 1.81418C26.9421 1.81418 5.89687 5.51174 5.89687 5.51174C4.53874 5.75124 3.63187 7.04637 3.87137 8.40449L4.10462 9.72743H23.098C25.5076 9.72743 27.4679 11.6877 27.4679 14.0973V15.8484V20.0965V20.9284L29.9363 20.4932C31.2944 20.2537 32.2013 18.9586 31.9618 17.6005Z" fill="#7D8FAB"/>
                                    <path d="M25.5949 21.9693H0V27.6888C0 29.0678 1.118 30.1858 2.49706 30.1858H23.0978C24.4769 30.1858 25.5949 29.0678 25.5949 27.6888V21.9693ZM7.43419 27.9361H3.18606C2.66894 27.9361 2.24969 27.5168 2.24969 26.9997C2.24969 26.4826 2.66894 26.0633 3.18606 26.0633H7.43419C7.95131 26.0633 8.37056 26.4826 8.37056 26.9997C8.37056 27.5168 7.95138 27.9361 7.43419 27.9361Z" fill="#7D8FAB"/>
                                    <path d="M0.00341797 13.9756H25.5921C25.5286 12.6531 24.4364 11.6003 23.0981 11.6003H2.49742C1.15917 11.6003 0.066918 12.6531 0.00341797 13.9756Z" fill="#7D8FAB"/>
                                    <path d="M0 15.8484H25.5949V20.0965H0V15.8484Z" fill="#7D8FAB"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_364_170">
                                    <rect width="32" height="32" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <span>Credit Card</span>
                            </label>
                        </div>
                        <div class="clearfix">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                            <label class="btn mb-0 me-0 tag-btn" for="btnradio3">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_364_194)">
                                    <path d="M30.5436 8.77775C29.3823 7.33225 27.5316 6.37506 25.4538 6.10944C24.7951 2.09425 21.2743 0 17.8896 0H5.69013L0.00244141 26H7.57338L6.22038 32H15.9139L17.8514 24H20.9216C23.5584 24 25.9592 23.2186 27.8642 21.7403C29.8393 20.2077 31.1849 17.9921 31.7559 15.3328C32.4615 12.0406 31.4861 9.951 30.5436 8.77775ZM3.10844 23.5L7.70238 2.5H17.8896C19.9759 2.5 22.2538 3.62344 22.89 6.0625H12.0693L8.13713 23.5H3.10844ZM22.9737 8.5625C22.9425 8.81775 22.9026 9.06069 22.8538 9.29C21.9661 13.4266 19.2524 15.4375 14.5575 15.4375H12.518L14.0683 8.5625H22.9737ZM29.3114 14.8084C28.4252 18.9359 25.2104 21.5 20.9216 21.5H15.8846L13.9471 29.5H9.34688L11.9543 17.9375H14.5575C17.3854 17.9375 19.7335 17.2774 21.5366 15.9754C23.4521 14.5923 24.7177 12.5195 25.2985 9.81262C25.3771 9.44381 25.4369 9.052 25.4796 8.64156C26.7765 8.8735 27.896 9.47388 28.5946 10.3435C29.4714 11.4349 29.7125 12.9372 29.3114 14.8084Z" fill="#7D8FAB"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_364_194">
                                    <rect width="32" height="32" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <span>Paipal Method</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="payment-card">
                    <div class="card-media">
                        <img src="{{asset('mobile/assets/images/payment/card.png')}}" alt="/">
                    </div>
                    <div class="card-info">
                        <div class="shape-img">
                            <img src="{{asset('mobile/assets/images/payment/shape.png')}}" alt="/">
                        </div>
                        <div class="clearfix">
                            <h5 class="card-name">A Bank</h5>
                            <p class="card-number">**** **** ****  ****</p>
                        </div>
                        <div class="bottom-info">
                            <div>
                                <p class="title-head">CARD HOLDER</p>
                                <h6 class="text-white sub-title">Louis Anderson</h6>
                            </div>
                            <div class="text-end">
                                <p class="title-head">VALID THRU</p>
                                <h6 class="text-white sub-title">08/21</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 input-group input-group-icon">
                    <div class="form-item">
                        <label class="form-label title-head" >Card Holder Name</label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="mb-3 input-group input-group-icon">
                    <div class="form-item">
                        <label class="form-label title-head" >Card Number</label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3 me-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >Month/Year</label>
                            <input type="number" class="form-control" placeholder="Enter here">
                        </div>
                    </div>
                    <div class="mb-3 input-group input-group-icon">
                        <div class="form-item">
                            <label class="form-label title-head" >CVV</label>
                            <input type="text" class="form-control" placeholder="Enter here">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label title-head">Country</label>
                    <select class="mb-2 dz-form-select form-select" aria-label="Default select example">
                        <option selected="" class="selected">Choose your country</option>
                        <option value="1">English</option>
                        <option value="2">hindi</option>
                        <option value="3">French</option>
                        <option value="4">Germany</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" checked="">
                    <label class="form-check-label title-head mb-0" for="flexCheckChecked3">
                        Save this card
                    </label>
                </div>
            </section>
            <!-- Payment -->
        </div>
    </div>
</div>
@endsection
