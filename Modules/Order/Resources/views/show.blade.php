@extends ('backend.layouts.app')

@section ('title', __('order::labels.backend.order.management'))

@section('breadcrumb-links')
    @include('order::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('order::labels.backend.order.management') }}
                    <small class="text-muted">{{ __('order::labels.backend.order.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Order Number</th>
                            <td>{{ $order->order_number }}</td>
                        </tr>
                        <tr>
                            <th>Shop</th>
                            <td>{{ $order->shop ? $order->shop->name : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Table</th>
                            <td>{{ $order->table ? $order->table->table_number : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Discount Amount</th>
                            <td>{{ number_format($order->discount_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Final Amount</th>
                            <td><strong>{{ number_format($order->final_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{!! $order->payment_method_label !!}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{!! $order->payment_status_label !!}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{!! $order->order_status_label !!}</td>
                        </tr>
                        <tr>
                            <th>Ordered At</th>
                            <td>{{ $order->ordered_at }}</td>
                        </tr>
                    </tbody>
                </table>

                @if($order->items && $order->items->count() > 0)
                    <h5 class="mt-4">Order Items</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->product ? $item->product->name : 'N/A' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('order::labels.backend.order.table.created') }}:</strong> {{ $order->updated_at->timezone(get_user_timezone()) }} ({{ $order->created_at->diffForHumans() }}),
                    <strong>{{ __('order::labels.backend.order.table.last_updated') }}:</strong> {{ $order->created_at->timezone(get_user_timezone()) }} ({{ $order->updated_at->diffForHumans() }})
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