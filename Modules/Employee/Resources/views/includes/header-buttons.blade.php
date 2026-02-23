@can('admin.access.employee.create')
<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.employee.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="{{ __('employee::menus.backend.employee.create') }}"><i class="fas fa-plus-circle"></i></a>
</div><!--btn-toolbar-->
@endcan
