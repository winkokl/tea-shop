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
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.70632 17.9907C1.26501 18.0166 0.830995 17.8682 0.495801 17.5767C-0.165267 16.904 -0.165267 15.8175 0.495801 15.1447L14.971 0.501017C15.6586 -0.149851 16.7375 -0.11367 17.3809 0.5819C17.9627 1.2109 17.9966 2.17769 17.4603 2.84679L2.89977 17.5767C2.56889 17.864 2.14185 18.0121 1.70632 17.9907Z" fill="black"/>
                            <path d="M16.1645 17.9907C15.7173 17.9888 15.2886 17.8092 14.971 17.4905L0.495743 2.84675C-0.116702 2.12323 -0.0334367 1.03438 0.681756 0.414752C1.32008 -0.138251 2.26149 -0.138251 2.89976 0.414752L17.4603 15.0585C18.1477 15.7095 18.1832 16.801 17.5397 17.4964C17.5141 17.5241 17.4876 17.5508 17.4603 17.5767C17.1037 17.8904 16.6345 18.0403 16.1645 17.9907Z" fill="black"/>
                        </svg>
                    </a>
                    <h5 class="title mb-0 text-nowrap">Edit profile</h5>
                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                    <a href="javascript:void(0);" class="text-dark font-20">
                        <i class="fa-solid fa-check"></i>
                    </a>
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
    <div class="container pb">
        <div class="image-upload">
            <div class="input-mini">
                <input type="file" class="imageuplodify" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
            </div>
            <!-- <img src="../assets/images/tea-story.png" alt="image"> -->
        </div>
        <div class="edit-area">
            <div class="input-mini form-group">
                <input type="text" class="form-control" placeholder="Store Name">
            </div>
            <div class="input-mini form-group">
                <input type="text" class="form-control" placeholder="Store Address">
            </div>
            <p class="text-center mt-3 mb-2 text-dark">Please enter vaild Lattitude & Longitude otherwise app may not work properly.</p>
            <div class="input-mini form-group">
                <input type="text" class="form-control" placeholder="Store Latitude">
            </div>
            <div class="input-mini form-group">
                <input type="text" class="form-control" placeholder="Store Longitude">
            </div>
            <div class="input-mini form-group">
                <input type="text" class="form-control" placeholder="Zipcode">
            </div>
            <div class="input-mini form-group">
                <textarea class="form-control" placeholder="Description" rows="4"></textarea>
            </div>
            <ul class="store-time">
                <li>
                    <span>Open Time</span>
                    <input type="time" class="form-control" value="10:00">
                </li>
                <li>
                    <span>Close Time</span>
                    <input type="time" class="form-control" value="23:00">
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('footer')
<!-- Footer -->
<div class="footer fixed">
    <div class="container">
        <a href="{{route('frontend.vendor_profile')}}" class="btn btn-primary btn-block">UPDATE</a>
    </div>
</div>
<!-- Footer -->
@endsection
@section('after-scripts-end')
<script src="{{ asset('mobile/assets/vendor/imageuplodify/imageuploadify.min.js')}}"></script>
<script>
	$(document).ready(function() {
		$('input[type="file"]').imageuploadify();
	})
</script>
@endsection
