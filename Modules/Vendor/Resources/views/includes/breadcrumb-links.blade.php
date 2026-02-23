<a class="text-decoration-none text-reset" href="{{ route('admin.deleted.vendor') }}">{{ __('vendor::menus.backend.vendor.delete_vendor') }}</a>
<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('vendor::menus.backend.vendor.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.vendor.index') }}">{{ __('vendor::menus.backend.vendor.all') }}</a>
                @can('admin.access.vendor.create')
                <a class="dropdown-item" href="{{ route('admin.vendor.create') }}">{{ __('vendor::menus.backend.vendor.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>