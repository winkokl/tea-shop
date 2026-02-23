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
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.70632 17.9907C1.26501 18.0166 0.830995 17.8682 0.495801 17.5767C-0.165267 16.904 -0.165267 15.8175 0.495801 15.1447L14.971 0.501017C15.6586 -0.149851 16.7375 -0.11367 17.3809 0.5819C17.9627 1.2109 17.9966 2.17769 17.4603 2.84679L2.89977 17.5767C2.56889 17.864 2.14185 18.0121 1.70632 17.9907Z" fill="black"/>
                            <path d="M16.1645 17.9907C15.7173 17.9888 15.2886 17.8092 14.971 17.4905L0.495743 2.84675C-0.116702 2.12323 -0.0334367 1.03438 0.681756 0.414752C1.32008 -0.138251 2.26149 -0.138251 2.89976 0.414752L17.4603 15.0585C18.1477 15.7095 18.1832 16.801 17.5397 17.4964C17.5141 17.5241 17.4876 17.5508 17.4603 17.5767C17.1037 17.8904 16.6345 18.0403 16.1645 17.9907Z" fill="black"/>
                        </svg>
                    </a> --}}
                    <a href="{{route('frontend.profile')}}" class="back-btn">
                        <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                        </svg>
                    </a>
                    <h5 class="title mb-0 text-nowrap">Edit profile</h5>
                </div>
                <div class="mid-content">
                </div>
                {{-- <div class="right-content">
                    <a href="javascript:void(0);" class="text-dark font-20">
                        <i class="fa-solid fa-check"></i>
                    </a>
                </div> --}}
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
        <div class="edit-profile">
            @include('mobile.includes.partials.messages')
            <div class="profile-image">
                <div class="media media-100 rounded-circle">
                    <img src="{{asset('mobile/assets/images/avatar/5.jpg')}}" alt="/">
                </div>
                <a href="javascript:void(0);">Change profile photo</a>
            </div>
            <x-forms.patch :action="route('frontend.user.profile.update')" id="updateProfile">
                <div class="mb-3 input-group input-mini">
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name">
                </div>
                <div class="mb-3 input-group input-mini">
                    <input  type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email" >
                </div>
                {{-- <div class="mb-3 input-group input-mini">
                    <input type="url" class="form-control" placeholder="Website">
                </div>
                <div class="mb-3 input-group input-mini">
                    <input type="text" class="form-control" placeholder="Bio">
                </div> --}}
                <br><br>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit" style="margin-top:2px;width:100%">UPDATE</button>
                </div>
            </x-forms.patch>
        </div>
        {{-- <ul class="link-list">
            <li>
                <a href="javascript:void(0);">Add Link</a>
            </li>
            <li>
                <a href="javascript:void(0);">Switch to professional account</a>
            </li>
            <li>
                <a href="javascript:void(0);">Create avatar</a>
            </li>
            <li>
                <a href="javascript:void(0);">Personal information settings</a>
            </li>
        </ul> --}}
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('after-scripts-end')
<script src="{{ asset('mobile/index.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/lightgallery/dist/lightgallery.umd.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.umd.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/lightgallery/dist/plugins/zoom/lg-zoom.umd.js')}}"></script>
<script src="{{ asset('build/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{ asset('build/jquery-validate/additional-methods.js')}}"></script>

<script>
    $(document).ready(function(){
        // add a validator method named 'maxDate'
        // $.validator.addMethod("maxDate", function(value, element) {
        //         check_out = new Date($('.check_out').val());
        //         check_in = new Date($('.check_in').val());
        //         if (check_in < check_out)
        //             return true;
        //         return false;
        //     }, "This Date must be after Check In Date!");

        $("#updateProfile").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
                email: {
                    required: true,
                    email: true,
                }
            },
            ,
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				email: "Please enter a valid email address",
			}
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection
