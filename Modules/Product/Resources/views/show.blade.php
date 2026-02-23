@extends ('backend.layouts.app')

@section ('title', __('product::labels.backend.product.management'))

@section('breadcrumb-links')
    @include('product::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('product::labels.backend.product.management') }}
                    <small class="text-muted">{{ __('product::labels.backend.product.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Shop</th>
                            <td>{{ $product->shop ? $product->shop->name : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $product->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Original Price</th>
                            <td>{{ number_format($product->org_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Promo Price</th>
                            <td>{{ number_format($product->promo_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Cost</th>
                            <td>{{ $product->cost ? number_format($product->cost, 2) : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Stock Quantity</th>
                            <td>{{ $product->stock_quantity }}</td>
                        </tr>
                        <tr>
                            <th>Availability</th>
                            <td>{!! $product->availability_label !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('product::labels.backend.product.table.created') }}:</strong> {{ $product->updated_at->timezone(get_user_timezone()) }} ({{ $product->created_at->diffForHumans() }}),
                    <strong>{{ __('product::labels.backend.product.table.last_updated') }}:</strong> {{ $product->created_at->timezone(get_user_timezone()) }} ({{ $product->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection

@push('after-scripts')

<script>


</script>
@endpush