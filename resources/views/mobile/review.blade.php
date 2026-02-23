@extends('mobile.layouts.master')

@section('title', __('Padesa'))
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
                    <h5 class="title mb-0 text-nowrap">Review</h5>
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
<!-- Review Start -->
<div class="content-body">
    <div class="container">
        <div class="review-box">
            <!-- Add Review	 -->
            <a href="javascript:void(0);" class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                <i class="fa-solid fa-plus"></i>
            </a>
            <div class="modal add-review fade" tabindex="-1" id="exampleModal1" aria-labelledby="exampleModal1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            <div class="p-4 pb-0">
                                <h2>What do you think?</h2>
                                <p class="text-soft">Please give me your rating by clicking on the stars below.</p>
                                <div class="pb-3">
                                    <div class="rating-stars">
                                        <ul id="stars">
                                            <li class="star" title="Poor" data-value="1">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Fair" data-value="2">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Good" data-value="3">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Excellent" data-value="4">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="WOW!!!" data-value="5">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3 input-group-icon">
                                <textarea class="form-control review" placeholder="Tell us about your experience." rows="5"></textarea>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-primary w-100 submit-btn">SUBMIT</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Review	 -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center border-bottom pb-3 mb-2">
                        <div class="media media-50 me-2">
                            <img class="rounded" src="{{asset('mobile/assets/images/avatar/5.jpg')}}" alt="/">
                        </div>
                        <div>
                            <h6 class="mb-0">James Hawkins</h6>
                            <span class="text-soft">32 minutes ago</span>
                        </div>
                    </div>
                    <div class="review-content">
                        <ul class="d-flex align-items-center">
                            <li class="pe-1">
                                <span class="font-w600 font-16 text-dark">4.5</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </li>
                        </ul>
                        <p class="font-15 mb-0 text-soft">
                            Tea team is fast and always deliver fresh Quality fruits. Higly Recommend!
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center border-bottom pb-3 mb-2">
                        <div class="media media-50 me-2">
                            <img class="rounded" src="{{asset('mobile/assets/images/avatar/1.jpg')}}" alt="/">
                        </div>
                        <div>
                            <h6 class="mb-0">David Martin</h6>
                            <span class="text-soft">1 hour ago</span>
                        </div>
                    </div>
                    <div class="review-content">
                        <ul class="d-flex align-items-center">
                            <li class="pe-1">
                                <span class="font-w600 font-16 text-dark">5</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                        </ul>
                        <p class="font-15 mb-0 text-soft">
                            Tea team is fast and always deliver fresh Quality fruits. Higly Recommend!
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center border-bottom pb-3 mb-2">
                        <div class="media media-50 me-2">
                            <img class="rounded" src="{{asset('mobile/assets/images/avatar/3.jpg')}}" alt="/">
                        </div>
                        <div>
                            <h6 class="mb-0">matt Goins</h6>
                            <span class="text-soft">1 days ago</span>
                        </div>
                    </div>
                    <div class="review-content">
                        <ul class="d-flex align-items-center">
                            <li class="pe-1">
                                <span class="font-w600 font-16 text-dark">4.5</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </li>
                        </ul>
                        <p class="font-15 mb-0 text-soft">
                            Tea team is fast and always deliver fresh Quality fruits. Higly Recommend!
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center border-bottom pb-3 mb-2">
                        <div class="media media-50 me-2">
                            <img class="rounded" src="{{asset('mobile/assets/images/avatar/6.jpg')}}" alt="/">
                        </div>
                        <div>
                            <h6 class="mb-0">Zoyas</h6>
                            <span class="text-soft">2 days ago</span>
                        </div>
                    </div>
                    <div class="review-content">
                        <ul class="d-flex align-items-center">
                            <li class="pe-1">
                                <span class="font-w600 font-16 text-dark">5</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                        </ul>
                        <p class="font-15 mb-0 text-soft">
                            Tea team is fast and always deliver fresh Quality fruits. Higly Recommend!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Review End -->
@endsection
