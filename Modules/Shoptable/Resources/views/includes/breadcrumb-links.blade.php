<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('shoptable::menus.backend.shoptable.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.shoptable.index') }}">{{ __('shoptable::menus.backend.shoptable.all') }}</a>
                @can('admin.access.shoptable.create')
                <a class="dropdown-item" href="{{ route('admin.shoptable.create') }}">{{ __('shoptable::menus.backend.shoptable.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>