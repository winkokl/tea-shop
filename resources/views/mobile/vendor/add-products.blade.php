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
							<svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"></path><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"></path>
							</svg>
						</a>
						<h5 class="title mb-0 text-nowrap">Create Product</h5>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header -->
@endsection
@section('content')
 <!-- Page Content -->
 <div class="page-content">
    <div class="container pb">
        <div class="product-area">
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select dz-form-select" aria-label="Default select example">
                    <option selected="">Select Category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                    <option value="4">Category 4</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Sub Category</label>
                <select class="form-select dz-form-select" aria-label="Default select example">
                    <option selected="">Select Sub Category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                    <option value="4">Category 4</option>
                </select>
            </div>
            <div class="mb-3 input-mini">
                <label class="form-label mb-0">Product Name</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="mb-3 input-mini">
                <label class="form-label mb-0">Product Price</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="mb-3 input-mini">
                <label class="form-label mb-0">Discount %</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="mb-3 input-mini">
                <label class="form-label mb-0">Sell Price</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="mb-3 input-mini">
                <label class="form-label mb-0">Description</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select dz-form-select" aria-label="Default select example">
                    <option selected="">Available</option>
                    <option value="1">Available</option>
                    <option value="2">Not Available</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">In Stock</label>
                <select class="form-select dz-form-select" aria-label="Default select example">
                    <option selected="">In Stock</option>
                    <option value="1">Out Stock</option>
                    <option value="2">Full Stock</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->
@endsection
@section('footer')
<div class="footer fixed">
    <div class="container">
        <a href="{{route('frontend.vendor_product')}}" class="btn btn-primary btn-block">Add</a>
    </div>
</div>
@endsection
@section('after-scripts-end')
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".product-list ul li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@endsection
