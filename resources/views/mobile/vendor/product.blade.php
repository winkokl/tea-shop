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
						<h5 class="title mb-0 text-nowrap">Products</h5>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
						<a href="{{route('frontend.vendor_add_products')}}">
							<svg height="24" fill="var(--title)" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><g id="_x33_"><path d="m18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4h-12c-2.206 0-4-1.794-4-4v-12c0-2.206 1.794-4 4-4zm0-2h-12c-3.314 0-6 2.686-6 6v12c0 3.314 2.686 6 6 6h12c3.314 0 6-2.686 6-6v-12c0-3.314-2.686-6-6-6z"/></g><g id="_x32_"><path d="m12 18c-.552 0-1-.447-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10c0 .553-.448 1-1 1z"/></g><g id="_x31_"><path d="m6 12c0-.552.447-1 1-1h10c.552 0 1 .448 1 1s-.448 1-1 1h-10c-.553 0-1-.448-1-1z"/></g></svg>
						</a>
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
    <div class="container">
        <div class="input-group input-search">
            <div class="input-group-text">
                <div class="search-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="#B9B9B9"></path>
                    </svg>
                </div>
            </div>
            <input type="text" id="myInput" placeholder="Search job here..." class="form-control bs-0 ps-0">
        </div>
        <div class="product-list-2">
            <ul>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/1.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">"Live Healty" Tea</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/2.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Best Quality hone...</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/3.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Tomato Sauce</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/4.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Organo Honey..</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/1.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">"Live Healty" Tea</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/2.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Best Quality hone...</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/3.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Tomato Sauce</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/4.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Organo Honey..</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/1.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">"Live Healty" Tea</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/2.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Best Quality hone...</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/3.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Tomato Sauce</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
                <li>
                    <div class="media media-80 me-3">
                        <img src="{{asset('mobile/assets/images/product/4.png')}}" alt="image">
                        <div class="badge badge-warning badge-sm">12.0%</div>
                    </div>
                    <div class="product-content">
                        <h6 class="name mb-0">Organo Honey..</h6>
                        <span>It is a long established...</span>
                        <div class="price"><del class="me-2">$180.0</del>$158.4</div>
                    </div>
                    <div class="veg-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.667 426.667"><path d="M213.333 106.667c-58.88 0-106.667 47.787-106.667 106.667S154.453 320 213.333 320 320 272.213 320 213.333s-47.787-106.666-106.667-106.666zm0-106.667C95.467 0 0 95.467 0 213.333s95.467 213.333 213.333 213.333S426.667 331.2 426.667 213.333 331.2 0 213.333 0zm0 384c-94.293 0-170.667-76.373-170.667-170.667S119.04 42.667 213.333 42.667 384 119.04 384 213.333 307.627 384 213.333 384z"/></svg>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Content End-->
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
