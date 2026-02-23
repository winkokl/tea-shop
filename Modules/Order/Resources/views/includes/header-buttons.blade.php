@can('admin.access.order.create')
<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.order.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="{{ __('order::menus.backend.order.create') }}"><i class="fas fa-plus-circle"></i></a>
</div>
<!--btn-toolbar-->
@endcan