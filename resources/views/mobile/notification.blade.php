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
                    <h5 class="title mb-0 text-nowrap">Notification</h5>
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
    <div class="container profile-area pb-0">
        <div class="title-bar">
            <h5 class="mb-0">Today</h5>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic1.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">5h ago</small>
                <div class="text-notify"><span class="text-primary">@davidjr</span> rmention you in a comment: <span class="text-primary">@joviedan Lol</span></div>
                <small>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do”</small>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic2.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">6h ago</small>
                <div class="text-notify"><span class="text-primary">@henry and 5 others</span> liked your message</div>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic3.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">5h ago</small>
                <div class="text-notify"><span class="text-primary">@emilia and 2 others</span> liked your message</div>
            </div>
        </div>
        <div class="title-bar">
            <h5 class="mb-0">This year</h5>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic1.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">5h ago</small>
                <div class="text-notify"><span class="text-primary">@davidjr</span> rmention you in a comment: <span class="text-primary">@joviedan Lol</span></div>
                <small>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do”</small>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic2.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">5h ago</small>
                <div class="text-notify"><span class="text-primary">@lucas</span> rmention you in a story</div>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic3.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">6h ago</small>
                <div class="text-notify"><span class="text-primary">@henry and 5 others</span> liked your message</div>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic4.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">5h ago</small>
                <div class="text-notify"><span class="text-primary">@davidjr</span> rmention you in a comment: <span class="text-primary">@joviedan Lol</span></div>
                <small>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do”</small>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic5.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">5h ago</small>
                <div class="text-notify"><span class="text-primary">@lucas</span> rmention you in a story</div>
            </div>
        </div>
        <div class="notification">
            <div class="media media-65">
                <img class="rounded" src="{{asset('mobile/assets/images/message/pic6.jpg')}}" alt="/">
            </div>
            <div class="notification-content">
                <small class="mb-1">6h ago</small>
                <div class="text-notify"><span class="text-primary">@henry and 5 others</span> liked your message</div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
