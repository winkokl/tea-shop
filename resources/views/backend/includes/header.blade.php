<header class="c-header c-header-light c-header-fixed">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <i class="c-icon c-icon-lg cil-menu"></i>
    </button>

    <a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
        </svg>
    </a>

    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <i class="c-icon c-icon-lg cil-menu"></i>
    </button>

    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('frontend.index') }}">@lang('Home')</a></li>

        @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            <li class="c-header-nav-item dropdown">
                <x-utils.link
                    :text="__(getLocaleName(app()->getLocale()))"
                    class="c-header-nav-link dropdown-toggle"
                    id="navbarDropdownLanguageLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false" />

                @include('includes.partials.lang')
            </li>
        @endif
    </ul>

    <ul class="c-header-nav ml-auto mr-5">
        {{-- <li class="c-header-nav-item  dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-clipboard-list"></i>
              <span class="badge badge-danger navbar-badge">{{$no_deliver_order}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <p class="text-sm">
                                @if($no_deliver_order == 0)
                                    You don't have notifications
                                @else
                                    Hello Administrator, We got {{$no_deliver_order}} inactive order(s) within 7 Days in Order Management
                                @endif
                            </p>
                      </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All</a>
            </div>
        </li>
        <li class="c-header-nav-item  dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-cube"></i>
              <span class="badge badge-danger navbar-badge">{{$inactive_product}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <p class="text-sm">
                                @if($inactive_product == 0)
                                    You don't have notifications
                                @else
                                    Hello Administrator, We got {{$inactive_product}} inactive product(s) within 7 Days in Product Management
                                @endif
                            </p>
                      </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                
                <a href="#" class="dropdown-item dropdown-footer">See All</a>
            </div>
        </li>
        <li class="c-header-nav-item  dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-bell"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <p class="text-sm">
                                You have 3 notifications
                            </p>
                      </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All</a>
            </div>
        </li> --}}
        <li class="c-header-nav-item dropdown">
            <x-utils.link class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <x-slot name="text">
                    <div class="c-avatar">
                        <?php $logo = "https://gravatar.com/avatar/".md5(strtolower(trim(auth()->user()->email ? auth()->user()->email : 'testing@gmail.com')))."?s=".config('boilerplate.avatar.size')."&d=mp" ?>
                        <img class="c-avatar-img" src="{{ $logo }}" alt="{{ $logged_in_user->email ?? $logged_in_user->mobile }}">
                    </div>
                </x-slot>
            </x-utils.link>

            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2">
                    <strong>@lang('Account')</strong>
                </div>

                <x-utils.link
                    class="dropdown-item"
                    icon="c-icon mr-2 cil-account-logout"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <x-slot name="text">
                        @lang('Logout')
                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                    </x-slot>
                </x-utils.link>
            </div>
        </li>
    </ul>

    <div class="c-subheader justify-content-between px-3">
        @include('backend.includes.partials.breadcrumbs')

        <div class="c-subheader-nav mfe-2">
            @yield('breadcrumb-links')
        </div>
    </div><!--c-subheader-->
</header>
